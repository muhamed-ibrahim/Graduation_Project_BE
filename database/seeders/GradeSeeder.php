<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Grade::truncate();
        Grade::create([
            'grade_name' => 'الصف الأول الابتدائي',
            'stage_id' => 1,
        ]);
        Grade::create([
            'grade_name' => 'الصف الثاني الابتدائي',
            'stage_id' => 1,
        ]);
        Grade::create([
            'grade_name' => 'الصف الثالث الابتدائي',
            'stage_id' => 1,
        ]);
        Grade::create([
            'grade_name' => 'الصف الرابع الابتدائي',
            'stage_id' => 1,
        ]);
        Grade::create([
            'grade_name' => 'الصف الخامس الابتدائي',
            'stage_id' => 1,
        ]);
        Grade::create([
            'grade_name' => 'الصف السادس الابتدائي',
            'stage_id' => 1,
        ]);

        Grade::create([
            'grade_name' => 'الصف الأول الاعدادي',
            'stage_id' => 2,
        ]);
        Grade::create([
            'grade_name' => 'الصف الثاني الاعدادي',
            'stage_id' => 2,
        ]);
        Grade::create([
            'grade_name' => 'الصف الثالث الاعدادي',
            'stage_id' => 2,
        ]);

        Grade::create([
            'grade_name' => 'الصف الأول الثانوي ',
            'stage_id' => 3,
        ]);
        Grade::create([
            'grade_name' => 'الصف الثاني الثانوي',
            'stage_id' => 3,
        ]);
        Grade::create([
            'grade_name' => 'الصف الثالث الثانوي',
            'stage_id' => 3,
        ]);


        Schema::enableForeignKeyConstraints();
    }
}
