<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $page = $request->input('page', 1);
        // $pageSize = $request->input('pageSize', 10);

        $fetchData = Http::get('http://127.0.0.1:8001/api/users');
        $response = $fetchData->json();
        // dd($data);
        $users = collect($response['data']);

        // Determine the current page
        $currentPage = request()->get('page', 1);

        // Define the number of items per page
        $perPage = 10;

        // Slice the users collection to get the items to display in the current page
        $currentPageItems = $users->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Create the paginator
        $data = new LengthAwarePaginator(
            $currentPageItems,
            $users->count(),
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ],
        );


        dd($data);

        //cek nama route, jika 'dashboard.users.index' ke dashboard admin menu user, jika bukan ke login
        if (Route::current()->getName() == 'dashboard.users.index') {
            return view('dashboard.users.index', compact('data'));
        }

        return view('home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //mengembalikan tampilan dashboard admin menu user
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

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
            'password' => [
                'required',
                'min:4',
                'confirmed',
            ]
        ]);

        // dd($validatedData);

        if ($validatedData) {
            $fetchData = Http::post('http://127.0.0.1:8001/api/users', $validatedData);
            $response = $fetchData->json();
            if ($response['status'] == true) {
                return redirect()->intended(route('dashboard.users.index'))->with('success', $response['message']);
            }
        }

        return back()->with('error', 'Error.');

        //menambah data ke user dengan data yang sudah divalidasi. jika sukses kembalikan pesan sukses, jika tidak kembalikan pesan error.
        // $storeData = User::create($validatedData);
        // if ($storeData) {
        //     return back()->with('success', 'User added successfully');
        // }

        // return back()->with('error', 'Error.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $fetchData = Http::get('http://127.0.0.1:8001/api/users/' + $user->id);
        if ($fetchData->successful()) {
            $response = $fetchData->json();
            $data = $response['data'];
        }
        return view('dashboard.users.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $fetchData = Http::get('http://127.0.0.1:8001/api/users/' + $user->id);
        if ($fetchData->successful()) {
            $response = $fetchData->json();
            $data = $response['data'];
        }
        return view('dashboard.users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //pengecekan data dari form yang diisi oleh user
        $validatedData = $request->validate([
            'phone_number' => [
                'required',
                'min:7',
                'max:20',
            ],
            'password' => [
                'nullable',
                'min:4',
                'max:20',
                'confirmed',
            ]
        ]);

        if ($validatedData) {
            $fetchData = Http::put('http://127.0.0.1:8001/api/users/' + $user->id, $request);
            $response = $fetchData->json();
            $data = $response['data'];
            if ($data['status'] == true) {
                return back()->with('success', $data['message']);
            }
        }

        return back()->with('error', 'Error.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $fetchData = Http::delete('http://127.0.0.1:8001/api/users/' + $user->id);
        $response = $fetchData->json();
        $data = $response['data'];
        if ($data['status'] == true) {
            return back()->with('success', $data['message']);
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
