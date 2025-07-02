<?php

if (!function_exists('setting')) {
    /**
     * Get setting value by key
     */
    function setting($key, $default = null)
    {
        return \App\Models\Setting::get($key, $default);
    }
}

if (!function_exists('page_seo')) {
    /**
     * Get page SEO data
     */
    function page_seo($pageIdentifier)
    {
        return \App\Models\PageSeo::getForPage($pageIdentifier);
    }
}

if (!function_exists('page_hero')) {
    /**
     * Get page hero data
     */
    function page_hero($pageIdentifier)
    {
        return \App\Models\PageHero::getForPage($pageIdentifier);
    }
}

if (!function_exists('page_title')) {
    /**
     * Get page title with fallback
     */
    function page_title($pageIdentifier, $default = null)
    {
        return \App\Models\PageSeo::getTitle($pageIdentifier, $default ?: setting('site_name'));
    }
}

if (!function_exists('page_description')) {
    /**
     * Get page description with fallback
     */
    function page_description($pageIdentifier, $default = null)
    {
        return \App\Models\PageSeo::getDescription($pageIdentifier, $default ?: setting('meta_description'));
    }
}
