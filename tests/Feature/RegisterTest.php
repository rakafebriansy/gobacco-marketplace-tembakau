<?php

namespace Tests\Feature;

use Database\Seeders\JenisKelaminSeeder;
use Database\Seeders\KecamatanSeeder;
use Database\Seeders\PetaniTembakauSeeder;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        DB::delete('DELETE FROM petani_tembakaus');
        DB::delete('DELETE FROM jenis_kelamins');
        DB::delete('DELETE FROM kecamatans');
    }
    public function testPetani()
    {
        $this->seed([JenisKelaminSeeder::class,KecamatanSeeder::class, PetaniTembakauSeeder::class]);

        //view
        $this->get('/petani/register')->assertSeeText('Petani | Register')->assertSeeText('Hello Guest');

        //post failed
        $this->post('/petani/register',[
            'nama_petani' => '',
            'username_petani' => '',
            'pw_petani' => '',
            'email_petani' => '',
            'id_jenis_kelamin' => '',
            'alamat_petani' => '',
            'id_kecamatan' => '',
            'telp_petani' => '',
            'noktp_petani' => '',
        ])->assertRedirect('/petani/register');

        //post success
        $this->post('/petani/register',[
            'nama_petani' => 'Muhammad Rindaman',
            'username_petani' => 'Rindaman',
            'pw_petani' => '12345',
            'email_petani' => 'petani@gmail.com',
            'id_jenis_kelamin' => 'laki-laki',
            'alamat_petani' => 'Jl. Mangga',
            'id_kecamatan' => 'kecamatan_1',
            'telp_petani' => '081266732213',
            'noktp_petani' => '3729792394',
        ])->assertRedirect('/petani/login');
    }
}
