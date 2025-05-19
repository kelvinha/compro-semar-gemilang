<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\SeoSetting;
use App\Models\Media;

class ContactPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find or create the contact page
        $contactPage = Page::where('url', '/contact')->first();
        
        if (!$contactPage) {
            $contactPage = Page::create([
                'name' => 'Contact Us',
                'url' => '/contact',
                'active' => true,
                'order' => 4,
                'options' => json_encode([
                    'layout' => 'full_width',
                    'header_style' => 'default'
                ])
            ]);
        }
        
        // Clear existing sections if any
        PageSection::where('page_id', $contactPage->id)->delete();
        
        // Create a content section
        $contactPage->sections()->create([
            'name' => 'Main Content',
            'type' => 'text',
            'order' => 1,
            'active' => true,
            'content' => "<h2>Get in Touch with Us</h2>
            <p>We're here to help and answer any questions you might have. We look forward to hearing from you.</p>
            <p>Please fill out the form below to send us a message, and we'll get back to you as soon as possible.</p>"
        ]);
        
        // Create SEO settings for the contact page
        $this->createContactPageSEO($contactPage);
    }
    
    /**
     * Create SEO settings for the contact page
     *
     * @param \App\Models\Page $page
     * @return void
     */
    private function createContactPageSEO($page)
    {
        // Delete existing SEO settings if any
        SeoSetting::where('seoable_type', get_class($page))
            ->where('seoable_id', $page->id)
            ->delete();
            
        // Create new SEO settings
        $seoSettings = [
            'title' => 'Contact Us',
            'description' => 'Get in touch with our team. We\'re here to help and answer any questions you might have.',
            'keywords' => 'contact, get in touch, help, support, message, email, phone, address',
            'og_title' => 'Contact Us',
            'og_description' => 'Get in touch with our team. We\'re here to help and answer any questions you might have.',
            'og_image' => Media::inRandomOrder()->first() ? Media::inRandomOrder()->first()->path : null
        ];
        
        // Create SEO settings for the page
        $page->seo()->create($seoSettings);
    }
}
