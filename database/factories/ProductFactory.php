<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'img' => $this->faker->name(),
            'name' => $this->faker->name(),
            'desc' => $this->faker->realText(),
            'price' => $this->faker->randomDigit(),
            'quantity' => $this->faker->numberBetween(),
            'category_id' => 1,
        ];
    }
}
