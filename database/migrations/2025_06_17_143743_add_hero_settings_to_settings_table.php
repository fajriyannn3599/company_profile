<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // This migration adds additional hero-related settings to the settings table
        // These are global settings that affect hero behavior across the site
        
        // Insert hero configuration settings
        $heroSettings = [
            [
                'key' => 'hero_default_overlay_color',
                'value' => '#000000',
                'type' => 'color',
                'group' => 'hero'
            ],
            [
                'key' => 'hero_default_overlay_opacity',
                'value' => '50',
                'type' => 'number',
                'group' => 'hero'
            ],
            [
                'key' => 'hero_default_text_color',
                'value' => 'white',
                'type' => 'select',
                'group' => 'hero'
            ],
            [
                'key' => 'hero_default_text_alignment',
                'value' => 'center',
                'type' => 'select',
                'group' => 'hero'
            ],
            [
                'key' => 'hero_default_height',
                'value' => 'large',
                'type' => 'select',
                'group' => 'hero'
            ],
            [
                'key' => 'hero_cta_primary_url',
                'value' => '/contact',
                'type' => 'url',
                'group' => 'hero'
            ],
            [
                'key' => 'hero_cta_secondary_url',
                'value' => '/projects',
                'type' => 'url',
                'group' => 'hero'
            ],
            [
                'key' => 'hero_enable_animations',
                'value' => '1',
                'type' => 'boolean',
                'group' => 'hero'
            ],
            [
                'key' => 'hero_enable_parallax',
                'value' => '0',
                'type' => 'boolean',
                'group' => 'hero'
            ]
        ];

        foreach ($heroSettings as $setting) {
            DB::table('settings')->updateOrInsert(
                ['key' => $setting['key']],
                array_merge($setting, [
                    'created_at' => now(),
                    'updated_at' => now()
                ])
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove the hero settings added in the up method
        $heroSettingKeys = [
            'hero_default_overlay_color',
            'hero_default_overlay_opacity',
            'hero_default_text_color',
            'hero_default_text_alignment',
            'hero_default_height',
            'hero_cta_primary_url',
            'hero_cta_secondary_url',
            'hero_enable_animations',
            'hero_enable_parallax'
        ];

        DB::table('settings')->whereIn('key', $heroSettingKeys)->delete();
    }
};
