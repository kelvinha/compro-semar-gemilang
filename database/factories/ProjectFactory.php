<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $projectTypes = [
            'Office Building',
            'Residential Complex',
            'Shopping Mall',
            'Hospital',
            'School',
            'Factory',
            'Warehouse',
            'Bridge',
            'Road Construction',
            'Water Treatment Plant',
        ];

        $projectName = $projectTypes[array_rand($projectTypes)] . ' ' . fake()->city();
        $clientName = fake()->company();
        
        return [
            'project_name' => $projectName,
            'client_name' => $clientName,
            'project_description' => fake()->paragraphs(3, true),
            'completion_date' => fake()->dateTimeBetween('-2 years', '+1 year'),
            'location' => fake()->city() . ', ' . fake()->country(),
            'order' => fake()->numberBetween(1, 10),
            'status' => fake()->randomElement(['active', 'inactive']),
            'featured' => fake()->boolean(30),
            'meta_title' => $projectName . ' | ' . $clientName,
            'meta_description' => fake()->sentence(15),
            'meta_keywords' => implode(',', fake()->words(5)),
        ];
    }
}
