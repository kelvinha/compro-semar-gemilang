<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_id',
        'subtitle',
        'subtitle_id',
        'description',
        'description_id',
        'image',
        'mobile_image',
        'button_text',
        'button_text_id',
        'button_url',
        'button_target',
        'active',
        'order',
        'type',
        'options',
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer',
        'options' => 'json',
    ];

    /**
     * Scope a query to only include active banners.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    /**
     * Scope a query to filter by type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Get the title based on the current locale.
     *
     * @return string
     */
    public function getLocalizedTitle()
    {
        try {
            $multilingual = \App\Models\WebsiteSetting::where('key', 'multilingual_enabled')->first();
            $isMultilingual = $multilingual && $multilingual->value == '1';

            if ($isMultilingual && app()->getLocale() == 'id' && !empty($this->title_id)) {
                return $this->title_id;
            }
        } catch (\Exception $e) {
            // If there's an error, just return the default title
        }

        return $this->title;
    }

    /**
     * Get the subtitle based on the current locale.
     *
     * @return string|null
     */
    public function getLocalizedSubtitle()
    {
        try {
            $multilingual = \App\Models\WebsiteSetting::where('key', 'multilingual_enabled')->first();
            $isMultilingual = $multilingual && $multilingual->value == '1';

            if ($isMultilingual && app()->getLocale() == 'id' && !empty($this->subtitle_id)) {
                return $this->subtitle_id;
            }
        } catch (\Exception $e) {
            // If there's an error, just return the default subtitle
        }

        return $this->subtitle;
    }

    /**
     * Get the description based on the current locale.
     *
     * @return string|null
     */
    public function getLocalizedDescription()
    {
        try {
            $multilingual = \App\Models\WebsiteSetting::where('key', 'multilingual_enabled')->first();
            $isMultilingual = $multilingual && $multilingual->value == '1';

            if ($isMultilingual && app()->getLocale() == 'id' && !empty($this->description_id)) {
                return $this->description_id;
            }
        } catch (\Exception $e) {
            // If there's an error, just return the default description
        }

        return $this->description;
    }

    /**
     * Get the button text based on the current locale.
     *
     * @return string|null
     */
    public function getLocalizedButtonText()
    {
        try {
            $multilingual = \App\Models\WebsiteSetting::where('key', 'multilingual_enabled')->first();
            $isMultilingual = $multilingual && $multilingual->value == '1';

            if ($isMultilingual && app()->getLocale() == 'id' && !empty($this->button_text_id)) {
                return $this->button_text_id;
            }
        } catch (\Exception $e) {
            // If there's an error, just return the default button text
        }

        return $this->button_text;
    }

    /**
     * Get the image URL.
     *
     * @return string|null
     */
    public function getImageUrl()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    /**
     * Get the mobile image URL.
     *
     * @return string|null
     */
    public function getMobileImageUrl()
    {
        return $this->mobile_image ? asset('storage/' . $this->mobile_image) : $this->getImageUrl();
    }
}
