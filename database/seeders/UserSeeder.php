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
            'phone' => '01265666565',
            'address' => 'السيدة زينب',
            'gender' => 'female',
            'job' => 'مهندسة',
            'national_id' => '23355252216246',
            'nationality' => 'مصرية',
            'religion' => 'مسلمة',
            'birthdate' => '1990-05-11',
            'password' => bcrypt('12345678'),
            'national_id_image' => '1714668111.png',
            'lat' => '50.4573262',
            'lng' => '29.8126551',

        ]);
        User::create([
            'name' => 'Moataz Ashraf',
            'email' => 'moataz@gmail.com',
            'phone' => '01565616965',
            'address' => 'الدرب الاحمر',
            'gender' => 'male',
            'job' => 'طيار',
            'national_id' => '27355942211476',
            'nationality' => 'مصري',
            'religion' => 'مسلم',
            'birthdate' => '1992-07-16',
            'password' => bcrypt('12345678'),
            'national_id_image' => '1714668111.png',
            'lat' => '-17.3878955',
            'lng' => '-145.582949',

        ]);
        User::create([
            'name' => 'Salah Mohamed',
            'email' => 'salah@gmail.com',
            'phone' => '01115126565',
            'address' => 'الهرم',
            'gender' => 'male',
            'job' => 'دكتور',
            'national_id' => '24455252218249',
            'nationality' => 'مصري',
            'religion' => 'مسلم',
            'birthdate' => '1996-04-20',
            'password' => bcrypt('12345678'),
            'national_id_image' => '1714668111.png',
            'lat' => '40.8318278',
            'lng' => '44.2797884',

        ]);

        User::create([
            'name' => 'Wael Magdy',
            'email' => 'wael@gmail.com',
            'phone' => '01215122615',
            'address' => 'حلمية الزيتون',
            'gender' => 'male',
            'job' => 'محامي',
            'national_id' => '24455252218249',
            'nationality' => 'مصري',
            'religion' => 'مسلم',
            'birthdate' => '1994-01-15',
            'password' => bcrypt('12345678'),
            'national_id_image' => '1714668111.png',
            'lat' => '9.08556',
            'lng' => '125.57278',
        ]);

        User::create([
            'name' => 'Mohamed Emad',
            'email' => 'mohamed@gmail.com',
            'phone' => '01015119615',
            'address' => 'السيدة زينب',
            'gender' => 'male',
            'job' => 'محامي',
            'national_id' => '23655257218249',
            'nationality' => 'مصري',
            'religion' => 'مسلم',
            'birthdate' => '1997-09-18',
            'password' => bcrypt('12345678'),
            'national_id_image' => '1714668111.png',
            'lat' => '14.51667',
            'lng' => '-89.76667',
        ]);

        User::create([
            'name' => 'Youssef Yasser',
            'email' => 'youssef@gmail.com',
            'phone' => '01112518645',
            'address' => 'المرج',
            'gender' => 'male',
            'job' => 'ضابط شرطة',
            'national_id' => '15655496211289',
            'nationality' => 'مصري',
            'religion' => 'مسلم',
            'birthdate' => '1994-10-01',
            'password' => bcrypt('12345678'),
            'national_id_image' => '1714668111.png',
            'lat' => '-27.01139	',
            'lng' => '-49.5483671',
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
