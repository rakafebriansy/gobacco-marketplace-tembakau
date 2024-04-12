<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\JenisKelamin;
use App\Models\JenisPengujian;
use App\Models\JenisTembakau;
use App\Models\Kecamatan;
use App\Models\Pemerintah;
use App\Models\PetaniTembakau;
use App\Models\SertifikasiProduk;
use Database\Seeders\AdminSeeder;
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
use Tests\TestCase;

class RelationshipTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        DB::delete('DELETE FROM sertifikasi_produks');
        DB::delete('DELETE FROM status_ujis');
        DB::delete('DELETE FROM jenis_tembakaus');
        DB::delete('DELETE FROM jenis_pengujians');
        DB::delete('DELETE FROM petani_tembakaus');
        DB::delete('DELETE FROM pemerintahs');
        DB::delete('DELETE FROM admins');
        DB::delete('DELETE FROM jenis_kelamins');
        DB::delete('DELETE FROM kecamatans');
    }
    public function testKecamatanAdmin()
    {
        $this->seed(KecamatanSeeder::class);
        $this->seed(AdminSeeder::class);

        $admins = Admin::all();
        self::assertCount(1, $admins);
        foreach ($admins as $admin) {
            // Log::channel('stderr')->info($admin);
            // Log::channel('stderr')->info($admin->kecamatan);
        }
    }
    public function testKelaminKecamatanPetani()
    {
        $this->seed([JenisKelaminSeeder::class, KecamatanSeeder::class, PetaniTembakauSeeder::class]);
        
        $petanis = PetaniTembakau::all();
        self::assertCount(1, $petanis);
        foreach ($petanis as $petani) {
            // Log::channel('stderr')->info($petani);
            // Log::channel('stderr')->info($petani->kecamatan);
        }
    }
    public function testKecamatanPemerintah()
    {
        $this->seed([KecamatanSeeder::class,PemerintahSeeder::class]);

        $pemerintahs = Pemerintah::all();
        self::assertCount(1, $pemerintahs);
        foreach ($pemerintahs as $pemerintah) {
            // Log::channel('stderr')->info($pemerintah);
            // Log::channel('stderr')->info($pemerintah->kecamatan);
        }
    }
    public function testPemerintahPengujian()
    {
        $this->seed([KecamatanSeeder::class,PemerintahSeeder::class,JenisPengujianSeeder::class]);

        $jenis_pengujians = JenisPengujian::all();
        self::assertCount(2, $jenis_pengujians);
        foreach ($jenis_pengujians as $jenis_pengujian) {
            // Log::channel('stderr')->info($jenis_pengujian);
        }
    }
    public function testTembakauStatusSertifikasi()
    {
        $this->seed([JenisKelaminSeeder::class,KecamatanSeeder::class,PetaniTembakauSeeder::class,JenisPengujianSeeder::class,JenisTembakauSeeder::class,StatusUjiSeeder::class,SertifikasiProdukSeeder::class]);

        $jenis_tembakau = JenisTembakau::query()->where('id_jenis_tembakau',2)->first();
        self::assertNotNull($jenis_tembakau);
        
        $sertifikasi_produks = $jenis_tembakau->sertifikasiProduks;
        self::assertCount(2, $sertifikasi_produks);
    }
}