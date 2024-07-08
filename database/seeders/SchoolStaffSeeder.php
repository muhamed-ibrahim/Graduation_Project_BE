<?php

namespace Database\Seeders;

use App\Models\SchoolStaff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class SchoolStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        SchoolStaff::truncate();
        SchoolStaff::create([
            'staff_name' => 'محمد احمد',
            'email' => 'mohamed@school.com',
            'staff_phone' => '01555455555',
            'staff_address' => 'مدينة نصر',
            'birthdate' => '2000-02-03',
            'staff_role' => 'مسؤل تحويل الطلاب',
            'school_id' => 1,

        ]);

        SchoolStaff::create([
            'staff_name' => 'امير',
            'email' => 'amer@school.com',
            'staff_phone' => '01555455555',
            'staff_address' => 'مدينة بدر',
            'birthdate' => '1999-06-18',
            'staff_role' => 'مسؤل تسجيل الطلاب',
            'school_id' => 1,

        ]);
        Schema::enableForeignKeyConstraints();
    }
}
