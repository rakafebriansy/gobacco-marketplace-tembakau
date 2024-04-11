<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for($i = 1; $i < 4; $i++) {
        //     $admin = new Admin();
        //     $admin->id_admin = $i;
        //     $admin->username = 'admin_' . $i;
        //     $admin->password = fake()->password();
        //     $admin->id_kecamatan = $i;
        //     $admin->save();
        // }

        $admin = new Admin();
        $admin->id_admin = 1;
        $admin->username = 'admin@gmail.com';
        $admin->password = '99999';
        $admin->id_kecamatan = 2;
        $admin->save();
    }
}
