<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'nama_anak',
        'nik',
        'tanggal_lahir',
        'nama_ibu',
        'berat_badan',
        'panjang_badan',
        'alamat',
    ];

    // Define the table name correctly
    protected $table = 'childrens'; // Corrected table name

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
