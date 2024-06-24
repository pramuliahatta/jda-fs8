<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        return view('auth.login', []);
=======
    public function index() {
        return view('auth.login');
>>>>>>> d7854813727753eeba7c1d172fa485e8c6681d3e
    }

    public function authenticate(Request $request)
    {

        //pengecekan validasi form yang diisi pada form login
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        //cek jika email dan password sesuai dengan apa yang ada di database
        if (Auth::attempt($credentials)) {
            //buat session baru
            $request->session()->regenerate();

            //jika user admin maka arahkan user ke menu dashboard, jika user adalah pengguna biasa maka arahkan user ke halaman awal
            if (Auth::user()->role == 'admin') {
                return redirect()->intended(route('dashboard.index'));
<<<<<<< HEAD
            }
            return redirect()->intended('/');
=======
                }
            return redirect()->intended(route('home'));
>>>>>>> d7854813727753eeba7c1d172fa485e8c6681d3e
        }

        return back()->with('error', 'Login Failed');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->intended(route('home'));
    }
}
