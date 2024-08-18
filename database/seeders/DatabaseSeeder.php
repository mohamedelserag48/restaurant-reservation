<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AppConfigSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(DiningTableSeeder::class);
        $this->call(MealTableSeeder::class);
    }
}
