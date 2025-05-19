<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageVisit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends BaseController
{
    /**
     * Display the analytics dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Get filter parameters
        $filterType = $request->input('filter_type', 'daily');
        $startDate = $request->input('start_date', Carbon::now()->subDays(30)->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d'));
        $year = $request->input('year', Carbon::now()->year);
        $month = $request->input('month', Carbon::now()->month);

        // Convert to Carbon instances
        $startDateCarbon = Carbon::parse($startDate);
        $endDateCarbon = Carbon::parse($endDate);

        // Initialize data
        $visitsData = [];
        $totalVisits = 0;
        $uniqueVisitors = 0;
        $mostVisitedPages = [];
        $topCountries = [];

        // Get data based on filter type
        switch ($filterType) {
            case 'daily':
                $visitsData = $this->getDailyVisits($startDateCarbon, $endDateCarbon);
                $totalVisits = PageVisit::dateRange($startDateCarbon, $endDateCarbon)->count();
                $uniqueVisitors = PageVisit::dateRange($startDateCarbon, $endDateCarbon)
                    ->distinct('ip_address')
                    ->count('ip_address');
                $mostVisitedPages = $this->getMostVisitedPages($startDateCarbon, $endDateCarbon);
                $topCountries = $this->getTopCountries($startDateCarbon, $endDateCarbon);
                break;

            case 'monthly':
                $visitsData = $this->getMonthlyVisits($year);
                $totalVisits = PageVisit::year($year)->count();
                $uniqueVisitors = PageVisit::year($year)
                    ->distinct('ip_address')
                    ->count('ip_address');
                $mostVisitedPages = $this->getMostVisitedPages(
                    Carbon::createFromDate($year, 1, 1),
                    Carbon::createFromDate($year, 12, 31)
                );
                $topCountries = $this->getTopCountries(
                    Carbon::createFromDate($year, 1, 1),
                    Carbon::createFromDate($year, 12, 31)
                );
                break;

            case 'yearly':
                $visitsData = $this->getYearlyVisits();
                $totalVisits = PageVisit::count();
                $uniqueVisitors = PageVisit::distinct('ip_address')->count('ip_address');
                $mostVisitedPages = $this->getMostVisitedPages(
                    Carbon::createFromDate(2000, 1, 1),
                    Carbon::now()
                );
                $topCountries = $this->getTopCountries(
                    Carbon::createFromDate(2000, 1, 1),
                    Carbon::now()
                );
                break;

            case 'custom':
                $visitsData = $this->getDailyVisits($startDateCarbon, $endDateCarbon);
                $totalVisits = PageVisit::dateRange($startDateCarbon, $endDateCarbon)->count();
                $uniqueVisitors = PageVisit::dateRange($startDateCarbon, $endDateCarbon)
                    ->distinct('ip_address')
                    ->count('ip_address');
                $mostVisitedPages = $this->getMostVisitedPages($startDateCarbon, $endDateCarbon);
                $topCountries = $this->getTopCountries($startDateCarbon, $endDateCarbon);
                break;
        }

        // Get available years for the filter
        $availableYears = PageVisit::selectRaw('YEAR(visited_at) as year')
            ->distinct()
            ->orderBy('year')
            ->pluck('year')
            ->toArray();

        if (empty($availableYears)) {
            $availableYears = [Carbon::now()->year];
        }

        return view('admin.analytics.index', compact(
            'filterType',
            'startDate',
            'endDate',
            'year',
            'month',
            'visitsData',
            'totalVisits',
            'uniqueVisitors',
            'mostVisitedPages',
            'topCountries',
            'availableYears'
        ));
    }

    /**
     * Get daily visits for a date range.
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @return array
     */
    private function getDailyVisits(Carbon $startDate, Carbon $endDate)
    {
        $visits = PageVisit::selectRaw('DATE(visited_at) as date, COUNT(*) as count')
            ->whereBetween('visited_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Create a complete date range with zeros for missing dates
        $dateRange = [];
        $currentDate = $startDate->copy();

        while ($currentDate->lte($endDate)) {
            $dateStr = $currentDate->format('Y-m-d');
            $dateRange[$dateStr] = 0;
            $currentDate->addDay();
        }

        // Fill in the actual counts
        foreach ($visits as $visit) {
            $dateRange[$visit->date] = $visit->count;
        }

        // Format for chart.js
        $labels = array_keys($dateRange);
        $data = array_values($dateRange);

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }

    /**
     * Get monthly visits for a year.
     *
     * @param  int  $year
     * @return array
     */
    private function getMonthlyVisits($year)
    {
        $visits = PageVisit::selectRaw('MONTH(visited_at) as month, COUNT(*) as count')
            ->whereYear('visited_at', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Create all months with zeros for missing months
        $monthRange = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthRange[$i] = 0;
        }

        // Fill in the actual counts
        foreach ($visits as $visit) {
            $monthRange[$visit->month] = $visit->count;
        }

        // Get month names
        $monthNames = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthNames[] = Carbon::createFromDate(null, $i, 1)->format('F');
        }

        return [
            'labels' => $monthNames,
            'data' => array_values($monthRange),
        ];
    }

    /**
     * Get yearly visits.
     *
     * @return array
     */
    private function getYearlyVisits()
    {
        $visits = PageVisit::selectRaw('YEAR(visited_at) as year, COUNT(*) as count')
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        // Format for chart.js
        $years = $visits->pluck('year')->toArray();
        $counts = $visits->pluck('count')->toArray();

        return [
            'labels' => $years,
            'data' => $counts,
        ];
    }

    /**
     * Get most visited pages for a date range.
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  int  $limit
     * @return \Illuminate\Support\Collection
     */
    private function getMostVisitedPages(Carbon $startDate, Carbon $endDate, $limit = 10)
    {
        return PageVisit::selectRaw('page_url, page_name, COUNT(*) as count')
            ->whereBetween('visited_at', [$startDate, $endDate])
            ->groupBy('page_url', 'page_name')
            ->orderByDesc('count')
            ->limit($limit)
            ->get();
    }

    /**
     * Get top countries for a date range.
     *
     * @param  \Carbon\Carbon  $startDate
     * @param  \Carbon\Carbon  $endDate
     * @param  int  $limit
     * @return \Illuminate\Support\Collection
     */
    private function getTopCountries(Carbon $startDate, Carbon $endDate, $limit = 10)
    {
        return PageVisit::selectRaw('country, COUNT(*) as count')
            ->whereBetween('visited_at', [$startDate, $endDate])
            ->whereNotNull('country')
            ->groupBy('country')
            ->orderByDesc('count')
            ->limit($limit)
            ->get();
    }
}
