<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'John Doe',
                'title' => 'CEO',
                'company' => 'Tech Solutions',
                'quote' => 'Their team has been instrumental in helping us grow our business. The quality of their work is exceptional.',
                'status' => true,
                'order' => 1
            ],
            [
                'name' => 'Jane Smith',
                'title' => 'Marketing Director',
                'company' => 'Digital Marketing Agency',
                'quote' => 'We have seen significant improvements in our online presence since working with them. Highly recommended!',
                'status' => true,
                'order' => 2
            ],
            [
                'name' => 'Mike Johnson',
                'title' => 'CTO',
                'company' => 'Software Development',
                'quote' => 'Their technical expertise and innovative solutions have helped us stay ahead in the competitive market.',
                'status' => true,
                'order' => 3
            ],
            [
                'name' => 'Sarah Wilson',
                'title' => 'Business Owner',
                'company' => 'E-commerce Store',
                'quote' => 'The customer service and support we received was outstanding. They truly care about their clients.',
                'status' => true,
                'order' => 4
            ],
            [
                'name' => 'David Brown',
                'title' => 'Project Manager',
                'company' => 'Construction',
                'quote' => 'Their attention to detail and professionalism is unmatched. We look forward to working with them again.',
                'status' => true,
                'order' => 5
            ]
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
