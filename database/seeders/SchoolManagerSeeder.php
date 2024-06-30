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
            'email' => 'magdy@gmail.com',
            'manager_phone' => '01555455555',
            'manager_address' => 'الوراق',
            'password' => Hash::make('12345678'),
            'school_id' => 1,

        ]);
        SchoolManager::create([
            'manager_name' => 'Youssef',
            'email' => 'youssef@gamil.com',
            'manager_phone' => '01251645556',
            'manager_address' => 'كرداسة',
            'password' => Hash::make('12345678'),
            'school_id' => 2,

        ]);
        SchoolManager::create([
            'manager_name' => 'karim',
            'email' => 'karim@gamil.com',
            'manager_phone' => '01151445556',
            'manager_address' => 'السيدة زينب',
            'password' => Hash::make('12345678'),
            'school_id' => 3,

        ]);

        SchoolManager::create([
            'manager_name' => 'osama',
            'email' => 'osama@gamil.com',
            'manager_phone' => '01551475556',
            'manager_address' => 'مدينة نصر',
            'password' => Hash::make('12345678'),
            'school_id' => 4,

        ]);
        SchoolManager::create([
            'manager_name' => 'khaled',
            'email' => 'khaled@gamil.com',
            'manager_phone' => '01151445556',
            'manager_address' => 'القصر العيني',
            'password' => Hash::make('12345678'),
            'school_id' => 5,

        ]);

        SchoolManager::create([
            'manager_name' => 'hamada',
            'email' => 'hamada@gamil.com',
            'manager_phone' => '010514451235',
            'manager_address' => 'القصر العيني',
            'password' => Hash::make('12345678'),
            'school_id' => 6,
        ]);

        SchoolManager::create([
            'manager_name' => 'mohamed khaled',
            'email' => 'mohamed123@gamil.com',
            'manager_phone' => '010514451235',
            'manager_address' => 'المرج',
            'password' => Hash::make('12345678'),
            'school_id' => 7,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
