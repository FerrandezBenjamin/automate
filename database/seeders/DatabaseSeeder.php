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
        // \App\Models\Role::factory(1)->create();


        \App\Models\Role::factory()->create([
            'name' => 'administrator',
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'user',
        ]);

        \App\Models\User::factory(1)->create();


        // \App\Models\RoleUsers::factory(1)->create();

        \App\Models\RoleUsers::factory()->create([
            'user_id' => 1,
            'role_id' => 1,
        ]);
        \App\Models\RoleUsers::factory()->create([
            'user_id' => 1,
            'role_id' => 2,
        ]);

        \App\Models\Groupe::factory(5)->create();
    }
}
