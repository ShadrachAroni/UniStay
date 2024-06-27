<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Budget Accommodation'],
            ['name' => 'Luxury Accommodation'],
            ['name' => 'Short-Term Rental'],
            ['name' => 'Long-Term Rental'],
            ['name' => 'Furnished'],
            ['name' => 'Unfurnished'],
            ['name' => 'Pets allowed'],
            ['name' => 'No-pets Allowed'],
            ['name' => 'Non-Smoking'],
            ['name' => 'Female-Only'],
            ['name' => 'Male-Only'],
            ['name' => 'Family Accommodation'],
            ['name' => 'International Student Housing'],
            ['name' => 'Eco-Friendly Housing'],
        ];

        DB::table('property_categories')->insert($categories);
    }
}
