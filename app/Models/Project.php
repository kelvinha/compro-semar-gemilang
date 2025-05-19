<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'slug',
        'client_name',
        'project_description',
        'project_main_image',
        'project_gallery_images',
        'completion_date',
        'location',
        'order',
        'status',
        'featured',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'project_gallery_images' => 'array',
        'completion_date' => 'date',
        'featured' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Set the project name and automatically generate the slug.
     *
     * @param string $value
     * @return void
     */
    public function setProjectNameAttribute($value)
    {
        $this->attributes['project_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the SEO settings for the project.
     */
    public function seo()
    {
        return $this->morphOne(SeoSetting::class, 'seoable');
    }
}
