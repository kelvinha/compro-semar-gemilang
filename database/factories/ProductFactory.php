<?php

namespace Database\Factories;

use App\Models\ProductCategory;
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
        // Create a default category if none exists
        if (ProductCategory::count() === 0) {
            ProductCategory::create([
                'name' => 'Default Category',
                'description' => 'Default product category',
                'order' => 1,
                'status' => 'active',
            ]);
        }

        $categories = ProductCategory::all();
        $category = $categories->random();

        $products = [
            'Smartphone',
            'Laptop',
            'Tablet',
            'Headphones',
            'Camera',
            'Smartwatch',
            'Gaming Console',
            'External Hard Drive',
            'Keyboard',
            'Mouse',
        ];

        $product = $products[array_rand($products)];
        $uniqueNumber = rand(1, 100);

        return [
            'title' => $product . ' ' . $uniqueNumber . ' ' . fake()->randomElement(['Pro', 'Max', 'Ultra', 'Mini', 'Lite']),
            'short_description' => fake()->sentence(10),
            'description' => fake()->paragraph(5),
            'price' => fake()->numberBetween(100, 1000),
            'sale_price' => fake()->numberBetween(80, 900),
            'sku' => 'SKU-' . fake()->unique()->numberBetween(10000, 99999),
            'stock' => fake()->numberBetween(0, 100),
            'category_id' => $category->id,
            'order' => fake()->numberBetween(1, 10),
            'status' => fake()->randomElement(['active', 'inactive']),
            'featured' => fake()->boolean(),
            'meta_title' => $product . ' Product',
            'meta_description' => fake()->sentence(15),
            'meta_keywords' => implode(',', fake()->words(5)),
        ];
    }
}
