<?php

namespace Database\Seeders;

use App\Models\PetaniTembakau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetaniTembakauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $this->call([
            JenisKelaminSeeder::class,
            KecamatanSeeder::class,
        ]);
        $petani_tembakau = new PetaniTembakau();
        $petani_tembakau->id_petani = 1;
        $petani_tembakau->nama_petani = 'Maretha Nur Azizah';
        $petani_tembakau->username_petani = 'retha';
        $petani_tembakau->pw_petani = '12345';
        $petani_tembakau->email_petani = 'retha@gmail.com';
        $petani_tembakau->id_jenis_kelamin = 2;
        $petani_tembakau->alamat_petani = 'Jl. Manggis';
        $petani_tembakau->id_kecamatan = 1;
        $petani_tembakau->telp_petani = '081284393921';
        $petani_tembakau->noktp_petani = '7731873237197';
        $petani_tembakau->save();
    }
}
