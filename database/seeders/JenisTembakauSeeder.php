<?php

namespace Database\Seeders;

use App\Models\JenisTembakau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisTembakauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i < 6; $i++) {
            $jenis_tembakau = new JenisTembakau();
            $jenis_tembakau->id_jenis_tembakau = $i;
            $jenis_tembakau->jenis_tembakau = fake()->word();
            $jenis_tembakau->gmb_tembakau = fake()->word() . '.png';
            $jenis_tembakau->save();
        }
    }
}
