<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Apartment'],
            ['name' => 'Condo'],
            ['name' => 'Townhouse'],
            ['name' => 'Detached House'],
            ['name' => 'Cottage'],
            ['name' => 'Penthouse'],
            ['name' => 'Duplex'],
            ['name' => 'Loft'],
            ['name' => 'Studio'],
            ['name' => 'Hostel'],
            ['name' => 'Private Room'],
            ['name' => 'Twin Room'],
            ['name' => 'Shared Room'],
            ['name' => 'Guest House'],
          
        ];

        DB::table('property_types')->insert($types);
    }

}
