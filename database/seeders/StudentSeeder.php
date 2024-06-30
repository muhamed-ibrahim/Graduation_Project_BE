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
            'name' => 'ibrahim mohamed',
            'nationality' => 'مصري',
            'national_id' => 147896325489888,
            'gender' => 'Male',
            'religion' => 'Muslim',
            'date_of_birth' => '2002/1/1',
            'address' =>  'شارع الطوابق',
            'state' => 'الجيزة',
            'country' => 'Eygpt',
            'image' => '1714668179.jpg',
            'childbirth_certificate' => '1714668179.png',
            'stage_id' => 1,
            'grade_id' => 1,
            'user_id' =>  1,
            'school_id' =>  1,

        ]);
        Student::create([
            'name' => 'Ahmed Yasser',
            'nationality' => 'مصري',
            'national_id' => 15545985566555,
            'gender' => 'Male',
            'religion' => 'Muslim',
            'date_of_birth' => '2002/6/16',
            'address' => 'السيدة زينب',
            'state' => 'القاهرة',
            'country' => 'Eygpt',
            'image' => '1714668179.jpg',
            'childbirth_certificate' => '1714668179.png',
            'stage_id' => 1,
            'grade_id' => 2,
            'user_id' =>  1,
            'school_id' =>  1,

        ]);

        Student::create([
            'name' => 'khaled mahmoud',
            'nationality' => 'مصري',
            'national_id' => 168452684556655,
            'gender' => 'Male',
            'religion' => 'Muslim',
            'date_of_birth' => '2002/7/19',
            'address' =>  '',
            'state' => 'الجيزة',
            'country' => 'Eygpt',
            'image' => '1714668179.jpg',
            'childbirth_certificate' => '1714668179.png',
            'stage_id' => 1,
            'grade_id' => 2,
            'user_id' =>  2,
            'school_id' =>  1,

        ]);

        Student::create([
            'name' => 'samy mohsen',
            'nationality' => 'مصري',
            'national_id' => 14785214785214,
            'gender' => 'Male',
            'religion' => 'Muslim',
            'date_of_birth' => '2002/2/10',
            'address' =>  'شارع الطالبية',
            'state' => 'الجيزة',
            'country' => 'Eygpt',
            'image' => '1714668179.jpg',
            'childbirth_certificate' => '1714668179.png',
            'stage_id' => 1,
            'grade_id' => 1,
            'user_id' =>  2,
            'school_id' =>  1,

        ]);

        Student::create([
            'name' => 'Khaled Mohamed',
            'nationality' => 'مصري',
            'national_id' => 1669556653355,
            'gender' => 'Male',
            'religion' => 'Muslim',
            'date_of_birth' => '2001/9/1',
            'address' => 'شارع  حلمية الزيتون ',
            'state' => 'القاهرة',
            'country' => 'Eygpt',
            'image' => '1714668179.jpg',
            'childbirth_certificate' => '1714668179.png',
            'stage_id' => 1,
            'grade_id' => 1,
            'user_id' =>  3,
            'school_id' =>  2,

        ]);

        Student::create([
            'name' => 'mohy Mohamed',
            'nationality' => 'مصري',
            'national_id' => 1597456321845,
            'gender' => 'Male',
            'religion' => 'Muslim',
            'date_of_birth' => '2001/8/1',
            'address' => 'شارع المرج الجديد ',
            'state' => 'القاهرة',
            'country' => 'Eygpt',
            'image' => '1714668179.jpg',
            'childbirth_certificate' => '1714668179.png',
            'stage_id' => 1,
            'grade_id' => 1,
            'user_id' =>  4,
            'school_id' =>  2,

        ]);

        Student::create([
            'name' => 'wael Magdy',
            'nationality' => 'مصري',
            'national_id' => 4896512354789,
            'gender' => 'Male',
            'religion' => 'Muslim',
            'date_of_birth' => '2001/9/12',
            'address' => 'شارع بورسعيد ',
            'state' => 'القاهرة',
            'country' => 'Eygpt',
            'image' => '1714668179.jpg',
            'childbirth_certificate' => '1714668179.png',
            'stage_id' => 2,
            'grade_id' => 9,
            'user_id' =>  2,
            'school_id' =>  2,

        ]);

        Student::create([
            'name' => 'yahia mahmoud',
            'nationality' => 'مصري',
            'national_id' => 47565898547789,
            'gender' => 'Male',
            'religion' => 'Muslim',
            'date_of_birth' => '2001/6/13',
            'address' => 'شارع  الويل ',
            'state' => 'القاهرة',
            'country' => 'Eygpt',
            'image' => '1714668179.jpg',
            'childbirth_certificate' => '1714668179.png',
            'stage_id' => 1,
            'grade_id' => 5,
            'user_id' =>  5,
            'school_id' =>  2,

        ]);

        Schema::enableForeignKeyConstraints();
    }
}
