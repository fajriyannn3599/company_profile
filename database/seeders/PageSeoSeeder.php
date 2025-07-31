<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageSeo;

class PageSeoSeeder extends Seeder
{
    public function run()
    {
        $seoData = [
            [
                'page_identifier' => 'home',
                'title' => 'BPRS Arsa Sejahtera - ' . config('app.name'),
                'description' => 'Kami menyediakan solusi digital terdepan dengan teknologi modern untuk mengembangkan bisnis Anda. Konsultasi gratis dan layanan professional.',
                'keywords' => 'solusi digital, development, konsultasi IT, teknologi, bisnis digital',
                'og_title' => 'Solusi Digital Terdepan untuk Bisnis Modern',
                'og_description' => 'Partner terpercaya untuk transformasi digital bisnis Anda dengan teknologi terdepan dan layanan profesional.',
                'is_active' => true
            ],
            [
                'page_identifier' => 'about',
                'title' => 'Tentang Kami - ' . config('app.name'),
                'description' => 'Pelajari lebih lanjut tentang perusahaan kami, visi misi, dan tim profesional yang berpengalaman dalam memberikan solusi terbaik.',
                'keywords' => 'tentang kami, company profile, visi misi, tim profesional',
                'og_title' => 'Tentang Kami - Perusahaan Teknologi Terpercaya',
                'og_description' => 'Mengenal lebih dalam tentang perusahaan, nilai-nilai, dan komitmen kami dalam memberikan layanan terbaik.',
                'is_active' => true
            ],
            [
                'page_identifier' => 'services',
                'title' => 'Layanan Kami - ' . config('app.name'),
                'description' => 'Jelajahi berbagai layanan profesional kami: web development, mobile app, sistem informasi, dan konsultasi IT untuk bisnis Anda.',
                'keywords' => 'layanan IT, web development, mobile app, sistem informasi, konsultasi teknologi',
                'og_title' => 'Layanan Teknologi Profesional',
                'og_description' => 'Solusi teknologi lengkap untuk kebutuhan bisnis modern dengan kualitas terjamin dan harga kompetitif.',
                'is_active' => true
            ],
            [
                'page_identifier' => 'projects',
                'title' => 'Portfolio Kami - ' . config('app.name'),
                'description' => 'Lihat portfolio dan project terbaik yang telah kami kerjakan untuk berbagai klien dalam berbagai industri dan skala bisnis.',
                'keywords' => 'portfolio, project, case study, hasil kerja, klien',
                'og_title' => 'Portfolio Project Terbaik',
                'og_description' => 'Showcase project-project sukses yang telah kami selesaikan dengan hasil yang memuaskan klien.',
                'is_active' => true
            ],
            [
                'page_identifier' => 'articles',
                'title' => 'Artikel & Blog - ' . config('app.name'),
                'description' => 'Baca artikel dan blog terbaru seputar teknologi, tips bisnis, tutorial, dan insight menarik dari para ahli di bidangnya.',
                'keywords' => 'artikel teknologi, blog bisnis, tips, tutorial, insight',
                'og_title' => 'Artikel & Insight Teknologi Terbaru',
                'og_description' => 'Dapatkan informasi terkini dan tips berharga seputar teknologi dan perkembangan bisnis digital.',
                'is_active' => true
            ],
            [
                'page_identifier' => 'careers',
                'title' => 'Karier - ' . config('app.name'),
                'description' => 'Bergabunglah dengan tim kami! Temukan peluang karier terbaik dan kembangkan potensi Anda di lingkungan kerja yang dinamis.',
                'keywords' => 'karier, lowongan kerja, join team, peluang kerja, recruitment',
                'og_title' => 'Karier & Peluang Kerja',
                'og_description' => 'Wujudkan karier impian Anda bersama tim yang profesional dan berkomitmen pada excellence.',
                'is_active' => true
            ]
        ];

        foreach ($seoData as $data) {
            PageSeo::updateOrCreate(
                ['page_identifier' => $data['page_identifier']],
                $data
            );
        }
    }
}
