<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_url',
        'page_name',
        'ip_address',
        'user_agent',
        'country',
        'city',
        'referrer',
        'visited_at',
        'user_id',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];

    /**
     * Get the user that visited the page.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include visits within a date range.
     */
    public function scopeDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('visited_at', [$startDate, $endDate]);
    }

    /**
     * Scope a query to only include visits for a specific day.
     */
    public function scopeDay($query, $date)
    {
        return $query->whereDate('visited_at', $date);
    }

    /**
     * Scope a query to only include visits for a specific month.
     */
    public function scopeMonth($query, $year, $month)
    {
        return $query->whereYear('visited_at', $year)
                     ->whereMonth('visited_at', $month);
    }

    /**
     * Scope a query to only include visits for a specific year.
     */
    public function scopeYear($query, $year)
    {
        return $query->whereYear('visited_at', $year);
    }

    /**
     * Get the total visits count.
     */
    public static function getTotalVisits()
    {
        return static::count();
    }

    /**
     * Get the total unique visitors count.
     */
    public static function getUniqueVisitors()
    {
        return static::distinct('ip_address')->count('ip_address');
    }

    /**
     * Get the most visited pages.
     */
    public static function getMostVisitedPages($limit = 10)
    {
        return static::select('page_url', 'page_name')
                     ->selectRaw('COUNT(*) as visit_count')
                     ->groupBy('page_url', 'page_name')
                     ->orderByDesc('visit_count')
                     ->limit($limit)
                     ->get();
    }

    /**
     * Get the daily visits for a date range.
     */
    public static function getDailyVisits($startDate, $endDate)
    {
        return static::selectRaw('DATE(visited_at) as date, COUNT(*) as visit_count')
                     ->whereBetween('visited_at', [$startDate, $endDate])
                     ->groupBy('date')
                     ->orderBy('date')
                     ->get();
    }

    /**
     * Get the monthly visits for a year.
     */
    public static function getMonthlyVisits($year)
    {
        return static::selectRaw('MONTH(visited_at) as month, COUNT(*) as visit_count')
                     ->whereYear('visited_at', $year)
                     ->groupBy('month')
                     ->orderBy('month')
                     ->get();
    }

    /**
     * Get the yearly visits.
     */
    public static function getYearlyVisits()
    {
        return static::selectRaw('YEAR(visited_at) as year, COUNT(*) as visit_count')
                     ->groupBy('year')
                     ->orderBy('year')
                     ->get();
    }

    /**
     * Get the top countries.
     */
    public static function getTopCountries($limit = 10)
    {
        return static::select('country')
                     ->selectRaw('COUNT(*) as visit_count')
                     ->whereNotNull('country')
                     ->groupBy('country')
                     ->orderByDesc('visit_count')
                     ->limit($limit)
                     ->get();
    }
}
