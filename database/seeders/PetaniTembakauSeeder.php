<?php

namespace Database\Seeders;

use App\Models\PetaniTembakau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetaniTembakauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PetaniTembakau::factory(5)->create();
    }
}
