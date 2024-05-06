<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login() {
        return view('login');
    }
    public function register() {
        return view('register');
    }

    public function loginPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil kredensial dari permintaan
        $credentials = $request->only('email', 'password');

        // Coba autentikasi pengguna
        if (Auth::attempt($credentials)) {
            // Jika autentikasi berhasil, arahkan ke halaman sesuai level pengguna
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        // Jika autentikasi gagal, arahkan kembali ke halaman login dengan pesan kesalahan
        return redirect()->route('login')->with('error', 'Email or password is incorrect.');
    }
}
