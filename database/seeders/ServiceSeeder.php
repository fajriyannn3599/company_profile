<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Pengembangan Aplikasi Web',
                'slug' => 'pengembangan-aplikasi-web',
                'short_description' => 'Membangun aplikasi web modern dan responsif dengan teknologi terdepan',
                'description' => 'Kami menyediakan layanan pengembangan aplikasi web yang komprehensif menggunakan teknologi terbaru seperti Laravel, React, Vue.js, dan Node.js. Tim developer berpengalaman kami akan membantu Anda membangun aplikasi web yang tidak hanya menarik secara visual tetapi juga optimal dalam performa dan keamanan.\n\nLayanan kami meliputi:\n- Analisis kebutuhan dan perencanaan project\n- UI/UX Design yang user-friendly\n- Development dengan best practices\n- Testing dan quality assurance\n- Deployment dan maintenance\n- Training dan dokumentasi lengkap',
                'icon' => 'fas fa-code',
                'image' => null, // Akan menggunakan icon
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
                'meta_title' => 'Jasa Pengembangan Aplikasi Web Profesional',
                'meta_description' => 'Layanan pengembangan aplikasi web modern dan responsif dengan teknologi terdepan. Konsultasi gratis dengan tim developer berpengalaman.'
            ],
            [
                'title' => 'Aplikasi Mobile (iOS & Android)',
                'slug' => 'aplikasi-mobile-ios-android',
                'short_description' => 'Pengembangan aplikasi mobile native dan cross-platform untuk iOS dan Android',
                'description' => 'Kembangkan aplikasi mobile yang powerful dan user-friendly untuk platform iOS dan Android. Kami menggunakan teknologi terbaru seperti React Native, Flutter, Swift, dan Kotlin untuk memberikan pengalaman pengguna yang optimal.\n\nKeunggulan layanan kami:\n- Native dan Cross-platform development\n- UI/UX design yang intuitive\n- Integrasi dengan API dan database\n- Push notification dan real-time features\n- App Store dan Google Play Store submission\n- Maintenance dan update berkelanjutan',
                'icon' => 'fas fa-mobile-alt',
                'image' => null, // Akan menggunakan icon
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
                'meta_title' => 'Jasa Pembuatan Aplikasi Mobile iOS & Android',
                'meta_description' => 'Pengembangan aplikasi mobile profesional untuk iOS dan Android dengan teknologi terdepan. Konsultasi gratis sekarang!'
            ],
            [
                'title' => 'Sistem Manajemen Enterprise (ERP)',
                'slug' => 'sistem-manajemen-enterprise-erp',
                'short_description' => 'Solusi ERP terintegrasi untuk mengoptimalkan operasional bisnis Anda',
                'description' => 'Tingkatkan efisiensi operasional perusahaan dengan sistem ERP yang dikustomisasi sesuai kebutuhan bisnis Anda. Sistem kami mencakup manajemen inventori, keuangan, SDM, produksi, dan customer relationship management.\n\nFitur unggulan:\n- Dashboard analytics real-time\n- Multi-user dan role management\n- Automated reporting dan alert\n- Integrasi dengan sistem existing\n- Mobile-friendly interface\n- Data security dan backup otomatis\n- Training dan support 24/7',
                'icon' => 'fas fa-chart-line',
                'image' => null,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
                'meta_title' => 'Sistem ERP Enterprise Terintegrasi',
                'meta_description' => 'Solusi sistem ERP terintegrasi untuk mengoptimalkan operasional bisnis. Dashboard real-time, automated reporting, dan security terjamin.'
            ],
            [
                'title' => 'E-Commerce & Marketplace',
                'slug' => 'e-commerce-marketplace',
                'short_description' => 'Platform e-commerce lengkap dengan fitur marketplace modern',
                'description' => 'Bangun toko online atau marketplace yang powerful dengan fitur lengkap untuk mendukung bisnis digital Anda. Platform kami dilengkapi dengan sistem pembayaran terintegrasi, manajemen inventori, dan analytics yang komprehensif.\n\nFitur Platform:\n- Multi-vendor marketplace\n- Payment gateway integration\n- Inventory management system\n- Order tracking dan notification\n- Customer review dan rating\n- SEO-friendly structure\n- Mobile responsive design\n- Admin dashboard lengkap',
                'icon' => 'fas fa-shopping-cart',
                'image' => null,
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 4,
                'meta_title' => 'Platform E-Commerce & Marketplace Profesional',
                'meta_description' => 'Solusi e-commerce dan marketplace lengkap dengan payment gateway, inventory management, dan SEO-friendly. Konsultasi gratis!'
            ],
            [
                'title' => 'Cloud Computing & DevOps',
                'slug' => 'cloud-computing-devops',
                'short_description' => 'Migrasi cloud dan implementasi DevOps untuk infrastruktur yang scalable',
                'description' => 'Modernisasi infrastruktur IT Anda dengan solusi cloud computing dan implementasi DevOps best practices. Kami membantu migrasi dari on-premise ke cloud dan mengoptimalkan deployment pipeline untuk efisiensi maksimal.\n\nLayanan Cloud & DevOps:\n- Cloud migration strategy\n- AWS, Google Cloud, Azure implementation\n- CI/CD pipeline setup\n- Container orchestration (Docker, Kubernetes)\n- Infrastructure as Code (Terraform)\n- Monitoring dan alerting system\n- Security dan compliance\n- 24/7 support dan maintenance',
                'icon' => 'fas fa-cloud',
                'image' => null,
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5,
                'meta_title' => 'Layanan Cloud Computing & DevOps',
                'meta_description' => 'Solusi cloud computing dan DevOps untuk infrastruktur scalable. AWS, Google Cloud, CI/CD pipeline, dan container orchestration.'
            ],
            [
                'title' => 'Digital Marketing & SEO',
                'slug' => 'digital-marketing-seo',
                'short_description' => 'Strategi digital marketing dan optimasi SEO untuk meningkatkan online presence',
                'description' => 'Tingkatkan visibility dan reach bisnis online Anda dengan strategi digital marketing yang tepat sasaran. Tim digital marketing kami akan membantu mengoptimalkan website, konten, dan campaign untuk hasil maksimal.\n\nLayanan Digital Marketing:\n- SEO On-page dan Off-page\n- Google Ads dan Facebook Ads management\n- Content marketing strategy\n- Social media management\n- Email marketing automation\n- Analytics dan reporting\n- Conversion rate optimization\n- Brand awareness campaigns',
                'icon' => 'fas fa-bullhorn',
                'image' => null,
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 6,
                'meta_title' => 'Jasa Digital Marketing & SEO Profesional',
                'meta_description' => 'Layanan digital marketing dan SEO untuk meningkatkan online presence. Google Ads, Facebook Ads, content marketing, dan analytics.'
            ]
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}
