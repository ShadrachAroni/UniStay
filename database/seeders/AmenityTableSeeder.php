<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AmenityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amenities = [
            ['name' => 'Cleaning Services'],
            ['name' => 'Game Room'],
            ['name' => 'Study Room'],
            ['name' => 'Kitchen'],
            ['name' => 'Shared Kitchen'],
            ['name' => 'Lounge'],
            ['name' => 'Roof Terrace'],
            ['name' => 'Shop'],
            ['name' => 'Library'],
            ['name' => 'ATM'],
            ['name' => 'Laundry'],
          
        ];

        DB::table('property_amenities')->insert($amenities);
    }

}
