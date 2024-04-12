<?php

namespace Database\Seeders;

use App\Models\Pemerintah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemerintahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pemerintah = new Pemerintah();
        $pemerintah->id_pemerintah = 1;
        $pemerintah->username_pemerintah = 'dinas_pertanian_001';
        $pemerintah->pw_pemerintah = 'dinas123';
        $pemerintah->email_pemerintah = 'dinas001@gmail.com';
        $pemerintah->telp_pemerintah = fake()->phoneNumber();
        $pemerintah->id_kecamatan = 1;
        $pemerintah->save();
    }
}
