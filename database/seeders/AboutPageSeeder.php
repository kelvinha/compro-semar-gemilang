<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\SeoSetting;
use App\Models\Media;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find or create the about page
        $aboutPage = Page::where('url', '/about')->first();
        
        if (!$aboutPage) {
            $aboutPage = Page::create([
                'name' => 'About Us',
                'url' => '/about',
                'active' => true,
                'order' => 2,
                'options' => json_encode([
                    'layout' => 'full_width',
                    'header_style' => 'default'
                ])
            ]);
        }
        
        // Clear existing sections if any
        PageSection::where('page_id', $aboutPage->id)->delete();
        
        // Create a content section
        $aboutPage->sections()->create([
            'name' => 'Main Content',
            'type' => 'text',
            'order' => 1,
            'active' => true,
            'content' => "<h2>About PT Industri Teknologi Torsi</h2>
            <p>PT Industri Teknologi Torsi is a specialized manufacturer of automation components and valves that provides high-quality products to meet the needs of industries, such as oil & gas, refinery, petrochemical, and power plant.</p>
            <p>With a focus on innovation and reliability, we are committed to providing efficient and safe solutions for our customers. Our team of experts has years of experience in the industry, allowing us to deliver products and services that meet the highest standards of quality and performance.</p>
            
            <div class='row'>
                <div class='col-lg-6 col-sm-6'>
                    <ul class='about-list'>
                        <li>
                            <i class='flaticon-checked'></i>
                            High-quality products
                        </li>
                        <li>
                            <i class='flaticon-checked'></i>
                            Innovative solutions
                        </li>
                        <li>
                            <i class='flaticon-checked'></i>
                            Reliable service
                        </li>
                    </ul>
                </div>

                <div class='col-lg-6 col-sm-6'>
                    <ul class='about-list about-list-2'>
                        <li>
                            <i class='flaticon-checked'></i>
                            Customer-focused
                        </li>
                        <li>
                            <i class='flaticon-checked'></i>
                            Industry expertise
                        </li>
                        <li>
                            <i class='flaticon-checked'></i>
                            Local content
                        </li>
                    </ul>
                </div>
            </div>"
        ]);
        
        // Create SEO settings for the about page
        $this->createAboutPageSEO($aboutPage);
    }
    
    /**
     * Create SEO settings for the about page
     *
     * @param \App\Models\Page $page
     * @return void
     */
    private function createAboutPageSEO($page)
    {
        // Delete existing SEO settings if any
        SeoSetting::where('seoable_type', get_class($page))
            ->where('seoable_id', $page->id)
            ->delete();
            
        // Create new SEO settings
        $seoSettings = [
            'title' => 'About Us - PT Industri Teknologi Torsi',
            'description' => 'Learn more about PT Industri Teknologi Torsi and our commitment to excellence in valve automation and control systems.',
            'keywords' => 'about us, company, history, mission, vision, values, team, valve automation, control systems',
            'og_title' => 'About PT Industri Teknologi Torsi',
            'og_description' => 'Learn more about PT Industri Teknologi Torsi and our commitment to excellence in valve automation and control systems.',
            'og_image' => Media::inRandomOrder()->first() ? Media::inRandomOrder()->first()->path : null
        ];
        
        // Create SEO settings for the page
        $page->seo()->create($seoSettings);
    }
}
