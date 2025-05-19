<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Electronics',
            'Computers',
            'Smartphones',
            'Laptops',
            'Tablets',
            'Accessories',
            'Gaming',
            'Software',
            'Networking',
            'Peripherals',
        ];

        $category = $categories[array_rand($categories)];
        $uniqueNumber = rand(1, 100);

        return [
            'name' => $category . ' ' . $uniqueNumber,
            'description' => fake()->paragraph(2),
            'parent_id' => fake()->boolean(30) ? null : ProductCategory::inRandomOrder()->first()?->id,
            'order' => fake()->numberBetween(1, 10),
            'status' => fake()->randomElement(['active', 'inactive']),
            'meta_title' => $category . ' Category',
            'meta_description' => fake()->sentence(15),
            'meta_keywords' => implode(',', fake()->words(5)),
        ];
    }
}
