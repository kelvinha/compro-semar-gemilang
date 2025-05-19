<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    public function definition(): array
    {
        $testimonials = [
            'Professional',
            'Innovative',
            'Reliable',
            'Creative',
            'Dedicated',
            'Efficient',
            'Trustworthy'
        ];

        $testimonial = $testimonials[array_rand($testimonials)];
        $uniqueNumber = rand(1, 100);

        return [
            'name' => fake()->name(),
            'title' => $testimonial . ' ' . $uniqueNumber,
            'company' => fake()->company(),
            'quote' => fake()->paragraph(3),
            'status' => fake()->boolean(80),
            'order' => fake()->numberBetween(1, 10),
        ];
    }
}
