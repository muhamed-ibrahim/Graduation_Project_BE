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
        Score::create([
            'student_id' => 1,
            'term_subject_id' => 1,
            'score' => 80,
        ]);

        Score::create([
            'student_id' => 1,
            'term_subject_id' => 3,
            'score' => 90,
        ]);
        Score::create([
            'student_id' => 1,
            'term_subject_id' => 2,
            'score' => 85,
        ]);

        Score::create([
            'student_id' => 1,
            'term_subject_id' => 4,
            'score' => 86,
        ]);

        Score::create([
            'student_id' => 1,
            'term_subject_id' => 5,
            'score' => 82,
        ]);
        Schema::enableForeignKeyConstraints();


    }
}
