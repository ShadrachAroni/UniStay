<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            ['name' => 'Bus Stop'],
            ['name' => 'Recycling Facilities'],
            ['name' => 'Event Space'],
            ['name' => 'Shops'],
            ['name' => 'Field'],
            ['name' => 'Football pitch'],
            ['name' => 'Basketball court'],
            ['name' => 'Supermarket'],
            ['name' => 'Pharmacy'],
            ['name' => 'Medical Center'],
            ['name' => 'Hospital'],
            ['name' => 'Dentist'],
            ['name' => 'Gym'],
            ['name' => 'Park'],
            ['name' => 'Mall'],
            ['name' => 'Restaurant'],
            ['name' => 'Café'],
            ['name' => 'Bar/Pub'],
            ['name' => 'Library'],
            ['name' => 'Bookstore'],
            ['name' => 'Art Gallery'],
            ['name' => 'Swimming pool'],
            ['name' => 'Bank'],
            ['name' => 'ATM'],
            ['name' => 'Barber shop'],
            ['name' => 'Salon'],
            ['name' => 'Petrol Station'],
            ['name' => 'Police Station'],
            ['name' => 'Outdoor Market'],
            ['name' => 'Beach'],
            ['name' => 'Church'],
            ['name' => 'Mosque'],
            ['name' => 'Temple'],
            ['name' => 'Car wash'],
            ['name' => 'Highway'],        
        ];

        DB::table('surrounding_areas')->insert($areas);
    }

}
