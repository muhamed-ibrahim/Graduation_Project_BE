<?php

namespace Database\Seeders;

use App\Models\AdAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminstrationAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        AdAdmin::truncate();
        AdAdmin::create([
            'name' => 'Mohamed Ibrahim',
            'email' => 'mohamed@gmail.com',
            'phone' => '01056288945',
            'password' => Hash::make('12345678'),
            'adminstration_id' => 1,
        ]);
        AdAdmin::create([
            'name' => 'Youssef Tarek',
            'email' => 'youssef@gmail.com',
            'phone' => '01156288945',
            'password' => Hash::make('12345678'),
            'adminstration_id' => 2,

        ]);
        Schema::enableForeignKeyConstraints();
    }
}
