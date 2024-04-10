<?php

namespace Database\Seeders;

use App\Models\Pemerintah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemerintahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i < 4; $i++) {
            $admin = new Pemerintah();
            $admin->username_pemerintah = 'pemerintah_' . $i;
            $admin->pw_pemerintah = fake()->password();
            $admin->email_pemerintah = fake()->email();
            $admin->telp_pemerintah = fake()->phoneNumber();
            $admin->id_kecamatan = $i;
            $admin->save();
        }
    }
}
