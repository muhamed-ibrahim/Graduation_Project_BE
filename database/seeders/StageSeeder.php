<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Stage::truncate();
        Stage::create([
            'stage_name' => 'المرحلة الأبتدائية',
        ]);
        Stage::create([
            'stage_name' => 'المرحلة الأعدادية',
        ]);
        Stage::create([
            'stage_name' => 'المرحلة الثانوية',
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
