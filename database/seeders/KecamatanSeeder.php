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
        $kecamatan = new Kecamatan();
        $kecamatan->id_kecamatan = 1;
        $kecamatan->kecamatan = 'Patrang';
        $kecamatan->save();

        $kecamatan = new Kecamatan();
        $kecamatan->id_kecamatan = 2;
        $kecamatan->kecamatan = 'Kaliwates';
        $kecamatan->save();

        $kecamatan = new Kecamatan();
        $kecamatan->id_kecamatan = 3;
        $kecamatan->kecamatan = 'Arjasa';
        $kecamatan->save();

        $kecamatan = new Kecamatan();
        $kecamatan->id_kecamatan = 4;
        $kecamatan->kecamatan = 'Sumbersari';
        $kecamatan->save();
    }
}
