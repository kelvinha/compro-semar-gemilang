<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\SeoSetting;
use App\Models\Media;

class BlogPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find or create the blog page
        $blogPage = Page::where('url', '/blog')->first();
        
        if (!$blogPage) {
            $blogPage = Page::create([
                'name' => 'Our Blog',
                'url' => '/blog',
                'active' => true,
                'order' => 3,
                'options' => json_encode([
                    'layout' => 'full_width',
                    'header_style' => 'default'
                ])
            ]);
        }
        
        // Clear existing sections if any
        PageSection::where('page_id', $blogPage->id)->delete();
        
        // Create a content section
        $blogPage->sections()->create([
            'name' => 'Main Content',
            'type' => 'text',
            'order' => 1,
            'active' => true,
            'content' => "<h2>Our Latest News and Insights</h2>
            <p>Stay updated with the latest news, insights, and articles from our team. We regularly share industry updates, technical information, and company news to keep you informed about the latest developments in valve automation and control systems.</p>"
        ]);
        
        // Create SEO settings for the blog page
        $this->createBlogPageSEO($blogPage);
    }
    
    /**
     * Create SEO settings for the blog page
     *
     * @param \App\Models\Page $page
     * @return void
     */
    private function createBlogPageSEO($page)
    {
        // Delete existing SEO settings if any
        SeoSetting::where('seoable_type', get_class($page))
            ->where('seoable_id', $page->id)
            ->delete();
            
        // Create new SEO settings
        $seoSettings = [
            'title' => 'Our Blog - PT Industri Teknologi Torsi',
            'description' => 'Stay updated with the latest news, insights, and articles from PT Industri Teknologi Torsi.',
            'keywords' => 'blog, news, articles, insights, updates, valve automation, control systems',
            'og_title' => 'Blog - PT Industri Teknologi Torsi',
            'og_description' => 'Stay updated with the latest news, insights, and articles from PT Industri Teknologi Torsi.',
            'og_image' => Media::inRandomOrder()->first() ? Media::inRandomOrder()->first()->path : null
        ];
        
        // Create SEO settings for the page
        $page->seo()->create($seoSettings);
    }
}
