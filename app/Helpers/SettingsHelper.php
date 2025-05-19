<?php

namespace App\Helpers;

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Cache;

class SettingsHelper
{
    /**
     * Get a setting value by key.
     *
     * @param string $key
     * @param mixed $default
     * @param string|null $language
     * @return mixed
     */
    public static function get($key, $default = null, $language = null)
    {
        if ($language === null) {
            $language = app()->getLocale();
        }
        
        $cacheKey = 'setting_' . $key . '_' . $language;

        try {
            return Cache::remember($cacheKey, 60 * 60, function () use ($key, $default, $language) {
                return WebsiteSetting::get($key, $default, $language);
            });
        } catch (\Exception $e) {
            // If there's an error, return the default value
            return $default;
        }
    }

    /**
     * Set a setting value by key.
     *
     * @param string $key
     * @param mixed $value
     * @param string|null $language
     * @return bool
     */
    public static function set($key, $value, $language = null)
    {
        $result = WebsiteSetting::set($key, $value, $language);

        if ($result) {
            // Clear cache for all languages
            Cache::forget('setting_' . $key);
            Cache::forget('setting_' . $key . '_en');
            Cache::forget('setting_' . $key . '_id');

            // Clear group caches
            $setting = WebsiteSetting::where('key', $key)->first();
            if ($setting) {
                Cache::forget('settings_group_' . $setting->group);
                Cache::forget('settings_group_' . $setting->group . '_en');
                Cache::forget('settings_group_' . $setting->group . '_id');
            }
        }

        return $result;
    }

    /**
     * Get all settings by group.
     *
     * @param string $group
     * @param string|null $language
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getByGroup($group, $language = null)
    {
        $cacheKey = 'settings_group_' . $group;
        if ($language) {
            $cacheKey .= '_' . $language;
        }

        return Cache::remember($cacheKey, 60 * 60, function () use ($group, $language) {
            $settings = WebsiteSetting::getByGroup($group);

            // If multilingual is enabled and language is specified
            $multilingual = self::get('multilingual_enabled');
            $isMultilingual = $multilingual && $multilingual == '1';

            if ($isMultilingual && $language == 'id') {
                foreach ($settings as $setting) {
                    if (!empty($setting->value_id)) {
                        $setting->original_value = $setting->value;
                        $setting->value = $setting->value_id;
                    }
                }
            }

            return $settings;
        });
    }

    /**
     * Get all public settings.
     *
     * @param string|null $language
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getPublic($language = null)
    {
        $cacheKey = 'settings_public';
        if ($language) {
            $cacheKey .= '_' . $language;
        }

        return Cache::remember($cacheKey, 60 * 60, function () use ($language) {
            $settings = WebsiteSetting::getPublic();

            // If multilingual is enabled and language is specified
            $multilingual = self::get('multilingual_enabled');
            $isMultilingual = $multilingual && $multilingual == '1';

            if ($isMultilingual && $language == 'id') {
                foreach ($settings as $setting) {
                    if (!empty($setting->value_id)) {
                        $setting->original_value = $setting->value;
                        $setting->value = $setting->value_id;
                    }
                }
            }

            return $settings;
        });
    }

    /**
     * Clear settings cache.
     *
     * @param string|null $key
     * @return void
     */
    public static function clearCache($key = null)
    {
        if ($key) {
            // Clear cache for all languages
            Cache::forget('setting_' . $key);
            Cache::forget('setting_' . $key . '_en');
            Cache::forget('setting_' . $key . '_id');
        } else {
            $keys = WebsiteSetting::pluck('key')->toArray();
            foreach ($keys as $k) {
                // Clear cache for all languages
                Cache::forget('setting_' . $k);
                Cache::forget('setting_' . $k . '_en');
                Cache::forget('setting_' . $k . '_id');
            }

            $groups = WebsiteSetting::distinct('group')->pluck('group')->toArray();
            foreach ($groups as $group) {
                // Clear cache for all languages
                Cache::forget('settings_group_' . $group);
                Cache::forget('settings_group_' . $group . '_en');
                Cache::forget('settings_group_' . $group . '_id');
            }

            // Clear public settings cache for all languages
            Cache::forget('settings_public');
            Cache::forget('settings_public_en');
            Cache::forget('settings_public_id');
        }
    }

    /**
     * Get the website name.
     *
     * @return string
     */
    public static function getWebsiteName()
    {
        return self::get('website_name', config('app.name'));
    }

    /**
     * Get the website logo.
     *
     * @return string|null
     */
    public static function getLogo()
    {
        $logo = self::get('website_logo');

        if ($logo) {
            return asset('storage/' . $logo);
        }

        return null;
    }

    /**
     * Get the website favicon.
     *
     * @return string|null
     */
    public static function getFavicon()
    {
        $favicon = self::get('website_favicon');

        if ($favicon) {
            return asset('storage/' . $favicon);
        }

        return null;
    }

    /**
     * Get the website meta description.
     *
     * @return string|null
     */
    public static function getMetaDescription()
    {
        return self::get('meta_description');
    }

    /**
     * Get the website meta keywords.
     *
     * @return string|null
     */
    public static function getMetaKeywords()
    {
        return self::get('meta_keywords');
    }

    /**
     * Get the website OG image.
     *
     * @return string|null
     */
    public static function getOgImage()
    {
        $ogImage = self::get('og_image');

        if ($ogImage) {
            return asset('storage/' . $ogImage);
        }

        return null;
    }

    /**
     * Check if a field should use CKEditor.
     *
     * @param string $type The field type
     * @param string $key The field key
     * @return bool
     */
    public static function shouldUseCKEditor($type, $key)
    {
        // Always use CKEditor for these types
        if (in_array($type, ['textarea', 'longtext'])) {
            // Exclude these keys
            $excludedKeys = [
                'meta_description',
                'meta_keywords',
                'footer_scripts',
                'custom_css',
                'custom_js',
                'schema_markup'
            ];

            if (!in_array($key, $excludedKeys)) {
                return true;
            }
        }

        return false;
    }
}
