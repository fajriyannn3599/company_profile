<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    protected $fillable = [
        'page_identifier',
        'title',
        'description',
        'keywords',
        'og_title',
        'og_description',
        'og_image',
        'twitter_title',
        'twitter_description',
        'twitter_image',
        'schema_markup',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Get SEO data for a specific page
     */
    public static function getForPage($pageIdentifier)
    {
        return static::where('page_identifier', $pageIdentifier)
                    ->where('is_active', true)
                    ->first();
    }

    /**
     * Get meta title for a page
     */
    public static function getTitle($pageIdentifier, $default = null)
    {
        $seo = static::getForPage($pageIdentifier);
        return $seo && $seo->title ? $seo->title : $default;
    }

    /**
     * Get meta description for a page
     */
    public static function getDescription($pageIdentifier, $default = null)
    {
        $seo = static::getForPage($pageIdentifier);
        return $seo && $seo->description ? $seo->description : $default;
    }

    /**
     * Get keywords for a page
     */
    public static function getKeywords($pageIdentifier, $default = null)
    {
        $seo = static::getForPage($pageIdentifier);
        return $seo && $seo->keywords ? $seo->keywords : $default;
    }

    /**
     * Get structured data for a page
     */
    public static function getSchemaMarkup($pageIdentifier)
    {
        $seo = static::getForPage($pageIdentifier);
        return $seo && $seo->schema_markup ? $seo->schema_markup : null;
    }
}
