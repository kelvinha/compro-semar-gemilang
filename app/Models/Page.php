<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'menu_id',
        'active',
        'order',
        'options'
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer',
        'options' => 'json'
    ];

    public function sections()
    {
        return $this->hasMany(PageSection::class)->orderBy('order');
    }

    public function seo()
    {
        return $this->morphOne(SeoSetting::class, 'seoable');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
