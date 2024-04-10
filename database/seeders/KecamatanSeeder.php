<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i < 4; $i++) {
            $kecamatan = new Kecamatan();
            $kecamatan->id_kecamatan = $i;
            $kecamatan->kecamatan = 'kecamatan_' . $i;
            $kecamatan->save();
        }
    }
}
