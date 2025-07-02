<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectCategory;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Create Project Categories
        $categories = [
            [
                'name' => 'Aplikasi Web',
                'slug' => 'aplikasi-web',
                'description' => 'Proyek pengembangan aplikasi web dan sistem online',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Aplikasi Mobile',
                'slug' => 'aplikasi-mobile',
                'description' => 'Proyek pengembangan aplikasi mobile iOS dan Android',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'Sistem Enterprise',
                'slug' => 'sistem-enterprise',
                'description' => 'Proyek sistem ERP dan manajemen enterprise',
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'name' => 'E-Commerce',
                'slug' => 'e-commerce',
                'description' => 'Proyek platform e-commerce dan marketplace',
                'is_active' => true,
                'sort_order' => 4
            ]
        ];

        foreach ($categories as $category) {
            ProjectCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }

        // Create Projects
        $webCategory = ProjectCategory::where('slug', 'aplikasi-web')->first();
        $mobileCategory = ProjectCategory::where('slug', 'aplikasi-mobile')->first();
        $enterpriseCategory = ProjectCategory::where('slug', 'sistem-enterprise')->first();
        $ecommerceCategory = ProjectCategory::where('slug', 'e-commerce')->first();

        $projects = [
            [
                'project_category_id' => $webCategory->id,
                'title' => 'Portal Pembelajaran Online EduTech',
                'slug' => 'portal-pembelajaran-online-edutech',
                'short_description' => 'Platform e-learning lengkap dengan fitur video conference, quiz, dan sertifikasi digital',
                'description' => 'EduTech merupakan platform pembelajaran online yang komprehensif yang dikembangkan untuk institusi pendidikan modern. Platform ini dilengkapi dengan berbagai fitur canggih seperti live streaming untuk kelas virtual, sistem quiz interaktif, tracking progress siswa, dan sistem sertifikasi digital.\n\nFitur Utama:\n- Dashboard siswa dan pengajar yang intuitif\n- Video conference terintegrasi dengan Zoom API\n- Library konten pembelajaran multimedia\n- Sistem penilaian otomatis\n- Progress tracking dan analytics\n- Mobile-responsive design\n- Payment gateway untuk kursus berbayar\n- Notification system real-time',
                'client_name' => 'EduTech Indonesia',
                'project_url' => 'https://edutech-demo.com',
                'start_date' => '2024-01-15',
                'end_date' => '2024-04-30',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'WebRTC', 'AWS'],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
                'meta_title' => 'Portal Pembelajaran Online EduTech - Case Study',
                'meta_description' => 'Case study pengembangan platform e-learning EduTech dengan fitur video conference, quiz interaktif, dan sertifikasi digital.'
            ],
            [
                'project_category_id' => $mobileCategory->id,
                'title' => 'Aplikasi Food Delivery TasteGo',
                'slug' => 'aplikasi-food-delivery-tastego',
                'short_description' => 'Aplikasi food delivery multi-platform dengan real-time tracking dan payment integration',
                'description' => 'TasteGo adalah aplikasi food delivery yang inovatif dengan antarmuka yang user-friendly dan fitur-fitur canggih. Aplikasi ini dikembangkan untuk menghubungkan customer, restaurant, dan driver dalam satu ecosystem yang terintegrasi.\n\nFitur Aplikasi:\n- Multi-platform (iOS & Android)\n- Real-time GPS tracking\n- Multiple payment methods\n- Restaurant management dashboard\n- Driver tracking system\n- Push notification\n- Rating dan review system\n- Promo dan loyalty program\n- In-app chat support',
                'client_name' => 'TasteGo Startup',
                'project_url' => 'https://tastego-app.com',
                'start_date' => '2024-02-01',
                'end_date' => '2024-06-15',
                'technologies' => ['React Native', 'Node.js', 'MongoDB', 'Socket.io', 'Firebase', 'Google Maps API'],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
                'meta_title' => 'Aplikasi Food Delivery TasteGo - Case Study',
                'meta_description' => 'Case study pengembangan aplikasi food delivery TasteGo dengan real-time tracking, payment integration, dan multi-platform support.'
            ],
            [
                'project_category_id' => $enterpriseCategory->id,
                'title' => 'Sistem ERP Manufaktur IndustriMax',
                'slug' => 'sistem-erp-manufaktur-industrimax',
                'short_description' => 'Sistem ERP terintegrasi untuk industri manufaktur dengan modul produksi, inventori, dan keuangan',
                'description' => 'IndustriMax adalah sistem ERP yang dikembangkan khusus untuk industri manufaktur dengan kompleksitas tinggi. Sistem ini mengintegrasikan seluruh aspek operasional perusahaan mulai dari procurement, production planning, quality control, hingga financial reporting.\n\nModul Sistem:\n- Production Planning & Scheduling\n- Inventory Management\n- Quality Control System\n- Financial Management\n- Human Resource Management\n- Procurement & Vendor Management\n- Sales & Customer Management\n- Reporting & Analytics Dashboard\n- Mobile App untuk supervisor\n- Integration dengan mesin produksi (IoT)',
                'client_name' => 'PT Industri Nusantara',
                'start_date' => '2023-08-01',
                'end_date' => '2024-03-30',
                'technologies' => ['Laravel', 'React', 'PostgreSQL', 'Redis', 'Docker', 'IoT Integration'],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
                'meta_title' => 'Sistem ERP Manufaktur IndustriMax - Case Study',
                'meta_description' => 'Case study pengembangan sistem ERP terintegrasi untuk industri manufaktur dengan modul produksi, inventori, dan keuangan.'
            ],
            [
                'project_category_id' => $ecommerceCategory->id,
                'title' => 'Marketplace Fashion StyleHub',
                'slug' => 'marketplace-fashion-stylehub',
                'short_description' => 'Platform marketplace fashion dengan AR virtual try-on dan social commerce features',
                'description' => 'StyleHub adalah marketplace fashion yang revolusioner dengan teknologi Augmented Reality untuk virtual try-on experience. Platform ini menggabungkan e-commerce tradisional dengan social commerce dan fitur-fitur inovatif untuk meningkatkan engagement customer.\n\nFitur Inovatif:\n- AR Virtual Try-On technology\n- Social commerce integration\n- Influencer partnership program\n- AI-powered product recommendation\n- Size recommendation system\n- Live streaming shopping\n- Multi-vendor marketplace\n- Advanced search dan filter\n- Wishlist dan comparison tool\n- Mobile app dengan camera integration',
                'client_name' => 'StyleHub Commerce',
                'project_url' => 'https://stylehub-marketplace.com',
                'start_date' => '2024-03-01',
                'end_date' => '2024-08-31',
                'technologies' => ['Next.js', 'Express.js', 'MongoDB', 'TensorFlow.js', 'WebRTC', 'AR.js'],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 4,
                'meta_title' => 'Marketplace Fashion StyleHub - Case Study',
                'meta_description' => 'Case study pengembangan marketplace fashion StyleHub dengan AR virtual try-on dan social commerce features.'
            ],
            [
                'project_category_id' => $webCategory->id,
                'title' => 'Sistem Manajemen Rumah Sakit HealthCare Pro',
                'slug' => 'sistem-manajemen-rumah-sakit-healthcare-pro',
                'short_description' => 'Sistem informasi rumah sakit terintegrasi dengan rekam medis elektronik dan telemedicine',
                'description' => 'HealthCare Pro adalah sistem informasi rumah sakit yang komprehensif yang mengintegrasikan seluruh aspek operasional rumah sakit modern. Sistem ini mendukung digitalisasi rekam medis, appointment online, dan fitur telemedicine.\n\nFitur Sistem:\n- Electronic Medical Records (EMR)\n- Appointment scheduling system\n- Telemedicine platform\n- Pharmacy management\n- Laboratory information system\n- Billing dan insurance claims\n- Staff scheduling\n- Patient portal\n- Mobile app untuk dokter\n- Integration dengan medical devices',
                'client_name' => 'RS Sehat Nusantara',
                'start_date' => '2023-10-01',
                'end_date' => '2024-05-30',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'WebRTC', 'HL7 FHIR', 'AWS'],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5,
                'meta_title' => 'Sistem Manajemen Rumah Sakit HealthCare Pro',
                'meta_description' => 'Case study pengembangan sistem informasi rumah sakit dengan EMR, telemedicine, dan appointment scheduling.'
            ],
            [
                'project_category_id' => $mobileCategory->id,
                'title' => 'Aplikasi Keuangan Personal FinanceTracker',
                'slug' => 'aplikasi-keuangan-personal-financetracker',
                'short_description' => 'Aplikasi pengelolaan keuangan personal dengan AI budgeting dan investment tracking',
                'description' => 'FinanceTracker adalah aplikasi mobile untuk pengelolaan keuangan personal yang dilengkapi dengan artificial intelligence untuk analisis spending pattern dan rekomendasi budgeting. Aplikasi ini membantu users mencapai financial goals mereka.\n\nFitur Aplikasi:\n- Automatic expense categorization\n- AI-powered budgeting recommendations\n- Investment portfolio tracking\n- Bill reminder dan autopay\n- Financial goal setting\n- Spending analytics dan insights\n- Multi-currency support\n- Bank account synchronization\n- Security dengan biometric authentication\n- Educational content tentang financial literacy',
                'client_name' => 'FinTech Solutions',
                'start_date' => '2024-01-01',
                'end_date' => '2024-04-30',
                'technologies' => ['Flutter', 'Firebase', 'Machine Learning', 'Plaid API', 'Biometric Auth'],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 6,
                'meta_title' => 'Aplikasi Keuangan Personal FinanceTracker',
                'meta_description' => 'Case study pengembangan aplikasi keuangan personal dengan AI budgeting dan investment tracking.'
            ]
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => $project['slug']],
                $project
            );
        }
    }
}
