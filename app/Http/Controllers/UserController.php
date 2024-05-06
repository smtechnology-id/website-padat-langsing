<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function addLaporan()
    {
        return view('user.addLaporan');
    }
    public function addLaporanPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_dimakan' => 'required',
            'foto_jumlah_dimakan' => 'required|image',
            'alasan' => 'required',
            'jumlah_tidak_dimakan' => 'required',
            'foto_jumlah_tidak_dimakan' => 'required|image',
        ]);

        // Simpan foto jumlah yang dimakan
        $fotoDimakanPath = $request->file('foto_jumlah_dimakan')->store('laporan');

        // Buat direktori jika belum ada
        $fotoTidakDimakanDir = 'laporan/foto_jumlah_tidak_dimakan';
        if (!Storage::exists($fotoTidakDimakanDir)) {
            Storage::makeDirectory($fotoTidakDimakanDir);
        }

        // Simpan foto jumlah yang tidak dimakan
        $fotoTidakDimakanPath = $request->file('foto_jumlah_tidak_dimakan')->store($fotoTidakDimakanDir);

        // Dapatkan jenis pasien dari pengguna yang sedang masuk
        $jenis_pasien = Auth::user()->jenis_pasien;

        // Simpan laporan
        $laporan = Report::create([
            'user_id' => auth()->id(), // Menggunakan ID pengguna yang saat ini login
            'tanggal' => $request->tanggal,
            'jumlah_dimakan' => $request->jumlah_dimakan,
            'foto_jumlah_dimakan' => $fotoDimakanPath,
            'alasan' => $request->alasan,
            'jumlah_tidak_dimakan' => $request->jumlah_tidak_dimakan,
            'foto_jumlah_tidak_dimakan' => $fotoTidakDimakanPath,
            'jenis_pasien' => $jenis_pasien,
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil ditambahkan.');
    }
}
