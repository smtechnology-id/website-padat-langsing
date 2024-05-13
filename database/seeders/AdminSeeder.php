<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Menambahkan satu admin
        User::create([
            'name' => 'Admin',
            'jenis_pasien' => 'Admin', // Jika diperlukan
            'level' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('xEYnws6y'),
        ]);
    }
}
