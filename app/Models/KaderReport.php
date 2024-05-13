<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaderReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tanggal',
        'foto',
        'catatan',
    ];

    protected $table = 'kader_report';

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
