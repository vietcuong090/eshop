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
            // name Thường được sử dụng để đặt tên cho một thực thể hoặc đối tượng.
            'name' => $this->faker->name(),
            // desc Thường được sử dụng để cung cấp một mô tả chi tiết hơn về một thực thể hoặc đối tượng.
            'desc' => $this->faker->realText(),
        ];
    }
}
