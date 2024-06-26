<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\productPhoto>
 */
class ProductPhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => rand(1,30),
            'photo' => fake()->randomElement(['upload/product/1.jpg', 'upload/product/2.jpg', 'upload/product/3.jpg']),
        ];
    }
}
