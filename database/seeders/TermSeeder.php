<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Term::truncate();
        Term::create([
            'term_name' => 'ترم أول',
        ]);
        Term::create([
            'term_name' => 'ترم تاني',
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
