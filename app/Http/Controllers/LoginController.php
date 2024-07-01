<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
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
            $user = User::where('email', $request->email)->first();
            // $token = $user->createToken('authToken')->plainTextToken;

            // $request->session()->regenerate();
            
            //jika user admin maka arahkan user ke menu dashboard, jika user adalah pengguna biasa maka arahkan user ke halaman awal
            if (Auth::user()->role == 'admin') {
                return redirect()->intended(route('dashboard.articles.index'));
            }
            return redirect()->intended(route('products.index'));
        }

        return back()->with('error', 'Gagal Masuk');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->intended(route('home'));
    }
}
