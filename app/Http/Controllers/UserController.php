<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        $tanggalSekarang = Carbon::now()->locale('id');

        return view('user.addLaporan')->with('tanggalSekarang', $tanggalSekarang);
    }

    public function laporan()
    {
        $user_id = Auth::user()->id;
        $laporan = Report::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return view('user.laporan', compact('laporan'));
    }

    public function addLaporanPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'jumlah_dimakan' => 'required',
            'foto_jumlah_dimakan' => 'required|image',
            'alasan' => 'required',
            'jumlah_tidak_dimakan' => 'required',
            'pertanyaan_tambahan' => 'required',
            'foto_jumlah_tidak_dimakan' => 'required|image',
        ]);

        // Simpan tanggal saat ini
        $tanggal = now()->toDateString();

        // Simpan foto jumlah yang dimakan dengan nama acak
        $fotoDimakanPath = $request->file('foto_jumlah_dimakan')->storePublicly('laporan', 'public');
        $fotoDimakanFileName = basename($fotoDimakanPath);

        // Simpan foto jumlah yang tidak dimakan dengan nama acak
        $fotoTidakDimakanPath = $request->file('foto_jumlah_tidak_dimakan')->storePublicly('laporan', 'public');
        $fotoTidakDimakanFileName = basename($fotoTidakDimakanPath);

        // Dapatkan jenis pasien dari pengguna yang sedang masuk
        $jenis_pasien = auth()->user()->jenis_pasien;

        // Simpan laporan
        $laporan = Report::create([
            'user_id' => auth()->id(), // Menggunakan ID pengguna yang saat ini login
            'tanggal' => $tanggal,
            'jumlah_dimakan' => $request->jumlah_dimakan,
            'foto_jumlah_dimakan' => $fotoDimakanFileName,
            'alasan' => $request->alasan,
            'jumlah_tidak_dimakan' => $request->jumlah_tidak_dimakan,
            'pertanyaan_tambahan' => $request->pertanyaan_tambahan,
            'foto_jumlah_tidak_dimakan' => $fotoTidakDimakanFileName,
            'jenis_pasien' => $jenis_pasien,
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil ditambahkan.');
    }
}
