<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class HeroSettingsUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update existing hero settings with better defaults
        $heroUpdates = [
            'hero_title' => 'Transformasi Digital untuk Masa Depan Bisnis Anda',
            'hero_subtitle' => 'Kami menghadirkan solusi teknologi terdepan dan inovatif untuk membantu perusahaan Anda berkembang pesat di era digital yang terus berubah',
            'hero_cta_primary' => 'Mulai Konsultasi',
            'hero_cta_secondary' => 'Lihat Portfolio',
        ];

        foreach ($heroUpdates as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Add or update hero URL settings
        Setting::updateOrCreate(
            ['key' => 'hero_cta_primary_url'],
            [
                'value' => '/contact',
                'type' => 'url',
                'group' => 'hero'
            ]
        );

        Setting::updateOrCreate(
            ['key' => 'hero_cta_secondary_url'],
            [
                'value' => '/projects',
                'type' => 'url', 
                'group' => 'hero'
            ]
        );

        $this->command->info('Hero settings updated successfully.');
    }
}
