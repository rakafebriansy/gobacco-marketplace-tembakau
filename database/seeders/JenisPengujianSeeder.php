<?php

namespace Database\Seeders;

use App\Models\JenisPengujian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisPengujianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis_pengujian = new JenisPengujian();
        $jenis_pengujian->id_pengujian = 1;
        $jenis_pengujian->jenis_pengujian = 'Nikotin Metode AA3';
        $jenis_pengujian->harga_uji = 400000;
        $jenis_pengujian->id_pemerintah = 1;
        $jenis_pengujian->save();

        $jenis_pengujian = new JenisPengujian();
        $jenis_pengujian->id_pengujian = 2;
        $jenis_pengujian->jenis_pengujian = 'Air Metode Oven';
        $jenis_pengujian->harga_uji = 150000;
        $jenis_pengujian->id_pemerintah = 1;
        $jenis_pengujian->save();
    }
}
