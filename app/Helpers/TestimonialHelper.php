<?php

namespace App\Helpers;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Cache;

class TestimonialHelper
{
    /**
     * Get all active testimonials
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        return Cache::remember('testimonials_all', 60 * 10, function () {
            return Testimonial::where('status', true)
                ->orderBy('order')
                ->get();
        });
    }
    
    /**
     * Get a specific number of testimonials
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getLimit($limit = 5)
    {
        return Cache::remember('testimonials_limit_' . $limit, 60 * 10, function () use ($limit) {
            return Testimonial::where('status', true)
                ->orderBy('order')
                ->take($limit)
                ->get();
        });
    }
    
    /**
     * Get random testimonials
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getRandom($limit = 5)
    {
        return Cache::remember('testimonials_random_' . $limit, 60 * 10, function () use ($limit) {
            return Testimonial::where('status', true)
                ->inRandomOrder()
                ->take($limit)
                ->get();
        });
    }
    
    /**
     * Clear testimonial cache
     *
     * @return void
     */
    public static function clearCache()
    {
        Cache::forget('testimonials_all');
        
        for ($i = 1; $i <= 10; $i++) {
            Cache::forget('testimonials_limit_' . $i);
            Cache::forget('testimonials_random_' . $i);
        }
    }
}
