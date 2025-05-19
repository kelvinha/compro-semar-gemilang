<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'name',
        'name_id',
        'type',
        'order',
        'active',
        'content',
        'content_id',
        'video_url',
        'options',
        'media_ids',
        'image_id'
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer',
        'options' => 'json',
        'media_ids' => 'json'
    ];

    /**
     * Get the page that owns the section.
     */
    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Get the media items for the section.
     */
    public function media(): BelongsToMany
    {
        return $this->belongsToMany(Media::class, 'section_media', 'section_id', 'media_id');
    }

    /**
     * Get the featured image for the section.
     */
    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    /**
     * Get the name based on the current locale.
     */
    public function getLocalizedName(): string
    {
        $multilingual = \App\Helpers\SettingsHelper::get('multilingual_enabled');
        $isMultilingual = $multilingual == '1';

        if ($isMultilingual && app()->getLocale() == 'id' && !empty($this->name_id)) {
            return $this->name_id;
        }

        return $this->name;
    }

    /**
     * Get the content based on the current locale.
     */
    public function getLocalizedContent(): ?string
    {
        $multilingual = \App\Helpers\SettingsHelper::get('multilingual_enabled');
        $isMultilingual = $multilingual == '1';

        if ($isMultilingual && app()->getLocale() == 'id' && !empty($this->content_id)) {
            return $this->content_id;
        }

        return $this->content;
    }
}
