<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Student::truncate();
        Student::create([
            'name' => 'Ahmed Yasser',
            'nationality' => 'مصري',
            'national_id' => '15545985566555',
            'gender' => 'Male',
            'date_of_birth' => '2002/6/16',
            'address' => 'شارع حسن محمد ',
            'state' => 'الجيزة',
            'country' => 'Eygpt',
            'level' => 'الصف الاول الاعدادي',
            'parent_id' =>  1,
            'school_id' =>  1,

        ]);

        Student::create([
            'name' => 'Khaled Mohamed',
            'nationality' => 'مصري',
            'national_id' => '1669556653355',
            'gender' => 'Male',
            'date_of_birth' => '2001/9/1',
            'address' => 'شارع  الهرم ',
            'state' => 'القاهرة',
            'country' => 'Eygpt',
            'level' => 'الصف الثالث الاعدادي',
            'parent_id' =>  2,
            'school_id' =>  2,

        ]);

        Schema::enableForeignKeyConstraints();
    }
}
