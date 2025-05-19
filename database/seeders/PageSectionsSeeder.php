<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\Media;
use App\Models\SeoSetting;

class PageSectionsSeeder extends Seeder
{
    public function run()
    {
        // First create some media items for testing
        $mediaItems = $this->createTestMedia();

        // Get all pages
        $pages = Page::with('sections', 'seo')->get();

        foreach ($pages as $page) {
            // Create a hero section with slider
            $heroSection = $page->sections()->create([
                'name' => 'Hero Section',
                'name_id' => 'Seksi Hero',
                'type' => 'slider',
                'order' => 1,
                'active' => true,
                'options' => json_encode([
                    'height' => '400px',
                    'autoplay' => true,
                    'interval' => 5000
                ])
            ]);

            // Add media items to the slider
            $heroSection->media()->attach(collect($mediaItems)->pluck('id')->toArray());

            // Create a content section
            $page->sections()->create([
                'name' => 'Main Content',
                'name_id' => 'Konten Utama',
                'type' => 'text',
                'order' => 2,
                'active' => true,
                'content' => "<h2>Welcome to {$page->name}</h2>
                <p>This is the main content section for the page.</p>",
                'content_id' => "<h2>Selamat Datang di {$page->name}</h2>
                <p>Ini adalah bagian konten utama untuk halaman ini.</p>"
            ]);

            // Create a gallery section
            $gallerySection = $page->sections()->create([
                'name' => 'Gallery',
                'name_id' => 'Galeri',
                'type' => 'gallery',
                'order' => 3,
                'active' => true,
                'options' => json_encode([
                    'columns' => 3,
                    'lightGallery' => true
                ])
            ]);

            // Add media items to the gallery
            $galleryMedia = Media::inRandomOrder()->take(6)->get();
            $gallerySection->media()->attach($galleryMedia->pluck('id')->toArray());

            // Create a video section
            $page->sections()->create([
                'name' => 'Video Section',
                'name_id' => 'Seksi Video',
                'type' => 'video',
                'order' => 4,
                'active' => true,
                'video_url' => 'https://www.youtube.com/watch?v=example',
                'options' => json_encode([
                    'width' => '100%',
                    'height' => '400px',
                    'autoplay' => false
                ])
            ]);

            // Create SEO for the page
            $this->createPageSEO($page);
        }
    }

    private function createTestMedia()
    {
        // Create some test media items
        $media = [
            [
                'name' => 'Test Image 1',
                'file_name' => 'test-image-1.jpg',
                'mime_type' => 'image/jpeg',
                'path' => 'test-image-1.jpg',
                'size' => 1024,
                'options' => json_encode([
                    'width' => 1920,
                    'height' => 1080
                ]),
                'type' => 'image'
            ],
            [
                'name' => 'Test Image 2',
                'file_name' => 'test-image-2.jpg',
                'mime_type' => 'image/jpeg',
                'path' => 'test-image-2.jpg',
                'size' => 1024,
                'options' => json_encode([
                    'width' => 1920,
                    'height' => 1080
                ]),
                'type' => 'image'
            ],
            [
                'name' => 'Test Image 3',
                'file_name' => 'test-image-3.jpg',
                'mime_type' => 'image/jpeg',
                'path' => 'test-image-3.jpg',
                'size' => 1024,
                'options' => json_encode([
                    'width' => 1920,
                    'height' => 1080
                ]),
                'type' => 'image'
            ]
        ];

        $mediaItems = [];
        foreach ($media as $item) {
            $mediaItems[] = Media::create($item);
        }

        return $mediaItems;
    }

    private function createPageSEO($page)
    {
        $seoSettings = [
            'title' => $page->name,
            'description' => "Welcome to {$page->name}. This is a dynamically generated meta description.",
            'keywords' => implode(',', [
                $page->name,
                'homepage',
                'website',
                'content',
                'information'
            ]),
            'og_title' => $page->name,
            'og_description' => "Welcome to {$page->name}. This is a dynamically generated Open Graph description.",
            'og_image' => Media::inRandomOrder()->first() ? Media::inRandomOrder()->first()->path : null
        ];

        // Update or create SEO settings for the page using polymorphic relationship
        SeoSetting::updateOrCreate(
            [
                'seoable_type' => get_class($page),
                'seoable_id' => $page->id
            ],
            $seoSettings
        );
    }
}
