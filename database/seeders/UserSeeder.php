<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Test Parent',
        //     'email' => 'parent@gmail.com',
        //     'password' => bcrypt('12345678'),
        // ]);

        Schema::disableForeignKeyConstraints();

        User::truncate();
        User::create([
            'name' => 'Yassmin Wael',
            'email' => 'yassmin@gmail.com',
            'phone' => '012655666565',
            'address' => 'مدينة نصر',
            'gender' => 'female',
            'job' => 'مهندسة',
            'national_id' => '23355252216246',
            'nationality' => 'مصرية',
            'religion' => 'مسلمة',
            'birthdate' => '1990-05-11',
            'password' => bcrypt('12345678'),

        ]);
        User::create([
            'name' => 'Salah Mohamed',
            'email' => 'salah@gmail.com',
            'phone' => '011155126565',
            'address' => 'مدينة بدر',
            'gender' => 'male',
            'job' => 'دكتور',
            'national_id' => '24455252218249',
            'nationality' => 'مصري',
            'religion' => 'مسلم',
            'birthdate' => '1995-09-18',
            'password' => bcrypt('12345678'),
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
