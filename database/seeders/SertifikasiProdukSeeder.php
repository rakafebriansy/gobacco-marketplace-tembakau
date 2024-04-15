<?php

namespace Database\Seeders;

use App\Models\SertifikasiProduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SertifikasiProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $this->call([
            JenisKelaminSeeder::class,
            KecamatanSeeder::class,
            PemerintahSeeder::class,
            PetaniTembakauSeeder::class,
            StatusUjiSeeder::class,
            JenisTembakauSeeder::class,
            JenisPengujianSeeder::class,
        ]);
        $sertifikasi = new SertifikasiProduk();
        $sertifikasi->id_sertifikasi = 1;
        $sertifikasi->id_kecamatan = 1;
        $sertifikasi->id_petani = 1;
        $sertifikasi->id_pengujian = 2;
        $sertifikasi->id_status = 3;
        $sertifikasi->id_jenis_tembakau = 1;
        $sertifikasi->surat_izin_usaha = 'surat001' . '.jpg';
        $sertifikasi->gmb_tembakau = 'Versicolor.png';
        $sertifikasi->tgl_serahsampel = fake()->date();
        $sertifikasi->berkas_lain = fake()->word() . '.jpg';
        $sertifikasi->bukti_tf = fake()->word() . '.jpg';
        $sertifikasi->hasil_pengujian = fake()->word() . '.jpg';
        $sertifikasi->save();
        
        $sertifikasi = new SertifikasiProduk();
        $sertifikasi->id_sertifikasi = 2;
        $sertifikasi->id_kecamatan = 1;
        $sertifikasi->id_petani = 1;
        $sertifikasi->id_pengujian = 2;
        $sertifikasi->id_status = 3;
        $sertifikasi->gmb_tembakau = 'Virginica.png';
        $sertifikasi->id_jenis_tembakau = 2;
        $sertifikasi->surat_izin_usaha = 'surat002' . '.jpg';
        $sertifikasi->tgl_serahsampel = fake()->date();
        $sertifikasi->berkas_lain = fake()->word() . '.jpg';
        $sertifikasi->bukti_tf = fake()->word() . '.jpg';
        $sertifikasi->hasil_pengujian = fake()->word() . '.jpg';
        $sertifikasi->save();
        
        $sertifikasi = new SertifikasiProduk();
        $sertifikasi->id_sertifikasi = 3;
        $sertifikasi->id_kecamatan = 1;
        $sertifikasi->id_petani = 1;
        $sertifikasi->id_status = 3;
        $sertifikasi->id_pengujian = 1;
        $sertifikasi->gmb_tembakau = 'Setosa.png';
        $sertifikasi->id_jenis_tembakau = 2;
        $sertifikasi->surat_izin_usaha = 'surat003' . '.jpg';
        $sertifikasi->tgl_serahsampel = fake()->date();
        $sertifikasi->berkas_lain = fake()->word() . '.jpg';
        $sertifikasi->bukti_tf = fake()->word() . '.jpg';
        $sertifikasi->hasil_pengujian = fake()->word() . '.jpg';
        $sertifikasi->save();
    }
}
