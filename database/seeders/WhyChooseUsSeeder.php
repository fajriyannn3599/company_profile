<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WhyChooseUs;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $whyChooseUsData = [
            [
                'title' => 'Tim Berpengalaman',
                'description' => 'Didukung oleh tim profesional dengan pengalaman lebih dari 5 tahun di industri teknologi dan telah menangani berbagai proyek skala enterprise.',
                'icon' => 'fas fa-users',
                'color' => 'blue',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Teknologi Terdepan',
                'description' => 'Menggunakan teknologi dan framework terbaru seperti Laravel, React, Vue.js untuk menghasilkan solusi yang optimal, scalable dan future-proof.',
                'icon' => 'fas fa-rocket',
                'color' => 'purple',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Support 24/7',
                'description' => 'Dukungan teknis dan maintenance berkelanjutan untuk menjamin kelancaran sistem Anda dengan response time yang cepat dan reliable.',
                'icon' => 'fas fa-headset',
                'color' => 'green',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Keamanan Terjamin',
                'description' => 'Implementasi standar keamanan tertinggi dengan enkripsi SSL, secure coding practices, dan regular security audit untuk melindungi data Anda.',
                'icon' => 'fas fa-shield-alt',
                'color' => 'red',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Hasil Terukur',
                'description' => 'Setiap solusi dirancang untuk memberikan hasil yang dapat diukur dengan KPI yang jelas untuk meningkatkan ROI dan efisiensi bisnis Anda.',
                'icon' => 'fas fa-chart-line',
                'color' => 'yellow',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Partnership Jangka Panjang',
                'description' => 'Kami tidak hanya vendor, tapi partner strategis yang berkomitmen untuk kesuksesan jangka panjang bisnis Anda dengan relationship yang berkelanjutan.',
                'icon' => 'fas fa-handshake',
                'color' => 'indigo',
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'title' => 'Harga Kompetitif',
                'description' => 'Solusi berkualitas tinggi dengan harga yang terjangkau dan transparan. Tidak ada biaya tersembunyi, semua sudah termasuk dalam paket yang kami tawarkan.',
                'icon' => 'fas fa-dollar-sign',
                'color' => 'green',
                'sort_order' => 7,
                'is_active' => true,
            ],
            [
                'title' => 'Proses Transparan',
                'description' => 'Metodologi pengembangan yang transparan dengan regular update, milestone tracking, dan komunikasi yang jelas di setiap tahap project.',
                'icon' => 'fas fa-eye',
                'color' => 'gray',
                'sort_order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($whyChooseUsData as $data) {
            WhyChooseUs::create($data);
        }
    }
}
