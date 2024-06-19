<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'Fname' => 'Admin',
            'Lname' => 'admin',
            'email' => 'admin@admin.com',
            'role_id' => 1,
            'phone' => '1234567891',
            'address' => '123 Main St, City',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('users')->insert([
            'Fname' => 'Agent',
            'Lname' => 'agent',
            'email' => 'agent@agent.com',
            'role_id' => 3,
            'phone' => '1234567892',
            'address' => '123 Main St, City',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'Fname' => 'User',
            'Lname' => 'User',
            'email' => 'user@user.com',
            'role_id' => 2,
            'phone' => '1234567893',
            'address' => '123 Main St, City',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
