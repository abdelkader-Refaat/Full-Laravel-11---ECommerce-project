<?php

namespace Database\Factories;

use App\Models\Category;
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
    protected $model = Category::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl,
            'is_showing' => $this->faker->boolean,
            'is_popular' => $this->faker->boolean,
            'meta_description' => $this->faker->date,
            'meta_title' => $this->faker->title,
            'meta_keywords' => $this->faker->words,
        ];
    }
}
