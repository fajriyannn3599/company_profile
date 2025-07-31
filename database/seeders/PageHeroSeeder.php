<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageHero;

class PageHeroSeeder extends Seeder
{
    public function run()
    {
        $heroData = [
            [
                'page_identifier' => 'home',
                'title' => 'Solusi Digital Terdepan untuk Bisnis Modern',
                'subtitle' => 'Kami menghadirkan inovasi teknologi terbaru untuk membantu transformasi digital perusahaan Anda dengan solusi yang efektif dan efisien',
                'background_overlay_color' => '#000000',
                'background_overlay_opacity' => 50,
                'text_color' => 'white',
                'text_alignment' => 'center',
                'cta_primary_text' => 'Konsultasi Gratis',
                'cta_primary_url' => '/kontak',
                'cta_secondary_text' => 'Lihat Portfolio',
                'cta_secondary_url' => '/portofolio',
                'height' => 'fullscreen',
                'is_active' => true
            ],
            [
                'page_identifier' => 'about',
                'title' => 'Tentang Kami',
                'subtitle' => 'Mengenal lebih dalam tentang perusahaan kami, visi misi, dan komitmen untuk memberikan yang terbaik',
                'background_overlay_color' => '#1e40af',
                'background_overlay_opacity' => 80,
                'text_color' => 'white',
                'text_alignment' => 'center',
                'cta_primary_text' => 'Hubungi Kami',
                'cta_primary_url' => '/kontak',
                'height' => 'large',
                'is_active' => true
            ],
            [
                'page_identifier' => 'services',
                'title' => 'Layanan Kami',
                'subtitle' => 'Solusi teknologi komprehensif untuk mengembangkan bisnis Anda dengan standar kualitas internasional',
                'background_overlay_color' => '#1e40af',
                'background_overlay_opacity' => 80,
                'text_color' => 'white',
                'text_alignment' => 'center',
                'cta_primary_text' => 'Konsultasi Gratis',
                'cta_primary_url' => '/kontak',
                'cta_secondary_text' => 'Lihat Portfolio',
                'cta_secondary_url' => '/portofolio',
                'height' => 'large',
                'is_active' => true
            ],
            [
                'page_identifier' => 'projects',
                'title' => 'Portfolio Kami',
                'subtitle' => 'Showcase project-project terbaik yang telah kami selesaikan untuk berbagai klien di berbagai industri',
                'background_overlay_color' => '#1e40af',
                'background_overlay_opacity' => 80,
                'text_color' => 'white',
                'text_alignment' => 'center',
                'cta_primary_text' => 'Mulai Project',
                'cta_primary_url' => '/kontak',
                'cta_secondary_text' => 'Lihat Layanan',
                'cta_secondary_url' => '/layanan',
                'height' => 'large',
                'is_active' => true
            ],
            [
                'page_identifier' => 'articles',
                'title' => 'Artikel & Blog',
                'subtitle' => 'Dapatkan insight terbaru, tips praktis, dan informasi berharga dari para ahli di bidang teknologi dan bisnis',
                'background_overlay_color' => '#1e40af',
                'background_overlay_opacity' => 80,
                'text_color' => 'white',
                'text_alignment' => 'center',
                'height' => 'medium',
                'is_active' => true
            ],
            [
                'page_identifier' => 'careers',
                'title' => 'Bergabunglah dengan Tim Terbaik',
                'subtitle' => 'Kembangkan karier dan wujudkan potensi terbaik Anda bersama tim yang profesional dan berpengalaman',
                'background_overlay_color' => '#1e40af',
                'background_overlay_opacity' => 80,
                'text_color' => 'white',
                'text_alignment' => 'center',
                'cta_primary_text' => 'Lihat Lowongan',
                'cta_primary_url' => '#jobs',
                'cta_secondary_text' => 'Tentang Kami',
                'cta_secondary_url' => '/tentang-kami',
                'height' => 'large',
                'is_active' => false
            ]
        ];

        foreach ($heroData as $data) {
            PageHero::updateOrCreate(
                ['page_identifier' => $data['page_identifier']],
                $data
            );
        }
    }
}
