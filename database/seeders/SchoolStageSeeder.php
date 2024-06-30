<?php

namespace Database\Seeders;

use App\Models\Stage;
use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class SchoolStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('school_stage')->truncate();


        $school1 = School::find(1);
        $school2 = School::find(2);
        $school3 = School::find(3);
        $school4 = School::find(4);
        $school5 = School::find(5);
        $school6 = School::find(6);
        $school7 = School::find(7);


        $stage1 = Stage::find(1);
        $stage2 = Stage::find(2);
        $stage3 = Stage::find(3);

        $school1->stages()->attach([$stage1->id, $stage2->id]);
        $school2->stages()->attach($stage1->id);
        $school3->stages()->attach($stage2->id);
        $school4->stages()->attach($stage1->id);
        $school5->stages()->attach($stage2->id);
        $school6->stages()->attach($stage3->id);
        $school7->stages()->attach([$stage1->id, $stage2->id, $stage3->id]);






        Schema::enableForeignKeyConstraints();
    }
}
