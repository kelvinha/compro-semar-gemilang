<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        $services = [
            'Web Development',
            'Mobile App Development',
            'Digital Marketing',
            'UI/UX Design',
            'Cloud Solutions',
            'Cyber Security',
        ];

        $icons = [
            'fas fa-code',
            'fas fa-mobile-alt',
            'fas fa-chart-line',
            'fas fa-paint-brush',
            'fas fa-cloud',
            'fas fa-shield-alt',
        ];

        $service = $services[array_rand($services)];
        $icon = $icons[array_rand($icons)];
        $uniqueNumber = rand(1, 100);

        return [
            'title' => $service . ' ' . $uniqueNumber,
            'icon' => $icon,
            'short_description' => fake()->sentence(10),
            'description' => fake()->paragraph(5),
            'order' => fake()->numberBetween(1, 10),
            'status' => fake()->randomElement(['active', 'inactive']),
            'featured' => fake()->boolean(),
            'meta_title' => $service . ' Service',
            'meta_description' => fake()->sentence(15),
            'meta_keywords' => implode(',', fake()->words(5)),
        ];
    }
}
