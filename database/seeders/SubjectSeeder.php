<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Subject::truncate();
        Subject::create([
            'type' => 'أساسية',
            'subject_name' => 'اللغة العربية',
        ]);
        Subject::create([
            'type' => 'أساسية',
            'subject_name' => 'الرياضيات',
        ]);
        Subject::create([
            'type' => 'فرعية',
            'subject_name' => 'التربية الدينية',
        ]);
        Subject::create([
            'type' => 'أساسية',
            'subject_name' => 'اللغة الإنجليزية',
        ]);
        Subject::create([
            'type' => 'أساسية',
            'subject_name' => 'العلوم',
        ]);
        Subject::create([
            'type' => 'أساسية',
            'subject_name' => 'الدراسات الاجتماعية',
        ]);
        Subject::create([
            'type' => 'أساسية',
            'subject_name' => 'جبر',
        ]);
        Subject::create([
            'type' => 'أساسية',
            'subject_name' => 'هندسة',
        ]);
        Subject::create([
            'type' => 'أساسية',
            'subject_name' => 'جغرافيا ',
        ]);
        Subject::create([
            'type' => 'أساسية',
            'subject_name' => 'تاريخ',
        ]);
        Subject::create([
            'type' => 'أساسية',
            'subject_name' => 'فيزياء',
        ]);
        Subject::create([
            'type' => 'أساسية',
            'subject_name' => 'أحياء',
        ]);
        Subject::create([
            'type' => 'أساسية',
            'subject_name' => 'كيمياء',
        ]);
        Subject::create([
            'type' => 'فرعية',
            'subject_name' => 'التربية الفنية',
        ]);
        Subject::create([
            'type' => 'فرعية',
            'subject_name' => 'التربية البدنية',
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
