<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PageHero;
use App\Models\PageSeo;

class ContactPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contact Hero
        PageHero::updateOrCreate(
            ['page_identifier' => 'contact'],
            [
                'page_identifier' => 'contact',
                'title' => 'Hubungi Kami',
                'subtitle' => 'Mari diskusikan bagaimana kami dapat membantu mengembangkan bisnis Anda dengan solusi teknologi terdepan',
                'background_overlay_color' => '#1e40af',
                'background_overlay_opacity' => 80,
                'text_color' => 'white',
                'text_alignment' => 'center',
                'cta_primary_text' => 'Konsultasi Gratis',
                'cta_primary_url' => '#contact-form',
                'cta_secondary_text' => 'Lihat Layanan',
                'cta_secondary_url' => '/layanan',
                'height' => 'large',
                'is_active' => true
            ]
        );

        // Contact SEO
        PageSeo::updateOrCreate(
            ['page_identifier' => 'contact'],
            [
                'page_identifier' => 'contact',
                'title' => 'Hubungi Kami - ' . config('app.name'),
                'description' => 'Hubungi kami untuk konsultasi gratis tentang kebutuhan teknologi dan digital solution untuk bisnis Anda. Tim expert siap membantu.',
                'keywords' => 'kontak, hubungi kami, konsultasi IT, bantuan teknologi, customer service',
                'og_title' => 'Hubungi Kami - Konsultasi Gratis',
                'og_description' => 'Dapatkan konsultasi gratis dan solusi terbaik untuk kebutuhan teknologi bisnis Anda.',
                'is_active' => true
            ]
        );
    }
}
