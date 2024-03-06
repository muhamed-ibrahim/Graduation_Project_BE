<?php

namespace Database\Seeders;

use App\Models\SchoolManager;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class SchoolManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        SchoolManager::truncate();
        SchoolManager::create([
            'manager_name' => 'Magdy',
            'manager_email' => 'magdy@gmail.com',
            'manager_phone' => '01555455555',
            'manager_address' => 'الوراق',
            'password' => Hash::make('12345678'),
            'school_id' => 1,

        ]);
        SchoolManager::create([
            'manager_name' => 'Youssef',
            'manager_email' => 'youssef@gamil.com',
            'manager_phone' => '01251645556',
            'manager_address' => 'كرداسة',
            'password' => Hash::make('12345678'),
            'school_id' => 2,

        ]);
        Schema::enableForeignKeyConstraints();
    }
}
