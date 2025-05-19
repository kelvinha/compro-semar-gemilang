<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'name',
        'name_id',
        'slug',
        'url',
        'type',
        'active',
        'order',
        'parent_id',
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the menu that owns the submenu.
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    /**
     * Get the parent submenu.
     */
    public function parent()
    {
        return $this->belongsTo(Submenu::class, 'parent_id');
    }

    /**
     * Get the child submenus.
     */
    public function children()
    {
        return $this->hasMany(Submenu::class, 'parent_id')
            ->orderBy('order');
    }

    /**
     * Get active child submenus.
     */
    public function activeChildren()
    {
        return $this->hasMany(Submenu::class, 'parent_id')
            ->where('active', true)
            ->orderBy('order');
    }

    /**
     * Get the sections for the submenu.
     */
    public function sections()
    {
        return $this->hasMany(PageSection::class)
            ->orderBy('order');
    }

    /**
     * Get active sections for the submenu.
     */
    public function activeSections()
    {
        return $this->hasMany(PageSection::class)
            ->where('active', true)
            ->orderBy('order');
    }

    /**
     * Get the SEO settings for the submenu.
     */
    public function seo()
    {
        return $this->morphOne(SeoSetting::class, 'seoable');
    }

    /**
     * Get a submenu by its slug.
     *
     * @param string $slug
     * @return self|null
     */
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }

    /**
     * Get the name based on the current locale.
     *
     * @return string
     */
    public function getLocalizedName()
    {
        $multilingual = \App\Helpers\SettingsHelper::get('multilingual_enabled');
        $isMultilingual = $multilingual == '1';

        if ($isMultilingual && app()->getLocale() == 'id' && !empty($this->name_id)) {
            return $this->name_id;
        }

        return $this->name;
    }
}
