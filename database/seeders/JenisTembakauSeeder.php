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
        $jenis_tembakau = new JenisTembakau();
        $jenis_tembakau->id_jenis_tembakau = 1;
        $jenis_tembakau->jenis_tembakau = 'Voor Oogst (VO)';
        $jenis_tembakau->save();

        $jenis_tembakau = new JenisTembakau();
        $jenis_tembakau->id_jenis_tembakau = 2;
        $jenis_tembakau->jenis_tembakau = 'No Oogst (NO)';
        $jenis_tembakau->save();
        
        $jenis_tembakau = new JenisTembakau();
        $jenis_tembakau->id_jenis_tembakau = 3;
        $jenis_tembakau->jenis_tembakau = 'Virginia';
        $jenis_tembakau->save();
    }
}
