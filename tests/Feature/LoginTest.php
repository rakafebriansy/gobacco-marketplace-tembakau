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
        $this->seed([JenisKelaminSeeder::class,KecamatanSeeder::class, PetaniTembakauSeeder::class]);

        //view
        $this->get('/petani/login')->assertSeeText('Petani | Login')->assertSeeText('Hello Petani');

        //post failed
        $this->post('/petani/login',[
            'email_petani' => 'rasa@gmail.com',
            'pw_petani' => '12345'
        ])->assertRedirect('/petani/login');

        //post success
        $this->post('/petani/login',[
            'email_petani' => 'retha@gmail.com',
            'pw_petani' => '12345'
        ])->assertRedirect('/petani/akun');
    }
    public function testLoginPemerintah()
    {
        $this->seed([KecamatanSeeder::class, PemerintahSeeder::class]);

        //view
        $this->get('/pemerintah/login')->assertSeeText('Pemerintah | Login')->assertSeeText('Hello Pemerintah');

        //post failed
        $this->post('/pemerintah/login',[
            'email_pemerintah' => 'rasa@gmail.com',
            'pw_pemerintah' => '12345'
        ])->assertRedirect('/pemerintah/login');

        //post success
        $this->post('/pemerintah/login',[
            'email_pemerintah' => 'dinas001@gmail.com',
            'pw_pemerintah' => 'dinas123'
        ])->assertRedirect('/pemerintah/akun');
    }
    public function testLoginAdmin()
    {
        $this->seed([KecamatanSeeder::class, AdminSeeder::class]);

        //view
        $this->get('/admin/login')->assertSeeText('Admin | Login')->assertSeeText('Hello Admin');

        //post failed
        $this->post('/admin/login',[
            'username' => 'rasa@gmail.com',
            'password' => '12345'
        ])->assertRedirect('/admin/login');

        //post success
        $this->post('/admin/login',[
            'username' => 'admin@gmail.com',
            'password' => '99999'
        ])->assertRedirect('/admin/akun');
    }
}
