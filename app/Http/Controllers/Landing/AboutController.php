<?php

namespace App\Http\Controllers\Landing;

use App\Helpers\PageHelper;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get about page from CMS
        $aboutPage = PageHelper::getAboutPage();

        // If about page doesn't exist, create a fallback
        if (!$aboutPage) {
            $aboutPage = PageHelper::createFallbackPage(
                'About Us',
                'Learn more about PT Industri Teknologi Torsi and our commitment to excellence.',
                'about us, company, history, mission, vision, values, team'
            );
        }

        // Load SEO settings for the about page
        if ($aboutPage->seo) {
            $aboutPage->load('seo');
        }

        // Get testimonials
        $testimonials = Testimonial::where('status', 'active')
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('landing.about', compact('aboutPage', 'testimonials'));
    }
}
