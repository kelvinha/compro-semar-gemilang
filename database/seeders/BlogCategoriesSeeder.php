<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'Articles about technology and innovation',
                'parent_id' => null,
                'order' => 1
            ],
            [
                'name' => 'Programming',
                'slug' => 'programming',
                'description' => 'Programming tutorials and tips',
                'parent_id' => 1,
                'order' => 1
            ],
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Web development articles and guides',
                'parent_id' => 1,
                'order' => 2
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
                'description' => 'Design inspiration and tutorials',
                'parent_id' => null,
                'order' => 2
            ],
            [
                'name' => 'UI/UX',
                'slug' => 'ui-ux',
                'description' => 'User interface and user experience design',
                'parent_id' => 4,
                'order' => 1
            ],
            [
                'name' => 'Graphics',
                'slug' => 'graphics',
                'description' => 'Graphic design and illustration',
                'parent_id' => 4,
                'order' => 2
            ],
            [
                'name' => 'Business',
                'slug' => 'business',
                'description' => 'Business and entrepreneurship articles',
                'parent_id' => null,
                'order' => 3
            ],
            [
                'name' => 'Marketing',
                'slug' => 'marketing',
                'description' => 'Digital marketing and SEO',
                'parent_id' => 7,
                'order' => 1
            ],
            [
                'name' => 'Social Media',
                'slug' => 'social-media',
                'description' => 'Social media marketing and management',
                'parent_id' => 7,
                'order' => 2
            ]
        ];

        foreach ($categories as $categoryData) {
            $category = BlogCategory::create($categoryData);
            
            // Create SEO settings for the category
            $category->seo()->create([
                'title' => $category->name,
                'description' => $category->description,
                'keywords' => implode(',', [
                    $category->name,
                    'category',
                    'blog',
                    'articles'
                ]),
                'og_title' => $category->name,
                'og_description' => $category->description,
                'og_image' => null
            ]);
        }
    }
}
