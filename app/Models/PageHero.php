<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageHero extends Model
{
    protected $fillable = [
        'page_identifier',
        'title',
        'subtitle',
        'background_image',
        'background_overlay_color',
        'background_overlay_opacity',
        'text_color',
        'text_alignment',
        'cta_primary_text',
        'cta_primary_url',
        'cta_secondary_text',
        'cta_secondary_url',
        'height',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'background_overlay_opacity' => 'integer'
    ];

    /**
     * Get hero data for a specific page
     */
    public static function getForPage($pageIdentifier)
    {
        return static::where('page_identifier', $pageIdentifier)
                    ->where('is_active', true)
                    ->first();
    }

    /**
     * Get height CSS class based on height setting
     */
    public function getHeightClass()
    {
        return match($this->height) {
            'small' => 'min-h-[40vh]',
            'medium' => 'min-h-[60vh]',
            'large' => 'min-h-[80vh]',
            'fullscreen' => 'min-h-screen',
            default => 'min-h-[80vh]'
        };
    }

    /**
     * Get text alignment CSS class
     */
    public function getTextAlignmentClass()
    {
        return match($this->text_alignment) {
            'left' => 'text-left',
            'right' => 'text-right',
            'center' => 'text-center',
            default => 'text-center'
        };
    }

    /**
     * Get text color CSS class
     */
    public function getTextColorClass()
    {
        return $this->text_color === 'dark' ? 'text-gray-900' : 'text-white';
    }

    /**
     * Get overlay styles
     */
    public function getOverlayStyles()
    {
        $opacity = $this->background_overlay_opacity / 100;
        $color = $this->background_overlay_color;
        
        return "background-color: {$color}; opacity: {$opacity};";
    }

    /**
     * Get default hero settings from global settings
     */
    public static function getDefaultSettings()
    {
        return [
            'overlay_color' => setting('hero_default_overlay_color', '#000000'),
            'overlay_opacity' => setting('hero_default_overlay_opacity', 50),
            'text_color' => setting('hero_default_text_color', 'white'),
            'text_alignment' => setting('hero_default_text_alignment', 'center'),
            'height' => setting('hero_default_height', 'large'),
            'enable_animations' => setting('hero_enable_animations', true),
            'enable_parallax' => setting('hero_enable_parallax', false),
        ];
    }    /**
     * Get fallback hero data when no specific page hero is found
     */
    public static function getFallback($pageIdentifier, $title = null, $subtitle = null)
    {
        $defaults = static::getDefaultSettings();
        
        $hero = new static();
        $hero->page_identifier = $pageIdentifier;
        $hero->title = $title ?: setting('hero_title', 'Welcome');
        $hero->subtitle = $subtitle ?: setting('hero_subtitle', '');
        $hero->background_image = setting('hero_background_image');
        $hero->background_overlay_color = $defaults['overlay_color'];
        $hero->background_overlay_opacity = $defaults['overlay_opacity'];
        $hero->text_color = $defaults['text_color'];
        $hero->text_alignment = $defaults['text_alignment'];
        $hero->cta_primary_text = setting('hero_cta_primary');
        $hero->cta_primary_url = setting('hero_cta_primary_url', '/contact');
        $hero->cta_secondary_text = setting('hero_cta_secondary');
        $hero->cta_secondary_url = setting('hero_cta_secondary_url', '/projects');
        $hero->height = $defaults['height'];
        $hero->is_active = true;
        
        return $hero;
    }

    /**
     * Get overlay styles using default or custom settings
     */
    public static function getOverlayStylesStatic($overlayColor = null, $overlayOpacity = null)
    {
        $defaults = static::getDefaultSettings();
        $opacity = ($overlayOpacity ?? $defaults['overlay_opacity']) / 100;
        $color = $overlayColor ?? $defaults['overlay_color'];
        
        return "background-color: {$color}; opacity: {$opacity};";
    }

    public static function getPageIdentifierOptions()
    {
        return [
            'home' => 'Beranda',
            'about' => 'Tentang Kami',
            'services' => 'Layanan',
            'projects' => 'Portfolio',
            'articles' => 'Artikel',
            'contact' => 'Kontak',
            'team' => 'Tim Kami',
            'careers' => 'Karir'
        ];
    }

    public static function getTextColorOptions()
    {
        return [
            'white' => 'Putih',
            'dark' => 'Gelap'
        ];
    }

    public static function getTextAlignmentOptions()
    {
        return [
            'left' => 'Kiri',
            'center' => 'Tengah',
            'right' => 'Kanan'
        ];
    }

    public static function getHeightOptions()
    {
        return [
            'small' => 'Kecil (40% viewport)',
            'medium' => 'Sedang (60% viewport)',
            'large' => 'Besar (80% viewport)',
            'fullscreen' => 'Full Screen'
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
