<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            ['name' => 'Wi-Fi'],
            ['name' => 'Air Conditioning'],
            ['name' => 'Heating'],
            ['name' => 'Laundry'],
            ['name' => 'In unit Laundry'],
            ['name' => 'Fully Equipped Kitchen'],
            ['name' => 'Kitchen'],
            ['name' => 'Private Bathroom'],
            ['name' => 'Shared Bathroom'],
            ['name' => 'Shared room'],
            ['name' => 'Balcony'],
            ['name' => 'Garden'],
            ['name' => 'Parking'],
            ['name' => 'Security'],
            ['name' => 'Smoke Detectors'],
            ['name' => 'Study Area'],
            ['name' => 'Storage Space'],
            ['name' => 'Hardwood Floors'],
            ['name' => 'Concrete Floors'],
            ['name' => 'TV'],
            ['name' => 'Gym'],
            ['name' => 'pool'],
            ['name' => 'Swimming pool'],
            ['name' => 'Elevator'],
            ['name' => 'Pool table'],
            ['name' => 'Closets'],
            ['name' => 'Wardrobes'],          
        ];

        DB::table('property_features')->insert($features);
    }

}
