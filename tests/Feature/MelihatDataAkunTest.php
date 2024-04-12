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

class MelihatDataAkunTest extends TestCase
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
    public function test_AdminSuccess()
    {
        $this->seed([KecamatanSeeder::class,AdminSeeder::class]);
        
        $admin = Admin::first();
        $this->withSession(['id_admin' => $admin->id_admin])->get('/admin/akun')->assertSeeText('Admin | Profil')->assertSeeText('Username: admin@gmail.com');
    }
    public function test_AdminFailed()
    {

        $this->get('/admin/akun')->assertRedirect('admin/login');
    }
    public function test_PemerintahSuccess()
    {
        $this->seed([KecamatanSeeder::class,PemerintahSeeder::class]);
        
        $pemerintah = Pemerintah::first();
        $this->withSession(['id_pemerintah' => $pemerintah->id_pemerintah])->get('/pemerintah/akun')->assertSeeText('Pemerintah | Profil')->assertSeeText('Username: dinas_pertanian_001');
    }
    public function test_PemerintahFailed()
    {

        $this->get('/pemerintah/akun')->assertRedirect('pemerintah/login');
    }
    public function test_PetaniSuccess()
    {
        $this->seed([JenisKelaminSeeder::class,KecamatanSeeder::class,PetaniTembakauSeeder::class]);
        
        $petani = PetaniTembakau::first();
        $this->withSession(['id_petani' => $petani->id_petani])->get('/petani/akun')->assertSeeText('Petani | Profil')->assertSeeText('Username: retha');
    }
    public function test_petaniFailed()
    {

        $this->get('/petani/akun')->assertRedirect('petani/login');
    }
}
