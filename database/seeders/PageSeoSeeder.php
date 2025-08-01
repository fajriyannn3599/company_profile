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
                'title' => 'Home - BPR Syariah Arsa Sejahtera ',
                'description' => 'Kami menyediakan solusi digital terdepan dengan teknologi modern untuk mengembangkan bisnis Anda. Konsultasi gratis dan layanan professional.',
                'keywords' => 'solusi digital, development, konsultasi IT, teknologi, bisnis digital',
                'og_title' => 'Solusi Digital Terdepan untuk Bisnis Modern',
                'og_description' => 'Partner terpercaya untuk transformasi digital bisnis Anda dengan teknologi terdepan dan layanan profesional.',
                'is_active' => true
            ],
            [
                'page_identifier' => 'about',
                'title' => 'Profile - BPR Syariah Arsa Sejahtera',
                'description' => 'Pelajari lebih lanjut tentang perusahaan kami, visi misi, dan tim profesional yang berpengalaman dalam memberikan solusi terbaik.',
                'keywords' => 'tentang kami, company profile, visi misi, tim profesional',
                'og_title' => 'Tentang Kami - Perusahaan Teknologi Terpercaya',
                'og_description' => 'Mengenal lebih dalam tentang perusahaan, nilai-nilai, dan komitmen kami dalam memberikan layanan terbaik.',
                'is_active' => true
            ],
            [
                'page_identifier' => 'services',
                'title' => 'Produk - BPR Syariah Arsa Sejahtera',
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
                'title' => 'Berita - BPR Syariah Arsa Sejahtera',
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
            ],
            [
                'page_identifier' => 'contact',
                'title' => 'Pengajuan Pembiayaan - BPR Syariah Arsa Sejahtera',
                'description' => 'Hubungi kami untuk konsultasi gratis, pertanyaan, atau informasi lebih lanjut tentang layanan kami.',
                'keywords' => 'kontak, hubungi kami, konsultasi gratis, customer service',
                'og_title' => 'Hubungi Kami',
                'og_description' => 'Kami siap membantu Anda dengan pertanyaan atau kebutuhan terkait layanan kami.',
                'is_active' => true
            ],
            [
                'page_identifier' => 'financial-reports',
                'title' => 'Laporan Keuangan - BPR Syariah Arsa Sejahtera',
                'description' => 'Akses laporan keuangan terbaru kami untuk mendapatkan wawasan mendalam tentang kinerja dan pertumbuhan perusahaan.',
                'keywords' => 'laporan keuangan, laporan tahunan, analisis keuangan, kinerja perusahaan',
                'og_title' => 'Laporan Keuangan Terbaru',
                'og_description' => 'Dapatkan informasi terkini tentang kinerja keuangan BPR Syariah Arsa Sejahtera melalui laporan resmi kami.',
                'is_active' => true
            ],
            [
                'page_identifier' => 'hubungi-kami',
                'title' => 'Hubungi Kami - BPR Syariah Arsa Sejahtera',
                'description' => 'Kenali tim profesional kami yang berpengalaman dan berdedikasi dalam memberikan solusi terbaik untuk klien kami.',
                'keywords' => 'tim, profesional, ahli, pengalaman, dedikasi',
                'og_title' => 'Tim Profesional Kami',
                'og_description' => 'Mengenal lebih dekat tim yang menggerakkan perusahaan kami dengan keahlian dan komitmen tinggi.',
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
