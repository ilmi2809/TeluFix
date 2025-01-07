<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Ilmi Syahbana',
            'email' => 'ilmisyahbana@student.telkomuniversity.ac.id',
            'password' => bcrypt('1234'),
            'role' => 'Mahasiswa',
            'nim' => '1202220122',
            'jurusan' => 'S1 Sistem Informasi',
            'foto' => 'PROFIL.png'
        ]);
    }
}
