<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'title_id',
        'slug',
        'excerpt',
        'excerpt_id',
        'content',
        'content_id',
        'featured_image',
        'status',
        'published_at',
        'featured',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'featured' => 'boolean',
    ];

    /**
     * Get the user that owns the blog.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the blog.
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    /**
     * Get the SEO settings for the blog.
     */
    public function seo()
    {
        return $this->morphOne(SeoSetting::class, 'seoable');
    }

    /**
     * Scope a query to only include published blogs.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now());
    }

    /**
     * Scope a query to only include featured blogs.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Get a blog by its slug.
     *
     * @param string $slug
     * @return self|null
     */
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }

    /**
     * Get the title based on the current locale.
     *
     * @return string
     */
    public function getLocalizedTitle()
    {
        $multilingual = \App\Helpers\SettingsHelper::get('multilingual_enabled');
        $isMultilingual = $multilingual == '1';

        if ($isMultilingual && app()->getLocale() == 'id' && !empty($this->title_id)) {
            return $this->title_id;
        }

        return $this->title;
    }

    /**
     * Get the excerpt based on the current locale.
     *
     * @return string|null
     */
    public function getLocalizedExcerpt()
    {
        $multilingual = \App\Helpers\SettingsHelper::get('multilingual_enabled');
        $isMultilingual = $multilingual == '1';

        if ($isMultilingual && app()->getLocale() == 'id' && !empty($this->excerpt_id)) {
            return $this->excerpt_id;
        }

        return $this->excerpt;
    }

    /**
     * Get the content based on the current locale.
     *
     * @return string
     */
    public function getLocalizedContent()
    {
        $multilingual = \App\Helpers\SettingsHelper::get('multilingual_enabled');
        $isMultilingual = $multilingual == '1';

        if ($isMultilingual && app()->getLocale() == 'id' && !empty($this->content_id)) {
            return $this->content_id;
        }

        return $this->content;
    }

}
