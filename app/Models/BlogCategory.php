<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'active',
        'order',
        'parent_id',
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the parent category.
     */
    public function parent()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }

    /**
     * Get the child categories.
     */
    public function children()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id')
            ->orderBy('order');
    }

    /**
     * Get active child categories.
     */
    public function activeChildren()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id')
            ->where('active', true)
            ->orderBy('order');
    }

    /**
     * Get the blogs for the category.
     */
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }

    /**
     * Get published blogs for the category.
     */
    public function publishedBlogs()
    {
        return $this->hasMany(Blog::class, 'category_id')
            ->where('status', 'published')
            ->orderBy('published_at', 'desc');
    }

    /**
     * Get the SEO settings for the category.
     */
    public function seo()
    {
        return $this->morphOne(SeoSetting::class, 'seoable');
    }

    /**
     * Get a category by its slug.
     *
     * @param string $slug
     * @return self|null
     */
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }
}
