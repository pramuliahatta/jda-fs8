<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(50),
            'category' => fake()->randomElement(['Berita', 'Acara']),
            'photo' => fake()->randomElement(['upload/article/1.jpg', 'upload/article/2.jpg', 'upload/article/3.jpg']),
        ];
    }
}
