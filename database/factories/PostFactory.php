<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence,
            'slug' => $this->faker->unique()->slug,
            'excerpt' => $this->faker->unique()->sentence,
            'body' => $this->faker->unique()->paragraph,
            "user_id" => User::factory(),
            "category_id" => Category::factory()
        ];
    }
}
