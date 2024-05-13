<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Balita;
use App\Models\Mother;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login()
    {
        return view('login');
    }
    public function register()
    {
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
            } elseif ($user->level == 'kader') {
                return redirect()->route('kader.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        // Jika autentikasi gagal, arahkan kembali ke halaman login dengan pesan kesalahan
        return redirect()->route('login')->with('error', 'Email or password is incorrect.');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        // Redirect ke halaman login setelah logout
        return redirect()->route('login');
    }
    public function jenis_pasien()
    {
        return view('user.jenis_pasien');
    }

    public function registerBalita()
    {
        return view('registerBalita');
    }

    public function registerBalitaPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_anak' => 'required',
            'nik' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'nama_ibu' => 'required',
            'berat_badan' => 'required|numeric',
            'panjang_badan' => 'required|numeric',
            'alamat' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->nama_anak, // Gunakan nama anak sebagai nama pengguna
            'jenis_pasien' => 'anak', // Atur jenis pasien sesuai kebutuhan
            'level' => 'user', // Atur level pengguna sesuai kebutuhan
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash password
        ]);

        // Simpan data anak balita ke dalam tabel children
        Balita::create([
            'user_id' => $user->id,
            'nama_anak' => $request->nama_anak,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nama_ibu' => $request->nama_ibu,
            'berat_badan' => $request->berat_badan,
            'panjang_badan' => $request->panjang_badan,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('login')->with('success', 'Data anak balita dan pengguna berhasil disimpan.');
    }

    public function registerMother()
    {
        return view('registerMother');
    }
    public function registerMotherPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'nama_suami' => 'required',
            'berat_badan' => 'required|numeric',
            'lingkar_lengan_atas' => 'required|numeric',
            'alamat' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->nama_lengkap, // Menggunakan nama ibu sebagai nama pengguna
            'jenis_pasien' => 'ibu', // Atur jenis pasien sesuai kebutuhan
            'level' => 'user', // Atur level pengguna sesuai kebutuhan
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $user_id = $user->id;
        // Simpan data ibu ke dalam tabel mothers
        $mother = Mother::create([
            'user_id' => $user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nama_suami' => $request->nama_suami,
            'berat_badan' => $request->berat_badan,
            'lingkar_lengan_atas' => $request->lingkar_lengan_atas,
            'alamat' => $request->alamat,
        ]);

        // Simpan data pengguna ke dalam tabel users


        // Relasikan user dengan mother
        $mother->user()->associate($user);
        $mother->save();

        return redirect()->route('login')->with('success', 'Data ibu dan pengguna berhasil disimpan.');
    }

    public function registerKader()
    {
        return view('registerKader');
    }

    public function registerKaderPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Buat user kader kesehatan
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'jenis_pasien' => 'kader',
            'level' => 'kader',
        ]);

        return redirect()->route('login')->with('success', 'Kader kesehatan berhasil ditambahkan.');
    }
}
