<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\JenisKelamin;
use App\Models\JenisPengujian;
use App\Models\JenisTembakau;
use App\Models\Kecamatan;
use App\Models\Pemerintah;
use App\Models\PetaniTembakau;
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
        self::assertCount(3, $admins);
        foreach ($admins as $admin) {
            // Log::channel('stderr')->info($admin);
            // Log::channel('stderr')->info($admin->kecamatan);
        }
    }
    public function testKelaminKecamatanPetani()
    {
        $this->seed([JenisKelaminSeeder::class, KecamatanSeeder::class, PetaniTembakauSeeder::class]);
        
        $petanis = PetaniTembakau::all();
        self::assertCount(5, $petanis);
        foreach ($petanis as $petani) {
            // Log::channel('stderr')->info($petani);
            // Log::channel('stderr')->info($petani->kecamatan);
        }
    }
    public function testKecamatanPemerintah()
    {
        $this->seed([KecamatanSeeder::class,PemerintahSeeder::class]);

        $pemerintahs = Pemerintah::all();
        self::assertCount(3, $pemerintahs);
        foreach ($pemerintahs as $pemerintah) {
            // Log::channel('stderr')->info($pemerintah);
            // Log::channel('stderr')->info($pemerintah->kecamatan);
        }
    }
    public function testPemerintahPengujian()
    {
        $this->seed([KecamatanSeeder::class,PemerintahSeeder::class,JenisPengujianSeeder::class]);

        $jenis_pengujians = JenisPengujian::all();
        self::assertCount(5, $jenis_pengujians);
        foreach ($jenis_pengujians as $jenis_pengujian) {
            // Log::channel('stderr')->info($jenis_pengujian);
        }
    }
    public function testTembakauStatusSertifikasi()
    {
        $this->seed([JenisKelaminSeeder::class,KecamatanSeeder::class,PetaniTembakauSeeder::class,JenisPengujianSeeder::class,JenisTembakauSeeder::class,StatusUjiSeeder::class]);

        $jenis_tembakau = JenisTembakau::query()->first();
        $jenis_tembakau->sertifikasiProduks()->attach(1,[
            'id_sertifikasi' => 1,
            'id_kecamatan' => 1,
            'id_petani' => 4,
            'id_pengujian' => 2,
            'surat_izin_usaha' => fake()->word() . '.png',
            'tgl_serahsampel' => fake()->date(),
            'berkas_lain' => fake()->word() . '.png',
            'bukti_tf' => fake()->word() . '.png',
            'hasil_pengujian' => fake()->word() . '.png'
            ]);
        $jenis_tembakau->sertifikasiProduks()->attach(2,[
            'id_sertifikasi' => 2,
            'id_kecamatan' => 3,
            'id_petani' => 2,
            'id_pengujian' => 1,
            'surat_izin_usaha' => fake()->word() . '.png',
            'tgl_serahsampel' => fake()->date(),
            'berkas_lain' => fake()->word() . '.png',
            'bukti_tf' => fake()->word() . '.png',
            'hasil_pengujian' => fake()->word() . '.png'
            ]);
        self::assertNotNull($jenis_tembakau);
        
        $status_ujis = $jenis_tembakau->sertifikasiProduks;
        self::assertCount(2, $status_ujis);

        foreach ($status_ujis as $status_uji) {
            Log::channel('stderr')->info(json_encode($status_uji,JSON_PRETTY_PRINT));
        }
    }
}