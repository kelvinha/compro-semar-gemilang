<?php

namespace App\Http\Middleware;

use App\Helpers\SettingsHelper;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Skip admin routes
        if ($request->is('admin') || $request->is('admin/*')) {
            return $next($request);
        }

        try {
            // Check if multilingual is enabled
            $multilingual = SettingsHelper::get('multilingual_enabled');
            $isMultilingual = $multilingual == '1';

            if ($isMultilingual) {
                // Get the locale from the session or use the default
                $locale = Session::get('locale', SettingsHelper::get('default_language', 'en'));

                // Check if the locale is valid
                $availableLanguages = json_decode(SettingsHelper::get('available_languages', '{"en":"English","id":"Indonesian"}'), true);
                if (!array_key_exists($locale, $availableLanguages)) {
                    $locale = 'en';
                }

                // Set the locale
                App::setLocale($locale);
            } else {
                // Use the default language
                $defaultLanguage = SettingsHelper::get('default_language', 'en');
                App::setLocale($defaultLanguage);
            }
        } catch (\Exception $e) {
            // If there's an error, use English as the default language
            App::setLocale('en');
        }

        return $next($request);
    }
}
