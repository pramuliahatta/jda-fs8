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
        //cek nama route, jika 'dashboard.user.index' ke dashboard admin menu user, jika bukan ke login
        if(Route::current()->getName() == 'dashboard.user.index') {
            return view('dashboard.user.index', [
                // 'title' => 'Users',
                'users'=> User::all(),
            ]);
        }

        return view('auth.login', [
            // 'title' => 'Users',
            'users'=> User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengembalikan tampilan dashboard admin menu user
        return view('dashboard.user.create', [
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
        return view('dashboard.user.detail', [
            // 'title' => 'Users',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            // 'title' => 'Users',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // $validatedData = $request->validate([
        //     'name' => [
        //         'required',
        //         'max:255',
        //     ],
        // ]);

        // $updatedData = User::where('id', $user->id)
        //     ->update($validatedData);
        // if ($updatedData) {
        //     return back()->with('success', 'User updated successfully');
        // }
        
        // return back()->with('error', 'Error.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user = User::destroy($user->id);
        if ($user) {
            return back()->with('success', 'User deleted successfully');
        }
        
        return back()->with('error', 'Error.');
    }

    public function adminCheck(User $user) {
        if($user->role == 'admin') {
            return true;
        }
        return false;
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->role == 'admin') {
                return redirect()->intended(route('dashboard.index'));
                }
            return redirect()->intended('/');
        }

        return back()->with('error', 'Login Failed');
    }

    public function logout() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->intended('/dashboard');
    }
}
