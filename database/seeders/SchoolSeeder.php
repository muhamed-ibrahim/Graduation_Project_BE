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

        School::create([
            'name' => 'مدرسة أم المؤمنين الإعدادية',
            'address' => 'شارع السيدة زينب',
            'phone' => '0225566897',
            'image' => '1711868111.png',
            'adminstration_id' => 3,
            'lat' => '56.344514',
            'lng' => '111.511632',
            'rank' => '3',
        ]);

        School::create([
            'name' => 'مدرسة احمد بن طولون',
            'address' => 'شارع احمد بن طولون',
            'phone' => '0239566195',
            'image' => '1711868111.png',
            'adminstration_id' => 3,
            'lat' => '13.26831',
            'lng' => '43.50993',
            'rank' => '2',
        ]);

        School::create([
            'name' => 'مدرسة البهية البرهانية الإعدادية',
            'address' => 'الدرب الاحمر السيدة زينب',
            'phone' => '0255599195',
            'image' => '1711868111.png',
            'adminstration_id' => 3,
            'lat' => '29.806827',
            'lng' => '113.013638',
            'rank' => '4',
        ]);

        School::create([
            'name' => 'مدرسة السيده زينب الثانويه',
            'address' => 'السيدة زينب',
            'phone' => '02755192195',
            'image' => '1711868111.png',
            'adminstration_id' => 3,
            'lat' => '43.3937074',
            'lng' => '147.2679116',
            'rank' => '1',
        ]);

        School::create([
            'name' => 'مدرسة احمد ماهر الثانوية الصناعية بنين',
            'address' => 'شارع سكة الهياتم، أمام بنك القاهرة، السيدة زينب',
            'phone' => '02545596195',
            'image' => '1711868111.png',
            'adminstration_id' => 3,
            'lat' => '41.91583',
            'lng' => '21.53056',
            'rank' => '2',
        ]);








        Schema::enableForeignKeyConstraints();

    }
}
