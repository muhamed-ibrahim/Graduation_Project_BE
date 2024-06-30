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
            'subject_name' => 'اللغة العربية',
        ]);
        Subject::create([
            'subject_name' => 'الرياضيات',
        ]);
        Subject::create([
            'subject_name' => 'التربية الدينية',
        ]);
        Subject::create([
            'subject_name' => 'اللغة الإنجليزية',
        ]);
        Subject::create([
            'subject_name' => 'العلوم',
        ]);
        Subject::create([
            'subject_name' => 'الدراسات الاجتماعية',
        ]);
        Subject::create([
            'subject_name' => 'جبر',
        ]);
        Subject::create([
            'subject_name' => 'هندسة',
        ]);
        Subject::create([
            'subject_name' => 'جغرافيا ',
        ]);
        Subject::create([
            'subject_name' => 'تاريخ',
        ]);
        Subject::create([
            'subject_name' => 'فيزياء',
        ]);
        Subject::create([
            'subject_name' => 'أحياء',
        ]);
        Subject::create([
            'subject_name' => 'كيمياء',
        ]);
        Subject::create([
            'subject_name' => 'التربية الفنية',
        ]);
        Subject::create([
            'subject_name' => 'التربية البدنية',
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
