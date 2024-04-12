<?php

namespace Database\Seeders;

use App\Models\StatusUji;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusUjiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status_uji = new StatusUji();
        $status_uji->id_status = 1;
        $status_uji->status_uji = 'Konfirmasi';
        $status_uji->save();
        
        $status_uji = new StatusUji();
        $status_uji->id_status = 2;
        $status_uji->status_uji = 'Tolak';
        $status_uji->save();

        $status_uji = new StatusUji();
        $status_uji->id_status = 3;
        $status_uji->status_uji = 'Proses';
        $status_uji->save();
    }
}
