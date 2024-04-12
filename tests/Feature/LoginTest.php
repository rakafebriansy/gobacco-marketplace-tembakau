<?php

namespace Tests\Feature;

use Database\Seeders\AdminSeeder;
use Database\Seeders\JenisKelaminSeeder;
use Database\Seeders\KecamatanSeeder;
use Database\Seeders\PemerintahSeeder;
use Database\Seeders\PetaniTembakauSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LoginTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        DB::delete('DELETE FROM admins');
        DB::delete('DELETE FROM pemerintahs');
        DB::delete('DELETE FROM petani_tembakaus');
        DB::delete('DELETE FROM jenis_kelamins');
        DB::delete('DELETE FROM kecamatans');
    }
    public function testLoginPetani()
    {
        $this->get('/petani/login')->assertSeeText('Petani | Login')->assertSeeText('Hello Petani');
    }
    public function testLoginPetaniFailed()
    {
        $this->post('/petani/login',[
            'email_petani' => 'rasa@gmail.com',
            'pw_petani' => '12345'
        ])->assertRedirect('/');
    }
    public function testLoginPetaniSuccess()
    {
        $this->seed([JenisKelaminSeeder::class,KecamatanSeeder::class, PetaniTembakauSeeder::class]);

        $this->post('/petani/login',[
            'email_petani' => 'retha@gmail.com',
            'pw_petani' => '12345'
        ])->assertRedirect('/petani/profil');
    }
    public function testLoginPemerintahView()
    {
        $this->get('/pemerintah/login')->assertSeeText('Pemerintah | Login')->assertSeeText('Hello Pemerintah');
    }
    public function testLoginPemerintahFailed()
    {
        $this->post('/pemerintah/login',[
            'email_pemerintah' => 'rasa@gmail.com',
            'pw_pemerintah' => '12345'
        ])->assertRedirect('/');
    }
    public function testLoginPemerintahSuccess()
    {
        $this->seed([KecamatanSeeder::class, PemerintahSeeder::class]);

        $this->post('/pemerintah/login',[
            'email_pemerintah' => 'dinas001@gmail.com',
            'pw_pemerintah' => 'dinas123'
        ])->assertRedirect('/pemerintah/profil');
    }
    public function testLoginAdminView()
    {

        $this->get('/admin/login')->assertSeeText('Admin | Login')->assertSeeText('Hello Admin');
    }
    public function testLoginAdminFailed()
    {
        $this->post('/admin/login',[
            'username' => 'rasa@gmail.com',
            'password' => '12345'
        ])->assertRedirect('/');
    }
    public function testLoginAdminSuccess()
    {
        $this->seed([KecamatanSeeder::class, AdminSeeder::class]);
        $this->post('/admin/login',[
            'username' => 'admin@gmail.com',
            'password' => '99999'
        ])->assertRedirect('/admin/profil');
    }
}
