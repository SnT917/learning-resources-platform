<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resources>
 */
class ResourcesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'link' => $this->faker->url,
            'category_id' => Category::factory(),
            'creator_id' => User::factory(),
        ];
    }
}
