<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          \app\Models\User::factory()->create(),
          \app\Models\Admin::factory()->create(),
          \app\Models\Agent::factory()->create(),
        ]);
    }
}
