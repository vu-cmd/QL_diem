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
        \App\Models\Classroom::factory(10)->create();
        \App\Models\User::factory(100)->create();
        \App\Models\Subject::factory(10)->create();
        \App\Models\Score::factory(1000)->create();
    }
}
