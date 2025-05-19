<?php

namespace App\Helpers;

use App\Models\Page;
use App\Models\Submenu;
use Illuminate\Support\Facades\Cache;

class PageHelper
{
    /**
     * Get a page by its URL
     *
     * @param string $url
     * @return \App\Models\Page|null
     */
    public static function getByUrl($url)
    {
        return Cache::remember('page_url_' . md5($url), 60 * 10, function () use ($url) {
            $page = Page::where('url', $url)->where('active', true)->first();

            if ($page) {
                $page->load(['seo', 'sections' => function($query) {
                    $query->where('active', true)->orderBy('order');
                }]);
            }

            return $page;
        });
    }

    /**
     * Get a page by submenu slug
     *
     * @param string $slug
     * @return \App\Models\Submenu|null
     */
    public static function getBySubmenuSlug($slug)
    {
        return Cache::remember('page_submenu_' . $slug, 60 * 10, function () use ($slug) {
            $page = Submenu::where('slug', $slug)
                ->where('type', 'page')
                ->where('active', true)
                ->first();

            if ($page) {
                $page->load(['seo', 'sections' => function($query) {
                    $query->where('active', true)->orderBy('order');
                }]);
            }

            return $page;
        });
    }

    /**
     * Get the home page
     *
     * @return \App\Models\Page|null
     */
    public static function getHomePage()
    {
        return self::getByUrl('/');
    }

    /**
     * Get the about page
     *
     * @return \App\Models\Page|null
     */
    public static function getAboutPage()
    {
        return self::getByUrl('/about');
    }

    /**
     * Get the projects page
     *
     * @return \App\Models\Page|null
     */
    public static function getProjectsPage()
    {
        return self::getByUrl('/projects');
    }

    public static function getBlogPage()
    {
        return self::getByUrl('/blog');
    }

    /**
     * Get the products page
     *
     * @return \App\Models\Page|null
     */
    public static function getProductsPage()
    {
        return self::getByUrl('/products');
    }

    /**
     * Get the contact page
     *
     * @return \App\Models\Page|null
     */
    public static function getContactPage()
    {
        return self::getByUrl('/contact');
    }


    /**
     * Create a fallback page object when the page doesn't exist in the database
     *
     * @param string $name
     * @param string $description
     * @param string $keywords
     * @return \stdClass
     */
    public static function createFallbackPage($name, $description = '', $keywords = '')
    {
        $page = new \stdClass();
        $page->name = $name;
        $page->sections = collect();

        // Create a fallback SEO object
        $page->seo = new \stdClass();
        $page->seo->title = $name;
        $page->seo->description = $description ?: "Learn more about {$name}.";
        $page->seo->keywords = $keywords ?: strtolower(str_replace(' ', ', ', $name));
        $page->seo->og_title = $name;
        $page->seo->og_description = $description ?: "Learn more about {$name}.";

        return $page;
    }

    /**
     * Clear page cache
     *
     * @param \App\Models\Page|null $page
     * @return void
     */
    public static function clearCache($page = null)
    {
        if ($page) {
            Cache::forget('page_url_' . md5($page->url));
        } else {
            $pages = Page::all();

            foreach ($pages as $p) {
                Cache::forget('page_url_' . md5($p->url));
            }

            $submenus = Submenu::where('type', 'page')->get();

            foreach ($submenus as $submenu) {
                Cache::forget('page_submenu_' . $submenu->slug);
            }
        }
    }
}
