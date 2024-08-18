<?php

namespace Database\Factories;


use App\Models\Meal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Meal::class;
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "price" => fake()->randomFloat(2,10,100),
            "description" => fake()->text(),
            "available_quantity" =>fake()->randomDigitNotNull(),
            "discount" => 0

        ];
    }

}
