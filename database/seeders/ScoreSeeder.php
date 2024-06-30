<?php

namespace Database\Seeders;

use App\Models\Score;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Score::truncate();
        //first student
        Score::create([
            'student_id' => 1,
            'term_subject_id' => 1,
            'score' => 80,
        ]);
        Score::create([
            'student_id' => 1,
            'term_subject_id' => 2,
            'score' => 85,
        ]);
        Score::create([
            'student_id' => 1,
            'term_subject_id' => 3,
            'score' => 90,
        ]);
        Score::create([
            'student_id' => 1,
            'term_subject_id' => 4,
            'score' => 91,
        ]);
        Score::create([
            'student_id' => 1,
            'term_subject_id' => 5,
            'score' => 89,
        ]);
        Score::create([
            'student_id' => 1,
            'term_subject_id' => 6,
            'score' => 89,
        ]);
        Score::create([
            'student_id' => 1,
            'term_subject_id' => 7,
            'score' => 84,
        ]);
        Score::create([
            'student_id' => 1,
            'term_subject_id' => 8,
            'score' => 87,
        ]);

        //second student

        Score::create([
            'student_id' => 2,
            'term_subject_id' => 1,
            'score' => 84,
        ]);
        Score::create([
            'student_id' => 2,
            'term_subject_id' => 2,
            'score' => 81,
        ]);
        Score::create([
            'student_id' => 2,
            'term_subject_id' => 3,
            'score' => 96,
        ]);
        Score::create([
            'student_id' => 2,
            'term_subject_id' => 4,
            'score' => 94,
        ]);
        Score::create([
            'student_id' => 2,
            'term_subject_id' => 5,
            'score' => 90,
        ]);
        Score::create([
            'student_id' => 2,
            'term_subject_id' => 6,
            'score' => 89,
        ]);
        Score::create([
            'student_id' => 2,
            'term_subject_id' => 7,
            'score' => 74,
        ]);
        Score::create([
            'student_id' => 2,
            'term_subject_id' => 8,
            'score' => 70,
        ]);





        Schema::enableForeignKeyConstraints();


    }
}
