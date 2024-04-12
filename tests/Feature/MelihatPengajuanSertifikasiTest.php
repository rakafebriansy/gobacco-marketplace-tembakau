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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class MelihatPengajuanSertifikasiTest extends TestCase
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
    public function test_PetaniSuccess()
    {
        $this->seed([
            JenisKelaminSeeder::class,
            KecamatanSeeder::class,
            PetaniTembakauSeeder::class,
            StatusUjiSeeder::class,
            JenisTembakauSeeder::class,
            JenisPengujianSeeder::class,
            SertifikasiProdukSeeder::class,
        ]);
    
        $petani = PetaniTembakau::first();
        $this->withSession(['id_petani' => $petani->id_petani])->get('/petani/sertifikasi')->assertSeeText('Petani | Sertifikasi')->assertSeeText(['surat001.jpg','surat002.jpg','surat003.jpg']);
    }
    public function test_PetaniFailed()
    {
        $this->get('/petani/sertifikasi')->assertRedirect('/');
    }
    public function test_PemerintahSuccess()
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
    
        $pemerintah = Pemerintah::first();
        $this->withSession(['id_pemerintah' => $pemerintah->id_pemerintah])->get('/pemerintah/sertifikasi')->assertSeeText('Pemerintah | Sertifikasi')->assertSeeText(['surat001.jpg','surat002.jpg','surat003.jpg']);
    }
    public function test_PemerintahFailed()
    {
        $this->get('/pemerintah/sertifikasi')->assertRedirect('/');
    }
}
