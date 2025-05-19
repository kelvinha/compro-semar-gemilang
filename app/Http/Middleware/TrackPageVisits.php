<?php

namespace App\Http\Middleware;

use App\Models\PageVisit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Stevebauman\Location\Facades\Location;

class TrackPageVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only track specific landing page routes
        // This middleware should only be applied to routes that need tracking
        // We're now using a separate middleware group for this

        // Get the response
        $response = $next($request);

        // Only track successful page loads
        if ($response->getStatusCode() === 200) {
            // Get the IP address
            $ipAddress = $request->ip();

            // Get location data
            $locationData = Location::get($ipAddress);

            // Create a new page visit record
            PageVisit::create([
                'page_url' => $request->fullUrl(),
                'page_name' => $request->route() ? $request->route()->getName() : null,
                'ip_address' => $ipAddress,
                'user_agent' => $request->userAgent(),
                'country' => $locationData ? $locationData->countryName : null,
                'city' => $locationData ? $locationData->cityName : null,
                'referrer' => $request->header('referer'),
                'visited_at' => now(),
                'user_id' => Auth::id(),
            ]);
        }

        return $response;
    }
}
