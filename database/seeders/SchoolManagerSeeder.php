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
            'manager_name' => 'مجدي خالد',
            'email' => 'magdy@school.com',
            'manager_phone' => '01555455555',
            'manager_address' => 'الوراق',
            'password' => Hash::make('12345678'),
            'school_id' => 1,

        ]);
        SchoolManager::create([
            'manager_name' => 'يوسف طارق',
            'email' => 'youssef@school.com',
            'manager_phone' => '01251645556',
            'manager_address' => 'كرداسة',
            'password' => Hash::make('12345678'),
            'school_id' => 2,

        ]);
        SchoolManager::create([
            'manager_name' => 'كريم فوزي',
            'email' => 'karim@school.com',
            'manager_phone' => '01151445556',
            'manager_address' => 'السيدة زينب',
            'password' => Hash::make('12345678'),
            'school_id' => 3,

        ]);

        SchoolManager::create([
            'manager_name' => 'اسامة خالد',
            'email' => 'osama@school.com',
            'manager_phone' => '01551475556',
            'manager_address' => 'مدينة نصر',
            'password' => Hash::make('12345678'),
            'school_id' => 4,

        ]);
        SchoolManager::create([
            'manager_name' => 'خالد صالح',
            'email' => 'khaled@school.com',
            'manager_phone' => '01151445556',
            'manager_address' => 'القصر العيني',
            'password' => Hash::make('12345678'),
            'school_id' => 5,

        ]);

        SchoolManager::create([
            'manager_name' => 'حمادة السيد',
            'email' => 'hamada@school.com',
            'manager_phone' => '010514451235',
            'manager_address' => 'القصر العيني',
            'password' => Hash::make('12345678'),
            'school_id' => 6,
        ]);

        SchoolManager::create([
            'manager_name' => 'محمد خالد',
            'email' => 'mohamed123@school.com',
            'manager_phone' => '010514451235',
            'manager_address' => 'المرج',
            'password' => Hash::make('12345678'),
            'school_id' => 7,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
