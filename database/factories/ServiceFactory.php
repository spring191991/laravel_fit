<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->realText(rand(70, 100));
        return [
            'category_id' => rand(1, 12),
            'name' => $name,
            'excerpt' => fake()->realText(rand(100, 120)),
            'content' => fake()->realText(rand(200, 300)),
            'slug' => Str::slug($name),
            'created_at' => fake()->dateTimeBetween('-60 days', '-30 days'),
            'updated_at' => fake()->dateTimeBetween('-20 days', '-1 days'),
        ];
    }
}
