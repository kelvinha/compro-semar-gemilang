<?php

namespace App\Helpers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingHelper
{
    /**
     * Get setting value by key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        // Try to get from cache first
        $cacheKey = "setting_{$key}";
        
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }
        
        // If not in cache, get from database
        $setting = Setting::where('key', $key)->first();
        
        if ($setting) {
            // Store in cache for future use
            Cache::put($cacheKey, $setting->value, now()->addHours(24));
            return $setting->value;
        }
        
        return $default;
    }
}
