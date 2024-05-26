<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // Admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'admin',
                'status' => 'active',
            ],
            
            // Agent
            [
                'name' => 'Agent',
                'username' => 'agent',
                'email' => 'agent@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'agent',
                'status' => 'active',
            ],

            // User
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'user',
                'status' => 'active',
            ],

        ]);
    }
}
