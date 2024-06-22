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

        $stage1 = Stage::find(1);
        $stage2 = Stage::find(2);
        $stage3 = Stage::find(3);

        $school1->stages()->attach([$stage1->id, $stage2->id]);
        $school2->stages()->attach($stage1->id);

        Schema::enableForeignKeyConstraints();
    }
}