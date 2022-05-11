<?php

namespace Database\Seeders;

use App\Models\Todos;
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
//        User::factory()->count(10)->create();
        Todos::factory()->count(100)->create();
    }
}
