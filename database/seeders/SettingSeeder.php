<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General Settings
            ['key' => 'site_name', 'value' => 'PT Digital Solusi Nusantara', 'type' => 'text', 'group' => 'general'],
            ['key' => 'meta_description', 'value' => 'Perusahaan teknologi terdepan yang menyediakan solusi digital inovatif untuk mengembangkan bisnis Anda', 'type' => 'textarea', 'group' => 'general'],
            ['key' => 'favicon', 'value' => '/favicon.ico', 'type' => 'image', 'group' => 'general'],
            ['key' => 'logo', 'value' => '', 'type' => 'image', 'group' => 'general'],
            ['key' => 'primary_color', 'value' => '#2563eb', 'type' => 'text', 'group' => 'general'],
            
            // Hero Section
            ['key' => 'hero_title', 'value' => 'Solusi Digital Terdepan untuk Bisnis Modern', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_subtitle', 'value' => 'Kami menghadirkan inovasi teknologi terbaru untuk membantu transformasi digital perusahaan Anda dengan solusi yang efektif dan efisien', 'type' => 'textarea', 'group' => 'hero'],
            ['key' => 'hero_cta_primary', 'value' => 'Konsultasi Gratis', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_cta_secondary', 'value' => 'Lihat Portfolio', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_background_image', 'value' => '', 'type' => 'image', 'group' => 'hero'],
            
            // About Section
            ['key' => 'about_title', 'value' => 'Tentang PT Digital Solusi Nusantara', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_description', 'value' => 'Sejak didirikan pada tahun 2015, kami telah menjadi mitra terpercaya bagi lebih dari 500 perusahaan dalam transformasi digital mereka. Tim ahli kami terdiri dari profesional berpengalaman di bidang teknologi informasi, desain, dan strategi bisnis.\n\nKami mengkhususkan diri dalam pengembangan aplikasi web dan mobile, sistem manajemen enterprise, e-commerce, dan solusi cloud computing. Dengan pendekatan yang berfokus pada klien, kami memastikan setiap solusi yang kami berikan sesuai dengan kebutuhan spesifik dan tujuan bisnis Anda.', 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'about_image', 'value' => '', 'type' => 'image', 'group' => 'about'],
            ['key' => 'vision', 'value' => 'Menjadi perusahaan teknologi terdepan di Indonesia yang memberikan solusi digital inovatif dan berkelanjutan', 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'mission', 'value' => 'Membantu perusahaan dalam transformasi digital melalui teknologi terdepan, layanan berkualitas tinggi, dan partnership jangka panjang yang saling menguntungkan', 'type' => 'textarea', 'group' => 'about'],
            
            // Contact Information
            ['key' => 'contact_address', 'value' => 'Jl. Sudirman No. 123, Jakarta Pusat 10220, Indonesia', 'type' => 'textarea', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+62 21 1234 5678', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'info@digitalsolusi.com', 'type' => 'email', 'group' => 'contact'],
            ['key' => 'contact_whatsapp', 'value' => '+62 812 3456 7890', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'google_maps_embed', 'value' => '', 'type' => 'textarea', 'group' => 'contact'],
            
            // Social Media
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/digitalsolusi', 'type' => 'url', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/digitalsolusi', 'type' => 'url', 'group' => 'social'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/digitalsolusi', 'type' => 'url', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/digitalsolusi', 'type' => 'url', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => 'https://youtube.com/digitalsolusi', 'type' => 'url', 'group' => 'social'],
            
            // Footer
            ['key' => 'footer_description', 'value' => 'PT Digital Solusi Nusantara adalah perusahaan teknologi yang berfokus pada pengembangan solusi digital inovatif untuk membantu bisnis berkembang di era digital.', 'type' => 'textarea', 'group' => 'footer'],
            ['key' => 'footer_copyright', 'value' => 'PT Digital Solusi Nusantara', 'type' => 'text', 'group' => 'footer'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
