<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Pemerintah;
use App\Models\PetaniTembakau;
use Database\Seeders\AdminSeeder;
use Database\Seeders\JenisKelaminSeeder;
use Database\Seeders\KecamatanSeeder;
use Database\Seeders\PemerintahSeeder;
use Database\Seeders\PetaniTembakauSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class ProfilTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        DB::delete('DELETE FROM admins');
        DB::delete('DELETE FROM pemerintahs');
        DB::delete('DELETE FROM petani_tembakaus');
        DB::delete('DELETE FROM jenis_kelamins');
        DB::delete('DELETE FROM kecamatans');
        Session::flush();
    }
    public function testProfilAdminSuccess()
    {
        $this->seed([KecamatanSeeder::class,AdminSeeder::class]);
        
        $admin = Admin::first();
        $this->withSession(['id_admin' => $admin->id_admin])->get('/admin/profil')->assertSeeText('Admin | Profil')->assertSeeText('admin@gmail.com');
    }
    public function testProfilAdminFailed()
    {

        $this->get('/admin/profil')->assertRedirect('admin/login');
    }
    public function testProfilPemerintahSuccess()
    {
        $this->seed([KecamatanSeeder::class,PemerintahSeeder::class]);
        
        $pemerintah = Pemerintah::first();
        $this->withSession(['id_pemerintah' => $pemerintah->id_pemerintah])->get('/pemerintah/profil')->assertSeeText('Pemerintah | Profil')->assertSeeText('dinas_pertanian_001');
    }
    public function testProfilPemerintahFailed()
    {

        $this->get('/pemerintah/profil')->assertRedirect('pemerintah/login');
    }
    public function testProfilPetaniSuccess()
    {
        $this->seed([JenisKelaminSeeder::class,KecamatanSeeder::class,PetaniTembakauSeeder::class]);
        
        $petani = PetaniTembakau::first();
        $this->withSession(['id_petani' => $petani->id_petani])->get('/petani/profil')->assertSeeText('Petani | Profil')->assertSeeText('retha');
    }
    public function testProfilpetaniFailed()
    {

        $this->get('/petani/profil')->assertRedirect('petani/login');
    }
}
