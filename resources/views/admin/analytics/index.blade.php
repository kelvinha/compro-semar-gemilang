@extends('admin.layout.master')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Analytics</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Analytics</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="header-title">
                        <h5>Page Visit Analytics</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.analytics.index') }}" method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="filter_type" class="form-label">Filter Type</label>
                                <select class="form-select" id="filter_type" name="filter_type"
                                    onchange="toggleFilterOptions()">
                                    <option value="daily" {{ $filterType == 'daily' ? 'selected' : '' }}>Daily
                                    </option>
                                    <option value="monthly" {{ $filterType == 'monthly' ? 'selected' : '' }}>Monthly
                                    </option>
                                    <option value="yearly" {{ $filterType == 'yearly' ? 'selected' : '' }}>Yearly
                                    </option>
                                    <option value="custom" {{ $filterType == 'custom' ? 'selected' : '' }}>Custom
                                        Range</option>
                                </select>
                            </div>

                            <div class="col-md-3 mb-3 filter-option" id="year-filter"
                                style="{{ in_array($filterType, ['monthly', 'yearly']) ? '' : 'display: none;' }}">
                                <label for="year" class="form-label">Year</label>
                                <select class="form-select" id="year" name="year">
                                    @foreach ($availableYears as $y)
                                        <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>
                                            {{ $y }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 mb-3 filter-option" id="month-filter"
                                style="{{ $filterType == 'monthly' ? '' : 'display: none;' }}">
                                <label for="month" class="form-label">Month</label>
                                <select class="form-select" id="month" name="month">
                                    @foreach (range(1, 12) as $m)
                                        <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 mb-3 filter-option" id="start-date-filter"
                                style="{{ in_array($filterType, ['daily', 'custom']) ? '' : 'display: none;' }}">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    value="{{ $startDate }}">
                            </div>

                            <div class="col-md-3 mb-3 filter-option" id="end-date-filter"
                                style="{{ in_array($filterType, ['daily', 'custom']) ? '' : 'display: none;' }}">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    value="{{ $endDate }}">
                            </div>

                            <div class="col-md-3 mb-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary btn-lg">Apply Filter</button>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Visits</h5>
                                    <h2 class="mt-3 mb-3">{{ number_format($totalVisits) }}</h2>
                                    <p class="card-text text-muted">Total page visits during the selected period</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Unique Visitors</h5>
                                    <h2 class="mt-3 mb-3">{{ number_format($uniqueVisitors) }}</h2>
                                    <p class="card-text text-muted">Unique visitors based on IP address</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Avg. Visits Per Day</h5>
                                    @php
                                        $days = 1;
                                        if ($filterType == 'daily' || $filterType == 'custom') {
                                            $days = max(
                                                1,
                                                Carbon\Carbon::parse($startDate)->diffInDays(
                                                    Carbon\Carbon::parse($endDate),
                                                ) + 1,
                                            );
                                        } elseif ($filterType == 'monthly') {
                                            $days = Carbon\Carbon::createFromDate($year, $month, 1)->daysInMonth;
                                        } elseif ($filterType == 'yearly') {
                                            $days = 365;
                                        }
                                        $avgVisits = $totalVisits / $days;
                                    @endphp
                                    <h2 class="mt-3 mb-3">{{ number_format($avgVisits, 1) }}</h2>
                                    <p class="card-text text-muted">Average visits per day</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Visits Over Time</h5>
                                    <div class="chart-container" style="position: relative; height:400px;">
                                        <canvas id="visitsChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div class="header-title">
                                        <h5>Top Countries</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if (count($topCountries) > 0)
                                        <div class="chart-container" style="position: relative; height:400px;">
                                            <canvas id="countriesChart"></canvas>
                                        </div>
                                    @else
                                        <div class="alert alert-info mt-3">
                                            No country data available for the selected period.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Most Visited Pages</h5>
                                    @if (count($mostVisitedPages) > 0)
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Page</th>
                                                        <th>URL</th>
                                                        <th>Visits</th>
                                                        <th>Percentage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($mostVisitedPages as $index => $page)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $page->page_name ?: 'Unknown' }}</td>
                                                            <td>
                                                                <a href="{{ $page->page_url }}" target="_blank"
                                                                    class="text-truncate d-inline-block"
                                                                    style="max-width: 300px;">
                                                                    {{ $page->page_url }}
                                                                </a>
                                                            </td>
                                                            <td>{{ number_format($page->count) }}</td>
                                                            <td>
                                                                @if ($totalVisits > 0)
                                                                    {{ number_format(($page->count / $totalVisits) * 100, 1) }}%
                                                                @else
                                                                    0%
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="alert alert-info mt-3">
                                            No page visit data available for the selected period.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Toggle filter options based on selected filter type
        function toggleFilterOptions() {
            const filterType = document.getElementById('filter_type').value;
            const yearFilter = document.getElementById('year-filter');
            const monthFilter = document.getElementById('month-filter');
            const startDateFilter = document.getElementById('start-date-filter');
            const endDateFilter = document.getElementById('end-date-filter');

            // Hide all filters first
            yearFilter.style.display = 'none';
            monthFilter.style.display = 'none';
            startDateFilter.style.display = 'none';
            endDateFilter.style.display = 'none';

            // Show relevant filters based on filter type
            if (filterType === 'monthly') {
                yearFilter.style.display = '';
                monthFilter.style.display = '';
            } else if (filterType === 'yearly') {
                yearFilter.style.display = '';
            } else if (filterType === 'daily' || filterType === 'custom') {
                startDateFilter.style.display = '';
                endDateFilter.style.display = '';
            }
        }

        // Initialize charts when the DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Visits chart
            const visitsCtx = document.getElementById('visitsChart').getContext('2d');
            const visitsChart = new Chart(visitsCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($visitsData['labels'] ?? []) !!},
                    datasets: [{
                        label: 'Visits',
                        data: {!! json_encode($visitsData['data'] ?? []) !!},
                        backgroundColor: 'rgba(67, 97, 238, 0.2)',
                        borderColor: 'rgba(67, 97, 238, 1)',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        }
                    }
                }
            });

            // Countries chart
            @if (count($topCountries) > 0)
                const countriesCtx = document.getElementById('countriesChart').getContext('2d');
                const countriesChart = new Chart(countriesCtx, {
                    type: 'doughnut',
                    data: {
                        labels: {!! json_encode($topCountries->pluck('country')->toArray()) !!},
                        datasets: [{
                            data: {!! json_encode($topCountries->pluck('count')->toArray()) !!},
                            backgroundColor: [
                                'rgba(67, 97, 238, 0.8)',
                                'rgba(114, 57, 234, 0.8)',
                                'rgba(32, 201, 151, 0.8)',
                                'rgba(255, 91, 92, 0.8)',
                                'rgba(255, 159, 67, 0.8)',
                                'rgba(45, 152, 218, 0.8)',
                                'rgba(156, 39, 176, 0.8)',
                                'rgba(0, 150, 136, 0.8)',
                                'rgba(233, 30, 99, 0.8)',
                                'rgba(121, 85, 72, 0.8)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'right'
                            }
                        }
                    }
                });
            @endif
        });
    </script>
@endsection
