<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
                    'name'	=> 'Andi Wijang Prasetyo',
                    'email'	=> 'andy.wijang@gmail.com',
                    'password'	=> '$2y$10$VLGhGNJ83frBH5ylS/IxfOSD3dnkg2YTV50BNZWz/1cGVtdz4eZUy'
        ]);

        \App\Models\Admin::create([
            'name'	=> 'raslogi',
            'email'	=> 'rasalogweb@gmail.com',
            'password'	=> '$2y$10$NxtbEsvCdS1557fuzC6Yru0LSSgntakOw5U8dXg9D7NTkk0DZEwsK'
        ]);
    }
}
