<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BlogsSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user if it doesn't exist
        $admin = User::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => 'Admin User',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);

        // Create some blog categories if they don't exist
        $categories = BlogCategory::pluck('id')->toArray();

        $blogs = [
            [
                'user_id' => $admin->id,
                'category_id' => $categories[0],
                'title' => 'Introduction to Laravel',
                'title_id' => 'Pengenalan Laravel',
                'slug' => 'introduction-to-laravel',
                'excerpt' => 'Laravel is a PHP framework that follows the Model-View-Controller (MVC) architectural pattern. It provides tools needed for large, robust web applications.',
                'excerpt_id' => 'Laravel adalah framework PHP yang mengikuti pola arsitektur Model-View-Controller (MVC). It menyediakan alat yang diperlukan untuk aplikasi web yang besar dan kokoh.',
                'content' => '<p>Laravel is a PHP framework that follows the Model-View-Controller (MVC) architectural pattern. It provides tools needed for large, robust web applications.</p>',
                'content_id' => '<p>Laravel adalah framework PHP yang mengikuti pola arsitektur Model-View-Controller (MVC). It menyediakan alat yang diperlukan untuk aplikasi web yang besar dan kokoh.</p>',
                'status' => 'published',
                'featured' => true,
                'published_at' => now()
            ],
            [
                'user_id' => $admin->id,
                'category_id' => $categories[1],
                'title' => 'Getting Started with Vue.js',
                'title_id' => 'Memulai dengan Vue.js',
                'slug' => 'getting-started-with-vuejs',
                'excerpt' => 'Vue.js is a progressive JavaScript framework for building user interfaces. It is designed to be incrementally adoptable.',
                'excerpt_id' => 'Vue.js adalah framework JavaScript yang progresif untuk membangun antarmuka pengguna. It dirancang untuk dapat diadopsi secara bertahap.',
                'content' => '<p>Vue.js is a progressive JavaScript framework for building user interfaces. It is designed to be incrementally adoptable.</p>',
                'content_id' => '<p>Vue.js adalah framework JavaScript yang progresif untuk membangun antarmuka pengguna. It dirancang untuk dapat diadopsi secara bertahap.</p>',
                'status' => 'published',
                'featured' => false,
                'published_at' => now()
            ],
            [
                'user_id' => $admin->id,
                'category_id' => $categories[2],
                'title' => 'Modern CSS Techniques',
                'title_id' => 'Teknik CSS Modern',
                'slug' => 'modern-css-techniques',
                'excerpt' => 'Learn about the latest CSS features and techniques that can enhance your web development workflow.',
                'excerpt_id' => 'Pelajari tentang fitur dan teknik CSS terbaru yang dapat meningkatkan alur kerja pengembangan web Anda.',
                'content' => '<p>Learn about the latest CSS features and techniques that can enhance your web development workflow.</p>',
                'content_id' => '<p>Pelajari tentang fitur dan teknik CSS terbaru yang dapat meningkatkan alur kerja pengembangan web Anda.</p>',
                'status' => 'draft',
                'featured' => false,
                'published_at' => null
            ]
        ];

        foreach ($blogs as $blogData) {
            $blog = Blog::create($blogData);
            
            // Create SEO settings for the blog
            $blog->seo()->create([
                'title' => $blog->title,
                'description' => $blog->excerpt,
                'keywords' => implode(',', [
                    $blog->title,
                    'blog',
                    'article',
                    'content'
                ]),
                'og_title' => $blog->title,
                'og_description' => $blog->excerpt,
                'og_image' => null
            ]);
        }
    }
}
