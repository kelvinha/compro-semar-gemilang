<?php

namespace App\Helpers;

use App\Models\Menu;
use Illuminate\Support\Facades\Cache;

class MenuHelper
{
    /**
     * Get a menu by its location.
     *
     * @param string $location
     * @return \App\Models\Menu|null
     */
    public static function getByLocation($location)
    {
        return Cache::remember('menu_location_' . $location, 60 * 60, function () use ($location) {
            return Menu::findByLocation($location);
        });
    }

    /**
     * Get a menu by its slug.
     *
     * @param string $slug
     * @return \App\Models\Menu|null
     */
    public static function getBySlug($slug)
    {
        return Cache::remember('menu_slug_' . $slug, 60 * 60, function () use ($slug) {
            return Menu::findBySlug($slug);
        });
    }

    /**
     * Get active submenus for a menu.
     *
     * @param string $location
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    public static function getActiveSubmenus($location)
    {
        $menu = self::getByLocation($location);

        if (!$menu) {
            return null;
        }

        return Cache::remember('menu_active_submenus_' . $menu->id, 60 * 60, function () use ($menu) {
            return $menu->activeSubmenus()->with('activeChildren')->get();
        });
    }

    /**
     * Get main menu with submenus for the landing page
     *
     * @return \App\Models\Menu|null
     */
    public static function getMainMenu()
    {
        return Cache::remember('landing_main_menu', 60 * 10, function () {
            $mainMenu = Menu::where('location', 'header')->where('active', true)->first();
            if ($mainMenu) {
                $mainMenu->load(['submenus' => function($query) {
                    $query->where('active', true)->whereNull('parent_id')->orderBy('order');
                    $query->with(['children' => function($q) {
                        $q->where('active', true)->orderBy('order');
                        $q->with(['children' => function($c) {
                            $c->where('active', true)->orderBy('order');
                        }]);
                    }]);
                }]);
            }

            return $mainMenu;
        });
    }

    /**
     * Get footer menu with submenus for the landing page
     *
     * @return \App\Models\Menu|null
     */
    public static function getFooterMenu()
    {
        return Cache::remember('landing_footer_menu', 60 * 10, function () {
            $footerMenu = Menu::where('location', 'footer')->where('active', true)->first();
            if ($footerMenu) {
                $footerMenu->load(['submenus' => function($query) {
                    $query->where('active', true)->orderBy('order');
                }]);
            }

            return $footerMenu;
        });
    }

    /**
     * Get secondary footer menu with submenus for the landing page
     *
     * @return \App\Models\Menu|null
     */
    public static function getFooterMenuSecondary()
    {
        return Cache::remember('landing_footer_menu_secondary', 60 * 10, function () {
            $footerMenuSecondary = Menu::where('location', 'footer_secondary')->where('active', true)->first();
            if ($footerMenuSecondary) {
                $footerMenuSecondary->load(['submenus' => function($query) {
                    $query->where('active', true)->orderBy('order');
                }]);
            }

            return $footerMenuSecondary;
        });
    }

    /**
     * Get all menus for the landing page
     *
     * @return array
     */
    public static function getAllLandingMenus()
    {
        return [
            'mainMenu' => self::getMainMenu(),
            'footerMenu' => self::getFooterMenu(),
            'footerMenuSecondary' => self::getFooterMenuSecondary(),
        ];
    }

    /**
     * Clear menu cache.
     *
     * @param \App\Models\Menu|null $menu
     * @return void
     */
    public static function clearCache($menu = null)
    {
        if ($menu) {
            Cache::forget('menu_slug_' . $menu->slug);

            if ($menu->location) {
                Cache::forget('menu_location_' . $menu->location);
            }

            Cache::forget('menu_active_submenus_' . $menu->id);
        } else {
            $menus = Menu::all();

            foreach ($menus as $m) {
                Cache::forget('menu_slug_' . $m->slug);

                if ($m->location) {
                    Cache::forget('menu_location_' . $m->location);
                }

                Cache::forget('menu_active_submenus_' . $m->id);
            }

            $locations = Menu::whereNotNull('location')->distinct('location')->pluck('location')->toArray();

            foreach ($locations as $location) {
                Cache::forget('menu_location_' . $location);
            }
        }
    }

    /**
     * Render a menu as HTML.
     *
     * @param string $location
     * @param array $options
     * @return string
     */
    public static function render($location, $options = [])
    {
        $menu = self::getByLocation($location);

        if (!$menu) {
            return '';
        }

        $submenus = self::getActiveSubmenus($location);

        if (!$submenus || $submenus->isEmpty()) {
            return '';
        }

        $options = array_merge([
            'ul_class' => 'menu',
            'li_class' => 'menu-item',
            'a_class' => 'menu-link',
            'active_class' => 'active',
            'dropdown_class' => 'has-dropdown',
            'dropdown_toggle_class' => 'dropdown-toggle',
            'dropdown_menu_class' => 'dropdown-menu',
        ], $options);

        $currentUrl = url()->current();
        $html = '<ul class="' . $options['ul_class'] . '">';

        foreach ($submenus as $submenu) {
            $isActive = $currentUrl == url($submenu->url);
            $hasChildren = $submenu->activeChildren->isNotEmpty();

            $html .= '<li class="' . $options['li_class'] . ($isActive ? ' ' . $options['active_class'] : '') . ($hasChildren ? ' ' . $options['dropdown_class'] : '') . '">';

            if ($hasChildren) {
                $html .= '<a href="' . url($submenu->url) . '" class="' . $options['a_class'] . ' ' . $options['dropdown_toggle_class'] . '">' . $submenu->name . '</a>';
                $html .= '<ul class="' . $options['dropdown_menu_class'] . '">';

                foreach ($submenu->activeChildren as $child) {
                    $isChildActive = $currentUrl == url($child->url);
                    $html .= '<li class="' . $options['li_class'] . ($isChildActive ? ' ' . $options['active_class'] : '') . '">';
                    $html .= '<a href="' . url($child->url) . '" class="' . $options['a_class'] . '">' . $child->name . '</a>';
                    $html .= '</li>';
                }

                $html .= '</ul>';
            } else {
                $html .= '<a href="' . url($submenu->url) . '" class="' . $options['a_class'] . '">' . $submenu->name . '</a>';
            }

            $html .= '</li>';
        }

        $html .= '</ul>';

        return $html;
    }
}
