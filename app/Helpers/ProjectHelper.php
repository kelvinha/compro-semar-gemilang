<?php

namespace App\Helpers;

use App\Models\Project;
use Illuminate\Support\Facades\Cache;

class ProjectHelper
{
    /**
     * Get all active projects
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        return Cache::remember('projects_all', 60 * 10, function () {
            return Project::where('status', 'active')
                ->orderBy('order')
                ->orderBy('created_at', 'desc')
                ->get();
        });
    }
    
    /**
     * Get featured projects
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getFeatured($limit = 6)
    {
        return Cache::remember('projects_featured_' . $limit, 60 * 10, function () use ($limit) {
            return Project::where('status', 'active')
                ->where('featured', true)
                ->orderBy('order')
                ->orderBy('created_at', 'desc')
                ->take($limit)
                ->get();
        });
    }
    
    /**
     * Get a specific number of projects
     *
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getLimit($limit = 6)
    {
        return Cache::remember('projects_limit_' . $limit, 60 * 10, function () use ($limit) {
            return Project::where('status', 'active')
                ->orderBy('order')
                ->orderBy('created_at', 'desc')
                ->take($limit)
                ->get();
        });
    }
    
    /**
     * Get related projects
     *
     * @param Project $project
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getRelated(Project $project, $limit = 4)
    {
        return Project::where('status', 'active')
            ->where('id', '!=', $project->id)
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->take($limit)
            ->get();
    }
    
    /**
     * Clear project cache
     *
     * @return void
     */
    public static function clearCache()
    {
        Cache::forget('projects_all');
        Cache::forget('projects_featured');
        
        for ($i = 1; $i <= 12; $i++) {
            Cache::forget('projects_limit_' . $i);
            Cache::forget('projects_featured_' . $i);
        }
    }
}
