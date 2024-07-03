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
            'grade_name' => 'الصف الأول الإبتدائي',
            'stage_id' => 1,
        ]);
        Grade::create([
            'grade_name' => 'الصف الثاني الإبتدائي',
            'stage_id' => 1,
        ]);
        Grade::create([
            'grade_name' => 'الصف الثالث الإبتدائي',
            'stage_id' => 1,
        ]);
        Grade::create([
            'grade_name' => 'الصف الرابع الإبتدائي',
            'stage_id' => 1,
        ]);
        Grade::create([
            'grade_name' => 'الصف الخامس الإبتدائي',
            'stage_id' => 1,
        ]);
        Grade::create([
            'grade_name' => 'الصف السادس الإبتدائي',
            'stage_id' => 1,
        ]);

        Grade::create([
            'grade_name' => 'الصف الأول الإعدادي',
            'stage_id' => 2,
        ]);
        Grade::create([
            'grade_name' => 'الصف الثاني الإعدادي',
            'stage_id' => 2,
        ]);
        Grade::create([
            'grade_name' => 'الصف الثالث الإعدادي',
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
