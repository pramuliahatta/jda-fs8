<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {

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
