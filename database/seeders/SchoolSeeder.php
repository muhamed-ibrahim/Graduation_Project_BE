<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        School::truncate();
        School::create([
            'name' => 'مدرسة العمرانية بنين',
            'address' => 'شارع الطوابق',
            'phone' => '0225998897',
            'image' => '1711868111.png',
            'adminstration_id' => 2,
            'lat' => '-10.4966636',
            'lng' => '121.9729053',
            'rank' => '4',
        ]);
        School::create([
            'name' => 'مدرسة مصطفي كامل',
            'address' => 'شارع حسن محمد',
            'phone' => '0225568897',
            'image' => '1711868111.png',
            'adminstration_id' => 1,
            'lat' => '46.344514',
            'lng' => '129.543632',
            'rank' => '4',

        ]);
        Schema::enableForeignKeyConstraints();

    }
}
