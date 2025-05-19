<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create main menu
        $mainMenu = Menu::create([
            'name' => 'Main Menu',
            'slug' => 'main-menu',
            'location' => 'header',
            'active' => true,
            'order' => 1,
        ]);
        
        // Create footer menu
        $footerMenu = Menu::create([
            'name' => 'Footer Menu',
            'slug' => 'footer-menu',
            'location' => 'footer',
            'active' => true,
            'order' => 1,
        ]);
        
        // Create main menu items
        $mainMenuItems = [
            [
                'name' => 'Home',
                'name_id' => 'Beranda',
                'slug' => 'home',
                'url' => '/',
                'type' => 'page',
                'active' => true,
                'order' => 1,
            ],
            [
                'name' => 'About',
                'name_id' => 'Tentang',
                'slug' => 'about',
                'url' => '/about',
                'type' => 'page',
                'active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Services',
                'name_id' => 'Layanan',
                'slug' => 'services',
                'url' => '/services',
                'type' => 'page',
                'active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Products',
                'name_id' => 'Produk',
                'slug' => 'products',
                'url' => '/products',
                'type' => 'page',
                'active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Blog',
                'name_id' => 'Blog',
                'slug' => 'blog',
                'url' => '/blog',
                'type' => 'page',
                'active' => true,
                'order' => 5,
            ],
            [
                'name' => 'Contact',
                'name_id' => 'Kontak',
                'slug' => 'contact',
                'url' => '/contact',
                'type' => 'page',
                'active' => true,
                'order' => 6,
            ],
        ];
        
        foreach ($mainMenuItems as $item) {
            Submenu::create(array_merge($item, ['menu_id' => $mainMenu->id]));
        }
        
        // Create footer menu items
        $footerMenuItems = [
            [
                'name' => 'Home',
                'name_id' => 'Beranda',
                'slug' => 'footer-home',
                'url' => '/',
                'type' => 'page',
                'active' => true,
                'order' => 1,
            ],
            [
                'name' => 'About',
                'name_id' => 'Tentang',
                'slug' => 'footer-about',
                'url' => '/about',
                'type' => 'page',
                'active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Services',
                'name_id' => 'Layanan',
                'slug' => 'footer-services',
                'url' => '/services',
                'type' => 'page',
                'active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Privacy Policy',
                'name_id' => 'Kebijakan Privasi',
                'slug' => 'privacy-policy',
                'url' => '/privacy-policy',
                'type' => 'page',
                'active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Terms of Service',
                'name_id' => 'Syarat dan Ketentuan',
                'slug' => 'terms-of-service',
                'url' => '/terms-of-service',
                'type' => 'page',
                'active' => true,
                'order' => 5,
            ],
            [
                'name' => 'Contact',
                'name_id' => 'Kontak',
                'slug' => 'footer-contact',
                'url' => '/contact',
                'type' => 'page',
                'active' => true,
                'order' => 6,
            ],
        ];
        
        foreach ($footerMenuItems as $item) {
            Submenu::create(array_merge($item, ['menu_id' => $footerMenu->id]));
        }
    }
}
