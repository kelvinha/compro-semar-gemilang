<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WebsiteSetting;

class WebsiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // General Settings
        WebsiteSetting::create([
            'key' => 'website_name',
            'display_name' => 'Website Name',
            'value' => 'Your Website Name',
            'type' => 'text',
            'group' => 'general',
            'is_public' => true,
            'options' => null,
            'description' => 'The name of your website'
        ]);

        WebsiteSetting::create([
            'key' => 'website_tagline',
            'display_name' => 'Website Tagline',
            'value' => 'Your Website Tagline',
            'type' => 'text',
            'group' => 'general',
            'is_public' => true,
            'options' => null,
            'description' => 'A short description of your website'
        ]);

        WebsiteSetting::create([
            'key' => 'website_logo',
            'display_name' => 'Website Logo',
            'value' => null,
            'type' => 'image',
            'group' => 'general',
            'is_public' => true,
            'options' => null,
            'description' => 'Upload your website logo'
        ]);

        WebsiteSetting::create([
            'key' => 'website_favicon',
            'display_name' => 'Website Favicon',
            'value' => null,
            'type' => 'image',
            'group' => 'general',
            'is_public' => true,
            'options' => null,
            'description' => 'Upload your website favicon'
        ]);

        WebsiteSetting::create([
            'key' => 'primary_color',
            'display_name' => 'Primary Color',
            'value' => '#171A7C',
            'type' => 'color',
            'group' => 'general',
            'is_public' => true,
            'options' => null,
            'description' => 'The primary color of your website'
        ]);

        WebsiteSetting::create([
            'key' => 'secondary_color',
            'display_name' => 'Secondary Color',
            'value' => '#007bff',
            'type' => 'color',
            'group' => 'general',
            'is_public' => true,
            'options' => null,
            'description' => 'The secondary color of your website'
        ]);

        // Contact Settings
        WebsiteSetting::create([
            'key' => 'contact_email',
            'display_name' => 'Contact Email',
            'value' => 'contact@example.com',
            'type' => 'email',
            'group' => 'contact',
            'is_public' => true,
            'options' => null,
            'description' => 'The email address for contact inquiries'
        ]);

        WebsiteSetting::create([
            'key' => 'contact_phone',
            'display_name' => 'Contact Phone',
            'value' => '+1 (555) 123-4567',
            'type' => 'text',
            'group' => 'contact',
            'is_public' => true,
            'options' => null,
            'description' => 'The phone number for contact inquiries'
        ]);

        WebsiteSetting::create([
            'key' => 'contact_address',
            'display_name' => 'Contact Address',
            'value' => '123 Main Street, City, Country',
            'type' => 'text',
            'group' => 'contact',
            'is_public' => true,
            'options' => null,
            'description' => 'The physical address of your organization'
        ]);

        WebsiteSetting::create([
            'key' => 'contact_email_secondary',
            'display_name' => 'Secondary Contact Email',
            'value' => 'info@example.com',
            'type' => 'email',
            'group' => 'contact',
            'is_public' => true,
            'options' => null,
            'description' => 'The secondary email address for contact inquiries'
        ]);

        WebsiteSetting::create([
            'key' => 'contact_phone_secondary',
            'display_name' => 'Secondary Contact Phone',
            'value' => '+1 (555) 987-6543',
            'type' => 'text',
            'group' => 'contact',
            'is_public' => true,
            'options' => null,
            'description' => 'The secondary phone number for contact inquiries'
        ]);

        WebsiteSetting::create([
            'key' => 'contact_map_embed',
            'display_name' => 'Google Maps Embed Code',
            'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96573.31103674119!2d-73.91097366523668!3d40.85176866829554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c28b553a697cb1%3A0x556e43a78ff15c77!2sThe%20Bronx%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1600202608808!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'type' => 'textarea',
            'group' => 'contact',
            'is_public' => true,
            'options' => null,
            'description' => 'The Google Maps embed code for your location'
        ]);

        WebsiteSetting::create([
            'key' => 'admin_email',
            'display_name' => 'Admin Email',
            'value' => 'admin@example.com',
            'type' => 'email',
            'group' => 'contact',
            'is_public' => false,
            'options' => null,
            'description' => 'The email address to receive contact form submissions'
        ]);

        // Social Media Settings
        WebsiteSetting::create([
            'key' => 'social_facebook',
            'display_name' => 'Facebook URL',
            'value' => 'https://facebook.com/yourpage',
            'type' => 'url',
            'group' => 'social',
            'is_public' => true,
            'options' => null,
            'description' => 'Your Facebook page URL'
        ]);

        WebsiteSetting::create([
            'key' => 'social_twitter',
            'display_name' => 'Twitter URL',
            'value' => 'https://twitter.com/yourhandle',
            'type' => 'url',
            'group' => 'social',
            'is_public' => true,
            'options' => null,
            'description' => 'Your Twitter profile URL'
        ]);

        WebsiteSetting::create([
            'key' => 'social_instagram',
            'display_name' => 'Instagram URL',
            'value' => 'https://instagram.com/yourhandle',
            'type' => 'url',
            'group' => 'social',
            'is_public' => true,
            'options' => null,
            'description' => 'Your Instagram profile URL'
        ]);

        WebsiteSetting::create([
            'key' => 'social_linkedin',
            'display_name' => 'LinkedIn URL',
            'value' => 'https://linkedin.com/company/yourcompany',
            'type' => 'url',
            'group' => 'social',
            'is_public' => true,
            'options' => null,
            'description' => 'Your LinkedIn company page URL'
        ]);

        WebsiteSetting::create([
            'key' => 'social_youtube',
            'display_name' => 'YouTube URL',
            'value' => 'https://youtube.com/channel/yourchannel',
            'type' => 'url',
            'group' => 'social',
            'is_public' => true,
            'options' => null,
            'description' => 'Your YouTube channel URL'
        ]);

        // SEO Settings
        WebsiteSetting::create([
            'key' => 'meta_title',
            'display_name' => 'Meta Title',
            'value' => 'Your Website - Welcome',
            'type' => 'text',
            'group' => 'seo',
            'is_public' => true,
            'options' => null,
            'description' => 'The default meta title for your website'
        ]);

        WebsiteSetting::create([
            'key' => 'meta_description',
            'display_name' => 'Meta Description',
            'value' => 'Welcome to our website. This is a dynamically generated meta description.',
            'type' => 'text',
            'group' => 'seo',
            'is_public' => true,
            'options' => null,
            'description' => 'The default meta description for your website'
        ]);

        WebsiteSetting::create([
            'key' => 'meta_keywords',
            'display_name' => 'Meta Keywords',
            'value' => 'website, content, pages, blog',
            'type' => 'text',
            'group' => 'seo',
            'is_public' => true,
            'options' => null,
            'description' => 'Comma-separated list of keywords for SEO'
        ]);

        // Footer Settings
        WebsiteSetting::create([
            'key' => 'footer_copyright',
            'display_name' => 'Footer Copyright',
            'value' => '&copy; ' . date('Y') . ' Your Company. All rights reserved.',
            'type' => 'text',
            'group' => 'footer',
            'is_public' => true,
            'options' => null,
            'description' => 'The copyright text in the footer'
        ]);

        WebsiteSetting::create([
            'key' => 'footer_about',
            'display_name' => 'Footer About',
            'value' => 'Your company description goes here.',
            'type' => 'text',
            'group' => 'footer',
            'is_public' => true,
            'options' => null,
            'description' => 'The about text in the footer'
        ]);

        // Language Settings
        WebsiteSetting::create([
            'key' => 'multilingual_enabled',
            'display_name' => 'Multilingual Enabled',
            'value' => '1',
            'type' => 'boolean',
            'group' => 'language',
            'is_public' => false,
            'options' => null,
            'description' => 'Enable multilingual support'
        ]);

        WebsiteSetting::create([
            'key' => 'default_language',
            'display_name' => 'Default Language',
            'value' => 'en',
            'type' => 'select',
            'group' => 'language',
            'is_public' => false,
            'options' => json_encode([
                'en' => 'English',
                'id' => 'Indonesian'
            ]),
            'description' => 'The default language for the website'
        ]);

        WebsiteSetting::create([
            'key' => 'available_languages',
            'display_name' => 'Available Languages',
            'value' => json_encode([
                'en' => 'English',
                'id' => 'Indonesian'
            ]),
            'type' => 'json',
            'group' => 'language',
            'is_public' => false,
            'options' => null,
            'description' => 'List of available languages for the website'
        ]);
    }
}
