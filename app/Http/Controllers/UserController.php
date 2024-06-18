<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //cek nama route, jika 'dashboard.users.index' ke dashboard admin menu user, jika bukan ke login
        if (Route::current()->getName() == 'dashboard.users.index') {
            return view('dashboard.users.index', [
                // 'title' => 'Users',
                'users' => User::all(),
            ]);
        }

        return view('profile', [
            // 'title' => 'Users',
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengembalikan tampilan dashboard admin menu user
        return view('dashboard.users.create', [
            // 'title' => 'Users',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //memvalidasi data yang diisi pada tampilan create
        $validatedData = $request->validate([
            'name' => [
                'required',
                'min:4',
                'max:255',
            ],
            'phone_number' => [
                'required',
                'min:7',
                'max:20',
            ],
            'email' => [
                'required',
                'unique:users',
                'email:dns'
            ],
        ]);

        //menambahkan data role dan password secara manual
        $validatedData['role'] = 'member';
        $validatedData['password'] = Hash::make('12345');

        //menambah data ke user dengan data yang sudah divalidasi. jika sukses kembalikan pesan sukses, jika tidak kembalikan pesan error.
        $storeData = User::create($validatedData);
        if ($storeData) {
            return back()->with('success', 'User added successfully');
        }

        return back()->with('error', 'Error.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.users.detail', [
            // 'title' => 'Users',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            // 'title' => 'Users',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //cek jika route 'dashboard.users.update' yang mana digunakan untuk dashboard maka ganti langsung password ke default. jika tidak ganti nomor/password sesuai dengan form yang diisi user
        if (Route::current()->getName() == 'dashboard.users.update') {
            //pembuatan password default ke var validateData dengan kunci password
            $validatedData['password'] = Hash::make('12345');

            $updatedData = User::where('id', $user->id)
                ->update($validatedData);

            //pengecekan jika user berhasil diupdate
            if ($updatedData) {
                return back()->with('success', 'User updated successfully');
            }

            return back()->with('error', 'Error.');
        }

        //pengecekan data dari form yang diisi oleh user
        $validatedData = $request->validate([
            'phone_number' => [
                'required',
                'min:7',
                'max:20',
            ],
            'password' => [
                'required',
                'min:4',
                'max:20',
                'confirmed',
            ]
        ]);

        $updatedData = User::where('id', $user->id)
            ->update($validatedData);

        //pengecekan jika user berhasil diupdate
        if ($updatedData) {
            return back()->with('success', 'User updated successfully');
        }

        return back()->with('error', 'Error.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user = User::destroy($user->id);

        //pengecekan jika user berhasil dihapus
        if ($user) {
            return back()->with('success', 'User deleted successfully');
        }

        return back()->with('error', 'Error.');
    }

    public function adminCheck(User $user)
    {
        //cek jika role user sama dengan 'admin'
        if ($user->role == 'admin') {
            return true;
        }
        return false;
    }
}
