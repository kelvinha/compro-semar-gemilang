<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'description_id',
        'logo',
        'website_url',
        'industry',
        'location',
        'partnership_start',
        'featured',
        'active',
        'order',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'active' => 'boolean',
        'order' => 'integer',
        'partnership_start' => 'date',
    ];

    /**
     * Set the name and automatically generate the slug.
     *
     * @param string $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Scope a query to only include active clients.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Scope a query to only include featured clients.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Get the description based on the current locale.
     *
     * @return string|null
     */
    public function getLocalizedDescription()
    {
        $multilingual = \App\Helpers\SettingsHelper::get('multilingual_enabled');
        $isMultilingual = $multilingual == '1';

        if ($isMultilingual && app()->getLocale() == 'id' && !empty($this->description_id)) {
            return $this->description_id;
        }

        return $this->description;
    }

    /**
     * Get the logo URL.
     *
     * @return string|null
     */
    public function getLogoUrl()
    {
        return $this->logo ? asset('storage/' . $this->logo) : null;
    }

    /**
     * Get the partnership duration in years.
     *
     * @return int|null
     */
    public function getPartnershipDuration()
    {
        if (!$this->partnership_start) {
            return null;
        }

        return now()->diffInYears($this->partnership_start);
    }

    /**
     * Get a client by its slug.
     *
     * @param string $slug
     * @return self|null
     */
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }

    /**
     * Get the route key name for Laravel model binding.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
