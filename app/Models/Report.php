<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'user_id',
        'tanggal',
        'jumlah_dimakan',
        'foto_jumlah_dimakan',
        'alasan',
        'jumlah_tidak_dimakan',
        'foto_jumlah_tidak_dimakan',
        'pertanyaan_tambahan',
        'jenis_pasien',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}