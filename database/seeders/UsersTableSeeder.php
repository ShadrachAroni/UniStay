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
            'phone' => mt_rand(100, 999) . '-' . mt_rand(100, 999) . '-' . mt_rand(1000, 9999),
            'address' => 'Nairobi,Kenya',
            'gender' => 'male',
            'Status' => 'verified',
            'verified' => true,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('users')->insert([
            'Fname' => 'Agent',
            'Lname' => 'First',
            'email' => 'agent1@agent.com',
            'role_id' => 3,
            'phone' => mt_rand(100, 999) . '-' . mt_rand(100, 999) . '-' . mt_rand(1000, 9999),
            'address' => mt_rand(100, 999) . ' ' . Str::random(6) . ' St',
            'gender' => 'female',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'Fname' => 'Agent',
            'Lname' => 'Second',
            'email' => 'agent2@agent.com',
            'role_id' => 3,
            'phone' => mt_rand(100, 999) . '-' . mt_rand(100, 999) . '-' . mt_rand(1000, 9999),
            'address' => mt_rand(100, 999) . ' ' . Str::random(6) . ' St',
            'gender' => 'female',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'Fname' => 'Agent',
            'Lname' => 'Third',
            'email' => 'agent3@agent.com',
            'role_id' => 3,
            'phone' => mt_rand(100, 999) . '-' . mt_rand(100, 999) . '-' . mt_rand(1000, 9999),
            'address' => mt_rand(100, 999) . ' ' . Str::random(6) . ' St',
            'gender' => 'male',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'Fname' => 'Student',
            'Lname' => 'First',
            'email' => 'student1@student.edu',
            'role_id' => 2,
            'phone' => mt_rand(100, 999) . '-' . mt_rand(100, 999) . '-' . mt_rand(1000, 9999),
            'address' => mt_rand(100, 999) . ' ' . Str::random(6) . ' St',
            'gender' => 'male',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'Fname' => 'Student',
            'Lname' => 'Second',
            'email' => 'student2@student.edu',
            'role_id' => 2,
            'phone' => mt_rand(100, 999) . '-' . mt_rand(100, 999) . '-' . mt_rand(1000, 9999),
            'address' => mt_rand(100, 999) . ' ' . Str::random(6) . ' St',
            'gender' => 'female',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'Fname' => 'Student',
            'Lname' => 'Third',
            'email' => 'student3@student.edu',
            'role_id' => 2,
            'phone' => mt_rand(100, 999) . '-' . mt_rand(100, 999) . '-' . mt_rand(1000, 9999),
            'address' => mt_rand(100, 999) . ' ' . Str::random(6) . ' St',
            'gender' => 'female',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
