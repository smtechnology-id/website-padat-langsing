<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\User;
use App\Models\Mother;
use App\Models\Children;
use App\Models\KaderReport;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->level == 'admin') {
            $laporanCountToday = Report::whereDate('created_at', today())->count();
            $mother = Mother::all()->count();
            $baita = Balita::all()->count();
            $kader = User::where('jenis_pasien', 'kader')->count();
            return view('admin.dashboard', compact('laporanCountToday', 'mother', 'baita', 'kader'));
        } else {
            abort(403, 'Unauthorized action.'); // Arahkan ke halaman 403 jika pengguna bukan admin
        }
    }

    public function pasien()
    {
        $balita = Balita::all();
        $mother = Mother::all();
        return view('admin.pasien', compact('mother', 'balita'));
    }

    public function addPasien(Request $request)
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

        return redirect()->back()->with('success', 'Data ibu dan pengguna berhasil disimpan.');
    }

    public function updatePasien(Request $request)
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
            'email' => 'required|email|unique:users,email,' . $request->id, // tambahkan pengecualian untuk email yang sedang diedit
            'password' => 'nullable|min:6', // password opsional
        ]);

        // Ambil data ibu berdasarkan ID
        $mother = Mother::findOrFail($request->id);

        // Perbarui data ibu
        $mother->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nama_suami' => $request->nama_suami,
            'berat_badan' => $request->berat_badan,
            'lingkar_lengan_atas' => $request->lingkar_lengan_atas,
            'alamat' => $request->alamat,
        ]);

        // Ambil data pengguna terkait dengan ibu
        $user = $mother->user;

        // Perbarui data pengguna jika ada perubahan email atau password
        if ($request->has('email')) {
            $user->update([
                'email' => $request->email,
            ]);
        }
        if ($request->has('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->back()->with('success', 'Data ibu dan pengguna berhasil diperbarui.');
    }

    public function deletePasien($id)
    {
        // Cari data ibu berdasarkan ID
        $mother = Mother::findOrFail($id);

        // Hapus pengguna terkait jika ada
        $user = User::where('id', $mother->user_id)->first();
        $mother->delete();
        $user->delete();
        // Hapus data ibu
        return redirect()->back()->with('success', 'Data ibu dan pengguna berhasil dihapus.');
    }

    public function addPasienBalita(Request $request)
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

        return redirect()->back()->with('success', 'Data anak balita dan pengguna berhasil disimpan.');
    }

    public function updatePasienBalita(Request $request)
    {
        // Validasi input
        $request->validate([
            'id' => 'required|exists:balita,id',
            'nama_anak' => 'required',
            'nik' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'nama_ibu' => 'required',
            'berat_badan' => 'required|numeric',
            'panjang_badan' => 'required|numeric',
            'alamat' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'nullable|min:6', // Kata sandi opsional
        ]);

        // Ambil data anak balita berdasarkan ID
        $child = Balita::findOrFail($request->id);

        // Perbarui data anak balita
        $child->update([
            'nama_anak' => $request->nama_anak,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nama_ibu' => $request->nama_ibu,
            'berat_badan' => $request->berat_badan,
            'panjang_badan' => $request->panjang_badan,
            'alamat' => $request->alamat,
        ]);

        // Perbarui data pengguna jika email berubah
        if ($child->user->email !== $request->email) {
            $child->user->update([
                'email' => $request->email,
            ]);
        }

        // Perbarui kata sandi pengguna jika diisi
        if ($request->filled('password')) {
            $child->user->update([
                'password' => bcrypt($request->password),
            ]);
        }

        return redirect()->back()->with('success', 'Data anak balita dan pengguna berhasil diperbarui.');
    }
    public function deletePasienBalita($id)
    {
        // Temukan data balita berdasarkan ID
        $balita = Balita::findOrFail($id);

        // Hapus pengguna terkait
        $user = User::findOrFail($balita->user_id);
        $balita->delete();
        $user->delete();

        // Hapus data balita

        // Redirect ke halaman yang sesuai atau berikan respons sesuai kebutuhan
        return redirect()->back()->with('success', 'Data balita dan pengguna terkait berhasil dihapus.');
    }

    public function laporan()
    {
        $laporan = Report::orderBy('created_at', 'desc')->get();
        return view('admin.laporan', compact('laporan'));
    }

    public function kader()
    {
        $kader = User::where('jenis_pasien', 'kader')->get();
        return view('admin.kader', compact('kader'));
    }
    public function addKaderKesehatan(Request $request)
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

        return redirect()->back()->with('success', 'Kader kesehatan berhasil ditambahkan.');
    }
    public function kaderReport()
    {
        $laporan = KaderReport::latest()->get();
        return view('admin.kaderReport', compact('laporan'));
    }

    public function deleteKader($id)
    {
        // Temukan data kader berdasarkan ID
        $kader = User::findOrFail($id);

        // Hapus data kader
        $kader->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data kader berhasil dihapus.');
    }

    public function updateKaderKesehatan(Request $request)
    {
        // Temukan data kader berdasarkan ID
        $kader = User::findOrFail($request->id);

        // Validasi input
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $kader->id, // Perhatikan penggunaan unique:users,email
        ];

        // Periksa apakah bidang password tidak kosong
        if (!empty($request->password)) {
            $rules['password'] = 'required|string|min:8';
        }

        $request->validate($rules);

        // Perbarui data kader
        $kader->name = $request->name;
        $kader->email = $request->email;

        // Periksa apakah bidang password tidak kosong
        if (!empty($request->password)) {
            $kader->password = Hash::make($request->password); // Jangan lupa untuk menghash password
        }

        $kader->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data kader berhasil diperbarui.');
    }
}
