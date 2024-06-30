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
        //grade 1 term 1
        TermSubject::create([
            'term_id' => 1,
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
            'subject_id' => 3,
            'grade_id' => 1,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 4,
            'grade_id' => 1,
        ]);


        //grade 1 term 2
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 1,
            'grade_id' => 1,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 2,
            'grade_id' => 1,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 3,
            'grade_id' => 1,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 4,
            'grade_id' => 1,
        ]);


        //grade 2 term 1
        TermSubject::create([
            'term_id' => 1,
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
            'subject_id' => 3,
            'grade_id' => 2,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 4,
            'grade_id' => 2,
        ]);


        //grade 2 term 2
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 1,
            'grade_id' => 2,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 2,
            'grade_id' => 2,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 3,
            'grade_id' => 2,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 4,
            'grade_id' => 2,
        ]);


        //grade 3 term 1
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 1,
            'grade_id' => 3,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 2,
            'grade_id' => 3,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 3,
            'grade_id' => 3,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 4,
            'grade_id' => 3,
        ]);


        //grade 3 term 2
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 1,
            'grade_id' => 3,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 2,
            'grade_id' => 3,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 3,
            'grade_id' => 3,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 4,
            'grade_id' => 3,
        ]);

        //grade 4 term 1
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 1,
            'grade_id' => 4,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 2,
            'grade_id' => 4,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 3,
            'grade_id' => 4,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 4,
            'grade_id' => 4,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 5,
            'grade_id' => 4,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 6,
            'grade_id' => 4,
        ]);

        //grade 4 term 2
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 1,
            'grade_id' => 4,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 2,
            'grade_id' => 4,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 3,
            'grade_id' => 4,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 4,
            'grade_id' => 4,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 5,
            'grade_id' => 4,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 6,
            'grade_id' => 4,
        ]);

        //grade 5 term 1
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 1,
            'grade_id' => 5,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 2,
            'grade_id' => 5,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 3,
            'grade_id' => 5,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 4,
            'grade_id' => 5,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 5,
            'grade_id' => 5,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 6,
            'grade_id' => 5,
        ]);


        //grade 5 term 2
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 1,
            'grade_id' => 5,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 2,
            'grade_id' => 5,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 3,
            'grade_id' => 5,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 4,
            'grade_id' => 5,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 5,
            'grade_id' => 5,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 6,
            'grade_id' => 5,
        ]);

        //grade 6 term 1
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 1,
            'grade_id' => 6,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 2,
            'grade_id' => 6,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 3,
            'grade_id' => 6,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 4,
            'grade_id' => 6,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 5,
            'grade_id' => 6,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 6,
            'grade_id' => 6,
        ]);


        //grade 6 term 2
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 1,
            'grade_id' => 6,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 2,
            'grade_id' => 6,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 3,
            'grade_id' => 6,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 4,
            'grade_id' => 6,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 5,
            'grade_id' => 6,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 6,
            'grade_id' => 6,
        ]);

        //second stage
        //grade 7 term 1
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 1,
            'grade_id' => 7,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 3,
            'grade_id' => 7,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 4,
            'grade_id' => 7,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 5,
            'grade_id' => 7,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 6,
            'grade_id' => 7,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 7,
            'grade_id' => 7,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 8,
            'grade_id' => 7,
        ]);


        //grade 7 term 2
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 1,
            'grade_id' => 7,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 3,
            'grade_id' => 7,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 4,
            'grade_id' => 7,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 5,
            'grade_id' => 7,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 6,
            'grade_id' => 7,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 7,
            'grade_id' => 7,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 8,
            'grade_id' => 7,
        ]);

        //grade 8 term 1
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 1,
            'grade_id' => 8,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 3,
            'grade_id' => 8,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 4,
            'grade_id' => 8,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 5,
            'grade_id' => 8,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 6,
            'grade_id' => 8,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 7,
            'grade_id' => 8,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 8,
            'grade_id' => 8,
        ]);


        //grade 8 term 2
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 1,
            'grade_id' => 8,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 3,
            'grade_id' => 8,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 4,
            'grade_id' => 8,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 5,
            'grade_id' => 8,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 6,
            'grade_id' => 8,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 7,
            'grade_id' => 8,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 8,
            'grade_id' => 8,
        ]);

        //grade 9 term 1
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 1,
            'grade_id' => 9,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 3,
            'grade_id' => 9,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 4,
            'grade_id' => 9,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 5,
            'grade_id' => 9,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 6,
            'grade_id' => 9,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 7,
            'grade_id' => 9,
        ]);
        TermSubject::create([
            'term_id' => 1,
            'subject_id' => 8,
            'grade_id' => 9,
        ]);


        //grade 9 term 2
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 1,
            'grade_id' => 9,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 3,
            'grade_id' => 9,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 4,
            'grade_id' => 9,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 5,
            'grade_id' => 9,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 6,
            'grade_id' => 9,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 7,
            'grade_id' => 9,
        ]);
        TermSubject::create([
            'term_id' => 2,
            'subject_id' => 8,
            'grade_id' => 9,
        ]);



        Schema::enableForeignKeyConstraints();
    }
}
