<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run the roles and permissions seeder first
        $this->call(RolesAndPermissionsSeeder::class);

        // Run the users seeder
        $this->call(UsersTableSeeder::class);

        // Run the media seeder
        $this->call(MediaSeeder::class);

        // Run the website settings seeder
        $this->call(WebsiteSettingSeeder::class);

        // Run the language settings seeder
        $this->call(LanguageSettingsSeeder::class);

        // Run the menu seeder
        $this->call(MenuSeeder::class);

        // Run the pages seeder
        $this->call(PagesTableSeeder::class);

        // Run the page sections seeder
        $this->call(PageSectionsSeeder::class);

        // Run the blog categories seeder
        $this->call(BlogCategoriesSeeder::class);

        // Run the blogs seeder
        $this->call(BlogsSeeder::class);

        // Run the services seeder
        $this->call(ServiceSeeder::class);

        // Run the product categories seeder
        $this->call(ProductCategorySeeder::class);

        // Run the products seeder
        $this->call(ProductSeeder::class);

        // Run the projects seeder
        $this->call(ProjectSeeder::class);

        // Run the page seeders
        $this->call(ContactPageSeeder::class);
        $this->call(AboutPageSeeder::class);
        $this->call(BlogPageSeeder::class);
    }
}
