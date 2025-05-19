<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\Menu;

class PagesTableSeeder extends Seeder
{
    public function run()
    {
        // Create main menu if it doesn't exist
        $mainMenu = Menu::firstOrCreate([
            'name' => 'Main Menu',
            'slug' => 'main-menu',
            'location' => 'header',
            'active' => true,
            'order' => 1
        ]);

        $pages = [
            [
                'name' => 'Home',
                'url' => '/',
                'menu_id' => $mainMenu->id,
                'active' => true,
                'order' => 1,
                'options' => json_encode([
                    'layout' => 'full_width',
                    'header_style' => 'default'
                ])
            ],
            [
                'name' => 'About Us',
                'url' => '/about',
                'menu_id' => $mainMenu->id,
                'active' => true,
                'order' => 2,
                'options' => json_encode([
                    'layout' => 'full_width',
                    'header_style' => 'default'
                ])
            ],
            [
                'name' => 'Services',
                'url' => '/services',
                'menu_id' => $mainMenu->id,
                'active' => true,
                'order' => 3,
                'options' => json_encode([
                    'layout' => 'full_width',
                    'header_style' => 'default'
                ])
            ],
            [
                'name' => 'Contact',
                'url' => '/contact',
                'menu_id' => $mainMenu->id,
                'active' => true,
                'order' => 4,
                'options' => json_encode([
                    'layout' => 'full_width',
                    'header_style' => 'default'
                ])
            ],
            [
                'name' => 'Blog',
                'url' => '/blog',
                'menu_id' => $mainMenu->id,
                'active' => true,
                'order' => 5,
                'options' => json_encode([
                    'layout' => 'blog',
                    'header_style' => 'default'
                ])
            ]
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
