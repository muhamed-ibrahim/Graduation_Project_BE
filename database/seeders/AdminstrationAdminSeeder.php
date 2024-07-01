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
            'image' => '1714968179.png',
            'address' => 'شارع المرج الجديد',
            'phone' => '01056288945',
            'password' => Hash::make('12345678'),
            'adminstration_id' => 1,
        ]);
        AdAdmin::create([
            'name' => 'Youssef Tarek',
            'email' => 'youssef@gmail.com',
            'image' => '1714968179.png',
            'address' => 'شارع حلون',
            'phone' => '01156288945',
            'password' => Hash::make('12345678'),
            'adminstration_id' => 2,

        ]);

        AdAdmin::create([
            'name' => 'hamdy mohamed',
            'email' => 'hamdy@gmail.com',
            'image' => '1714968179.png',
            'phone' => '01056281000',
            'address' => 'شارع مجلس الشعب',
            'password' => Hash::make('12345678'),
            'adminstration_id' => 3,
        ]);
        Schema::enableForeignKeyConstraints();
    }

}
