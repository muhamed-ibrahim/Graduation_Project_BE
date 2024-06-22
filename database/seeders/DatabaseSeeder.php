<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Term;
use App\Models\Grade;
use App\Models\Stage;
use App\Models\School;
use App\Models\AdEvent;
use App\Models\Student;
use App\Models\TermSubject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([

            AdminstrationSeeder::class,
            AdminstrationAdminSeeder::class,
            SchoolSeeder::class,
            SchoolManagerSeeder::class,
            SchoolStaffSeeder::class,
            UserSeeder::class,
            StudentSeeder::class,
            StageSeeder::class,
            GradeSeeder::class,
            TermSeeder::class,
            SubjectSeeder::class,
            TermSubjectSeeder::class,
            ScoreSeeder::class,
            SchoolStageSeeder::class,



        ]);
    }
}
