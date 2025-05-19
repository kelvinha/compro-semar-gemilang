<?php

use App\Helpers\SettingHelper;

if (!function_exists('setting')) {
    /**
     * Get setting value by key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting($key, $default = null)
    {
        return SettingHelper::get($key, $default);
    }
}
