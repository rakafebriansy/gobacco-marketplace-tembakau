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
        for($i = 1; $i < 4; $i++) {
            $status_uji = new StatusUji();
            $status_uji->id_status = $i;
            $status_uji->status_uji = fake()->word();
            $status_uji->save();
        }
    }
}
