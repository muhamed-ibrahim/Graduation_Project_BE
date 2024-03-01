<?php

namespace Database\Seeders;

use App\Models\Adminstration;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminstrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Adminstration::truncate();
        Adminstration::create([
            'name' => 'إدارة العمرنية',
            'address' => 'شارع سهل حمزة',
            'phone' => '0225568897',
            'state' => 'الجيزة',
        ]);
        Adminstration::create([
            'name' => 'إدارة الهرم',
            'address' => 'شارع الطوابق ',
            'phone' => '0265568897',
            'state' => 'الجيزة',
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
