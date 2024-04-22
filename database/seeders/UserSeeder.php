<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create new user
        User::create([
            'name' => 'Test Parent',
            'email' => 'parent@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
