<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_category_id' => fake()->optional()->numberBetween(1, 10),
            'description' => fake()->sentence,
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}
