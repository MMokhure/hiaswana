<?php

use App\Models\Setting;

if (! function_exists('setting')) {
    /**
     * Retrieve a site setting value by key.
     */
    function setting(string $key, string $default = ''): string
    {
        return Setting::get($key, $default);
    }
}
