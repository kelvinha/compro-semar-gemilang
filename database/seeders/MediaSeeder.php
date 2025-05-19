<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Media;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first user (admin)
        $user = \App\Models\User::first();

        // Create some sample images
        $images = [
            [
                'name' => 'Sample Image 1',
                'file_name' => 'sample-image-1.jpg',
                'mime_type' => 'image/jpeg',
                'path' => 'images/sample-image-1.jpg',
                'disk' => 'public',
                'size' => 1024,
                'alt_text' => 'Sample image 1 description',
                'options' => json_encode([
                    'width' => 1920,
                    'height' => 1080
                ]),
                'type' => 'image'
            ],
            [
                'name' => 'Sample Image 2',
                'file_name' => 'sample-image-2.jpg',
                'mime_type' => 'image/jpeg',
                'path' => 'images/sample-image-2.jpg',
                'disk' => 'public',
                'size' => 1024,
                'alt_text' => 'Sample image 2 description',
                'options' => json_encode([
                    'width' => 1920,
                    'height' => 1080
                ]),
                'type' => 'image'
            ],
            [
                'name' => 'Sample Document',
                'file_name' => 'sample-document.pdf',
                'mime_type' => 'application/pdf',
                'path' => 'documents/sample-document.pdf',
                'disk' => 'public',
                'size' => 2048,
                'alt_text' => 'Sample PDF document',
                'options' => json_encode([
                    'pages' => 10
                ]),
                'type' => 'document'
            ]
        ];

        // Create media items
        foreach ($images as $image) {
            Media::create($image);
        }
    }
}
