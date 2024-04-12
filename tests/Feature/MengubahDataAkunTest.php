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

class MengubahDataAkunTest extends TestCase
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
    public function testMengubahDataAkun_AdminSuccess()
    {
        $this->seed([KecamatanSeeder::class,AdminSeeder::class]);
        
        $admin = Admin::first();
        $this->withSession(['id_admin' => $admin->id_admin])->patch('/admin/akun', [
            'username' => 'an.admin@gmail.com',
            'password' => '12224'
        ])->assertRedirect('/admin/akun');
    }
    public function testMengubahDataAkun_AdminFailed()
    {
        $this->patch('/admin/akun')->assertRedirect('/');
    }
    public function testMengubahDataAkun_PemerintahSuccess()
    {
        $this->seed([KecamatanSeeder::class,PemerintahSeeder::class]);
        
        $pemerintah = Pemerintah::first();
        $this->withSession(['id_pemerintah' => $pemerintah->id_pemerintah])->patch('/pemerintah/akun', [
            'username_pemerintah' => 'dinas002@gmail.com',
            'pw_pemerintah' => '12224'
        ])->assertRedirect('/pemerintah/akun');
    }
    public function testMengubahDataAkun_PemerintahFailed()
    {
        $this->patch('/pemerintah/akun')->assertRedirect('/');
    }
    public function testMengubahDataAkun_petaniSuccess()
    {
        $this->seed([JenisKelaminSeeder::class,KecamatanSeeder::class,PetaniTembakauSeeder::class]);
        
        $petani = PetaniTembakau::first();
        $this->withSession(['id_petani' => $petani->id_petani])->patch('/petani/akun', [
            'username_petani' => 'raka@gmail.com',
            'pw_petani' => '12224'
        ])->assertRedirect('/petani/akun');
    }
    public function testMengubahDataAkun_PetaniFailed()
    {
        $this->patch('/petani/akun')->assertRedirect('/');
    }
    
}
