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
        // \App\Models\Groupe::factory(5)->create();
        // \App\Models\Role::factory(1)->create();
        \App\Models\RoleUser::factory(1)->create();
        // \App\Models\User::factory(28)->create();
    }
}
