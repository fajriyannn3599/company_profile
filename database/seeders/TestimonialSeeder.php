<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Budi Santoso',
                'client_position' => 'CEO',
                'client_company' => 'PT Maju Bersama',
                'testimonial' => 'Tim Digital Solusi Nusantara berhasil mengembangkan sistem ERP yang sangat membantu operasional perusahaan kami. Mereka profesional, responsif, dan selalu memberikan solusi terbaik. Highly recommended!',
                'rating' => 5,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'client_name' => 'Sarah Wijaya',
                'client_position' => 'Marketing Director',
                'client_company' => 'StartupTech Indonesia',
                'testimonial' => 'Website dan aplikasi mobile yang dikembangkan sangat membantu bisnis kami berkembang pesat. User experience yang luar biasa dan performa yang optimal. Terima kasih atas kerja sama yang luar biasa!',
                'rating' => 5,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'client_name' => 'Ahmad Rahman',
                'client_position' => 'IT Manager',
                'client_company' => 'CV Digital Prima',
                'testimonial' => 'Proses development yang transparan dan komunikasi yang sangat baik. Tim mereka benar-benar memahami kebutuhan bisnis kami dan memberikan solusi yang tepat sasaran.',
                'rating' => 5,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'client_name' => 'Diana Kusuma',
                'client_position' => 'Operations Manager',
                'client_company' => 'Toko Online Nusantara',
                'testimonial' => 'Platform e-commerce yang dikembangkan sangat user-friendly dan memiliki fitur yang lengkap. Penjualan online kami meningkat drastis setelah menggunakan platform ini.',
                'rating' => 5,
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'client_name' => 'Rizki Pratama',
                'client_position' => 'Founder',
                'client_company' => 'EduLearn Academy',
                'testimonial' => 'Sistem pembelajaran online yang dikembangkan sangat inovatif dan mudah digunakan. Siswa-siswa kami sangat antusias menggunakan platform ini untuk belajar.',
                'rating' => 5,
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5
            ]
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
