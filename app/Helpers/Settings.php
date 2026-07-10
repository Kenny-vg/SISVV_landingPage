<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    function setting(string $key, mixed $default = null): mixed
    {
        static $settings = null;

        if ($settings === null) {
            $settings = Setting::pluck('value', 'key')->toArray();
        }

        return $settings[$key] ?? $default;
    }
}

if (!function_exists('sanitize_html')) {
    function sanitize_html(?string $html): ?string
    {
        if ($html === null || $html === '') {
            return $html;
        }

        return strip_tags($html, '<p><br><strong><em><i><b><u><span><a><ul><ol><li><h1><h2><h3><h4><h5><h6><blockquote><pre><code>');
    }
}
