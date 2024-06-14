<?php

namespace Database\Seeders;

use App\Models\Term;
use App\Models\TermSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class TermSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        TermSubject::truncate();
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 1,
            'grade_id' => 1,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 1,
            'grade_id' => 1,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 2,
            'grade_id' => 1,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 1,
            'grade_id' => 2,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 1,
            'grade_id' => 2,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 2,
            'grade_id' => 2,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 1,
            'grade_id' => 3,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 1,
            'grade_id' => 3,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
