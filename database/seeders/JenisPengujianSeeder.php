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
        for($i = 1; $i < 6; $i++) {
            $jenis_pengujian = new JenisPengujian();
            $jenis_pengujian->id_pengujian = $i;
            $jenis_pengujian->jenis_pengujian = fake()->sentence();
            $jenis_pengujian->harga_uji = fake()->numberBetween(100000,10000000);
            $jenis_pengujian->id_pemerintah = fake()->numberBetween(1,3);
            $jenis_pengujian->save();
        }
    }
}
