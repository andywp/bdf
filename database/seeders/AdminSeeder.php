<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name' => 'admin',
            'email' => 'bdf@rasalogi.com',
            'password' => bcrypt('admin100%bismillah'),
            'role'      => 'user'
        ]);
    }
}
