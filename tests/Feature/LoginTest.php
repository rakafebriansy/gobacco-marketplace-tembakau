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
        DB::delete('DELETE FROM sertifikasi_produks');
        DB::delete('DELETE FROM jenis_tembakaus');
        DB::delete('DELETE FROM jenis_pengujians');
        DB::delete('DELETE FROM status_ujis');
        DB::delete('DELETE FROM pemerintahs');
        DB::delete('DELETE FROM petani_tembakaus');
        DB::delete('DELETE FROM admins');
        DB::delete('DELETE FROM jenis_kelamins');
        DB::delete('DELETE FROM kecamatans');
    }
    public function test_Petani()
    {
        $this->get('/petani/login')->assertSeeText('Petani | Login')->assertSeeText('Masuk dengan akun anda');
    }
    public function test_PetaniFailed()
    {
        $this->post('/petani/login',[
            'email_petani' => 'rasa@gmail.com',
            'pw_petani' => '12345'
        ])->assertRedirect('/');
    }
    public function test_PetaniSuccess()
    {
        $this->seed([JenisKelaminSeeder::class,KecamatanSeeder::class, PetaniTembakauSeeder::class]);

        $this->post('/petani/login',[
            'username_petani' => 'retha',
            'pw_petani' => '12345'
        ])->assertRedirect('/petani/akun');
    }

    public function test_PemerintahView()
    {
        $this->get('/pemerintah/login')->assertSeeText('Pemerintah | Login')->assertSeeText('Hello Pemerintah');
    }
    public function test_PemerintahFailed()
    {
        $this->post('/pemerintah/login',[
            'email_pemerintah' => 'rasa@gmail.com',
            'pw_pemerintah' => '12345'
        ])->assertRedirect('/');
    }
    public function test_PemerintahSuccess()
    {
        $this->seed([KecamatanSeeder::class, PemerintahSeeder::class]);

        $this->post('/pemerintah/login',[
            'email_pemerintah' => 'dinas001@gmail.com',
            'pw_pemerintah' => 'dinas123'
        ])->assertRedirect('/pemerintah/akun');
    }
    public function test_AdminView()
    {

        $this->get('/admin/login')->assertSeeText('Admin | Login')->assertSeeText('Hello Admin');
    }
    public function test_AdminFailed()
    {
        $this->post('/admin/login',[
            'username' => 'rasa@gmail.com',
            'password' => '12345'
        ])->assertRedirect('/');
    }
    public function test_AdminSuccess()
    {
        $this->seed([KecamatanSeeder::class, AdminSeeder::class]);
        $this->post('/admin/login',[
            'username' => 'admin@gmail.com',
            'password' => '99999'
        ])->assertRedirect('/admin/akun');
    }
    public function testAlreadyLoginPetani()
    {
        $this->withSession(['id_petani' => 1])->get('/petani/login')->assertRedirect('/petani/akun');
    }
    public function testAlreadyLoginPemerintah()
    {
        $this->withSession(['id_pemerintah' => 1])->get('/pemerintah/login')->assertRedirect('/pemerintah/akun');
    }
    public function testAlreadyLoginAdmin()
    {
        $this->withSession(['id_admin' => 1])->get('/admin/login')->assertRedirect('/admin/akun');
    }
}
