<?php

namespace Database\Seeders;

use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class LanguageSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Multilingual enabled setting
        WebsiteSetting::updateOrCreate(
            ['key' => 'multilingual_enabled'],
            [
                'display_name' => 'Enable Multilingual Support',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'language',
                'is_public' => false,
                'options' => null,
                'description' => 'Enable support for multiple languages on the website.',
            ]
        );

        // Default language setting
        WebsiteSetting::updateOrCreate(
            ['key' => 'default_language'],
            [
                'display_name' => 'Default Language',
                'value' => 'en',
                'type' => 'select',
                'group' => 'language',
                'is_public' => false,
                'options' => json_encode([
                    'en' => 'English',
                    'id' => 'Indonesian',
                ]),
                'description' => 'The default language for the website.',
            ]
        );

        // Available languages setting
        WebsiteSetting::updateOrCreate(
            ['key' => 'available_languages'],
            [
                'display_name' => 'Available Languages',
                'value' => json_encode([
                    'en' => 'English',
                    'id' => 'Indonesian',
                ]),
                'type' => 'json',
                'group' => 'language',
                'is_public' => false,
                'options' => null,
                'description' => 'The languages available for the website.',
            ]
        );
    }
}
