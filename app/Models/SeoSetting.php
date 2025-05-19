<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'seoable_type',
        'seoable_id',
        'title',
        'description',
        'keywords',
        'og_title',
        'og_description',
        'og_image'
    ];

    protected $casts = [];

    /**
     * Get the parent seoable model.
     */
    public function seoable()
    {
        return $this->morphTo();
    }

    /**
     * Get the meta tags for the SEO settings.
     *
     * @return array
     */
    public function getMetaTags()
    {
        $tags = [];

        if ($this->title) {
            $tags[] = ['name' => 'title', 'content' => $this->title];
        }

        if ($this->description) {
            $tags[] = ['name' => 'description', 'content' => $this->description];
        }

        if ($this->keywords) {
            $tags[] = ['name' => 'keywords', 'content' => $this->keywords];
        }

        if ($this->og_title) {
            $tags[] = ['property' => 'og:title', 'content' => $this->og_title];
        }

        if ($this->og_description) {
            $tags[] = ['property' => 'og:description', 'content' => $this->og_description];
        }

        if ($this->og_image) {
            $tags[] = ['property' => 'og:image', 'content' => $this->og_image];
        }

        return $tags;
    }
}
