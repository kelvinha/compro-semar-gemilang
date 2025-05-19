<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'location',
        'active',
        'order',
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the submenus for the menu.
     */
    public function submenus()
    {
        return $this->hasMany(Submenu::class)
            ->whereNull('parent_id')
            ->orderBy('order');
    }

    /**
     * Get all submenus for the menu (including nested ones).
     */
    public function allSubmenus()
    {
        return $this->hasMany(Submenu::class)
            ->orderBy('order');
    }

    /**
     * Get active submenus for the menu.
     */
    public function activeSubmenus()
    {
        return $this->hasMany(Submenu::class)
            ->where('active', true)
            ->whereNull('parent_id')
            ->orderBy('order');
    }

    /**
     * Get a menu by its slug.
     *
     * @param string $slug
     * @return self|null
     */
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }

    /**
     * Get a menu by its location.
     *
     * @param string $location
     * @return self|null
     */
    public static function findByLocation($location)
    {
        return static::where('location', $location)
            ->where('active', true)
            ->first();
    }
}
