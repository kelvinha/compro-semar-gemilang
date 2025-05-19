<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'title',
        'company',
        'image',
        'quote',
        'status',
        'order'
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('placeholder.jpg');
    }

    // Use the default 'id' as the route key name
    // public function getRouteKeyName()
    // {
    //     return 'id';
    // }
}
