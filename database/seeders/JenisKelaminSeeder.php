<?php

namespace Database\Seeders;

use App\Models\JenisKelamin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laki_laki = new JenisKelamin();
        $laki_laki->id_jenis_kelamin = 1;
        $laki_laki->jenis_kelamin = 'Laki-laki';
        $laki_laki->save();
        
        $perempuan = new JenisKelamin();
        $perempuan->id_jenis_kelamin = 2;
        $perempuan->jenis_kelamin = 'Perempuan';
        $perempuan->save();
    }
}
