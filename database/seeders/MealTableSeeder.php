<?php

namespace Database\Seeders;




use App\Models\Meal;
use Illuminate\Database\Seeder;

class MealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Meal::factory()->count(20)->create();
    }
}
