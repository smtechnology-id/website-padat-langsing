<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\KaderReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaderController extends Controller
{
    public function index()
    {
        $tanggalHariIni = Carbon::today();

        // Hitung jumlah laporan berdasarkan user_id dan tanggal hari ini
        $user_id = Auth::user()->id;
        $laporanCountToday = KaderReport::where('user_id', $user_id)
            ->whereDate('created_at', $tanggalHariIni)
            ->count();
        $laporanCount = KaderReport::where('user_id', $user_id)
            ->count();
        return view('kader.dashboard', compact('laporanCount', 'laporanCountToday'));
    }
    public function laporan()
    {
        $user_id = Auth::user()->id;
        $laporan = KaderReport::where('user_id', $user_id)->latest()->get();
        // Ambil tanggal hari ini
        
        return view('kader.laporan', compact('laporan'));
    }

    public function addLaporanKader(Request $request)
    {
        // Validasi input
        $request->validate([
            'foto' => 'required|image',
            'catatan' => 'required|string',
        ]);

        // Simpan foto
        $fotoPath = $request->file('foto')->store('laporan_kader', 'public');

        // Simpan data laporan kader
        $laporan = KaderReport::create([
            'user_id' => auth()->id(),
            'tanggal' => now()->toDateString(),
            'foto' => basename($fotoPath),
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Laporan kader berhasil ditambahkan.');
    }
}
