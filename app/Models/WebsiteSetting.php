<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'group',
        'key',
        'value',
        'value_id', // Indonesian value
        'type',
        'options',
        'display_name',
        'description',
        'is_public',
        'order',
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'order' => 'integer',
        'options' => 'json',
    ];

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
        $setting = static::where('key', $key)->first();

        if (!$setting) {
            return $default;
        }

        // Check if multilingual is enabled
        try {
            $multilingual = static::where('key', 'multilingual_enabled')->first();
            $isMultilingual = $multilingual && isset($multilingual->value) && $multilingual->value == '1';
        } catch (\Exception $e) {
            // If there's an error, assume multilingual is not enabled
            $isMultilingual = false;
        }

        // If multilingual is enabled and language is specified
        if ($isMultilingual && $language) {
            if ($language == 'id' && !empty($setting->value_id)) {
                return $setting->value_id;
            }
        }

        // If multilingual is enabled but no language specified, use current locale
        if ($isMultilingual && !$language) {
            $currentLocale = app()->getLocale();
            if ($currentLocale == 'id' && !empty($setting->value_id)) {
                return $setting->value_id;
            }
        }

        return $setting->value;
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
        $setting = static::where('key', $key)->first();

        if (!$setting) {
            return false;
        }

        // Check if multilingual is enabled
        try {
            $multilingual = static::where('key', 'multilingual_enabled')->first();
            $isMultilingual = $multilingual && isset($multilingual->value) && $multilingual->value == '1';
        } catch (\Exception $e) {
            // If there's an error, assume multilingual is not enabled
            $isMultilingual = false;
        }

        // If multilingual is enabled and language is specified
        if ($isMultilingual && $language) {
            if ($language == 'id') {
                $setting->value_id = $value;
            } else {
                $setting->value = $value;
            }
        } else {
            $setting->value = $value;
        }

        return $setting->save();
    }

    /**
     * Get all settings by group.
     *
     * @param string $group
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getByGroup($group)
    {
        return static::where('group', $group)
            ->orderBy('order')
            ->get();
    }

    /**
     * Get all public settings.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getPublic()
    {
        return static::where('is_public', true)
            ->orderBy('group')
            ->orderBy('order')
            ->get();
    }
}
