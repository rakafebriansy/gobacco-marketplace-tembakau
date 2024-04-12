<?php

namespace Tests\Feature;

use App\Models\Pemerintah;
use App\Models\PetaniTembakau;
use App\Models\SertifikasiProduk;
use App\Models\StatusUji;
use Database\Seeders\JenisKelaminSeeder;
use Database\Seeders\JenisPengujianSeeder;
use Database\Seeders\JenisTembakauSeeder;
use Database\Seeders\KecamatanSeeder;
use Database\Seeders\PemerintahSeeder;
use Database\Seeders\PetaniTembakauSeeder;
use Database\Seeders\SertifikasiProdukSeeder;
use Database\Seeders\StatusUjiSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class MembuatPengajuanSertifikasiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        DB::delete('DELETE FROM sertifikasi_produks');
        DB::delete('DELETE FROM jenis_tembakaus');
        DB::delete('DELETE FROM jenis_pengujians');
        DB::delete('DELETE FROM status_ujis');
        DB::delete('DELETE FROM pemerintahs');
        DB::delete('DELETE FROM petani_tembakaus');
        DB::delete('DELETE FROM jenis_kelamins');
        DB::delete('DELETE FROM kecamatans');
        Session::flush();
    }
    public function testView_PetaniSuccess()
    {
        $this->seed([JenisKelaminSeeder::class,KecamatanSeeder::class,PetaniTembakauSeeder::class]);
        
        $petani = PetaniTembakau::first();
        $this->withSession(['id_petani' => $petani->id_petani])->get('/petani/sertifikasi/buat')->assertSeeText('Petani | Pengajuan Sertifikasi')->assertSeeText('Pengajuan Username: retha');
    }
    public function testView_PetaniFailed()
    {
        $this->get('/petani/sertifikasi/buat')->assertRedirect('/');
    }
    public function testPost_PetaniSuccess()
    {
        $this->seed([JenisKelaminSeeder::class,KecamatanSeeder::class,PetaniTembakauSeeder::class]);
        
        $petani = PetaniTembakau::first();

        $surat_izin_usaha = UploadedFile::fake()->image('surat001.png');
        $berkas_lain = UploadedFile::fake()->image('map001.png');
        $bukti_tf = UploadedFile::fake()->image('transfer001.png');

        $this->post('/petani/sertifikasi/buat', [
            'id_kecamatan' => 1,
            'id_petani' => $petani->id_petani,
            'id_pengujian' => 1,
            'id_jenis_tembakau' => 1,
            'id_status' => 3,
            'surat_izin_usaha' => $surat_izin_usaha,
            'tgl_serahsampel' => fake()->date(),
            'berkas_lain' => $berkas_lain,
            'bukti_tf' => $bukti_tf,
        ])->assertSeeText(['Surat: surat001.png','Berkas: map001.png','Bukti: transfer001.png']);
    }
    // public function testPost_PetaniFailed()
    // {
    //     $this->patch('/petani/akun/ubah')->assertRedirect('/');
    // }
    public function testView_PemerintahSuccess()
    {
        $this->seed([
            JenisKelaminSeeder::class,
            KecamatanSeeder::class,
            PemerintahSeeder::class,
            PetaniTembakauSeeder::class,
            StatusUjiSeeder::class,
            JenisTembakauSeeder::class,
            JenisPengujianSeeder::class,
            SertifikasiProdukSeeder::class,
        ]);
        
        $sertifikasi = SertifikasiProduk::first();
        $this->get('/pemerintah/sertifikasi/buat/' . $sertifikasi->id_sertifikasi)->assertSeeText('Pemerintah | Pengajuan Sertifikasi')->assertSeeText('Pengajuan Surat: surat001');
    }
    public function testView_PemerintahFailed()
    {
        $this->get('/pemerintah/sertifikasi/buat/1386')->assertRedirect('/');
    }
    public function testPost_pemerintahSuccess()
    {
        $this->seed([
            JenisKelaminSeeder::class,
            KecamatanSeeder::class,
            PemerintahSeeder::class,
            PetaniTembakauSeeder::class,
            StatusUjiSeeder::class,
            JenisTembakauSeeder::class,
            JenisPengujianSeeder::class,
            SertifikasiProdukSeeder::class,
        ]);
        $this->post('/pemerintah/sertifikasi/buat', [
            'status' => '1',
            'id_sertifikasi' => '1'
        ])->assertRedirect('/pemerintah/sertifikasi/buat/1');
    }
    public function testPost_pemerintahFailed()
    {
        $this->post('/pemerintah/sertifikasi/buat')->assertRedirect('/pemerintah/sertifikasi/buat');
    }
}
