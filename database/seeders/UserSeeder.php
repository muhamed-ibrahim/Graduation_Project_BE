<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Test Parent',
        //     'email' => 'parent@gmail.com',
        //     'password' => bcrypt('12345678'),
        // ]);

        Schema::disableForeignKeyConstraints();

        User::truncate();
        User::create([
            'name' => 'Yassmin Wael',
            'email' => 'yassmin@gmail.com',
            'password' => bcrypt('12345678'),

        ]);
        User::create([
            'name' => 'Salah Mohamed',
            'email' => 'salah@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
