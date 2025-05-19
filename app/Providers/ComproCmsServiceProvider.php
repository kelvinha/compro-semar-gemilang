<?php

namespace App\Providers;

use App\Helpers\MenuHelper;
use App\Helpers\SettingsHelper;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComproCmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share settings with landing views only
        View::composer(['landing.*', 'errors::*'], function ($view) {
            try {
                $view->with('settings', SettingsHelper::getPublic());
            } catch (\Exception $e) {
                // If there's an error, don't share settings
                $view->with('settings', collect([]));
            }
        });

        // Share menus with landing views only
        View::composer(['landing.*', 'errors::*'], function ($view) {
            try {
                $view->with('mainMenu', MenuHelper::getByLocation('header'));
                $view->with('footerMenu', MenuHelper::getByLocation('footer'));
            } catch (\Exception $e) {
                // If there's an error, don't share menus
                $view->with('mainMenu', collect([]));
                $view->with('footerMenu', collect([]));
            }
        });

        // Register custom Blade directives
        Blade::directive('setting', function ($key) {
            return "<?php echo \\App\\Helpers\\SettingsHelper::get($key); ?>";
        });

        Blade::directive('menu', function ($location) {
            return "<?php echo \\App\\Helpers\\MenuHelper::render($location); ?>";
        });
    }
}
