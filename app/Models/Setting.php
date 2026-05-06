<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['group', 'key', 'label', 'value', 'type', 'sort_order'];

    /**
     * Get a setting value by key, with optional default.
     */
    public static function get(string $key, string $default = ''): string
    {
        $settings = Cache::rememberForever('site_settings', fn () => static::pluck('value', 'key'));
        return $settings[$key] ?? $default;
    }

    /**
     * Bust the settings cache (call after any save).
     */
    public static function flush(): void
    {
        Cache::forget('site_settings');
    }
}
