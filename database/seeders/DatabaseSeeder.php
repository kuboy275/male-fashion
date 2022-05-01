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
        \App\Models\User::factory(1)->create();
        \App\Models\Product::factory(3)->create();
        \App\Models\Category::factory(3)->create();
        \App\Models\Slider::factory(3)->create();
        \App\Models\Blog::factory(3)->create();
        $this->call([ 
            UserSeeder::class, 
            SettingSeeder::class, 
            PermissionSeeder::class,
            RoleSeeder::class,
            PermissionRoleSeeder::class
        ]);
    }
}
