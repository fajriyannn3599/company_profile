<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArticleCategory;
use App\Models\Article;
use App\Models\User;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        // Create Article Categories
        $categories = [
            [
                'name' => 'Technology Trends',
                'slug' => 'technology-trends',
                'description' => 'Artikel tentang tren teknologi terbaru dan masa depan',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Tips dan tutorial pengembangan web',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'Mobile Development',
                'slug' => 'mobile-development',
                'description' => 'Panduan dan best practices mobile development',
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'name' => 'Digital Business',
                'slug' => 'digital-business',
                'description' => 'Strategi dan tips untuk bisnis digital',
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'name' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'description' => 'Artikel tentang desain user interface dan user experience',
                'is_active' => true,
                'sort_order' => 5
            ]
        ];

        foreach ($categories as $category) {
            ArticleCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }

        // Get user and categories
        $user = User::first();
        $techCategory = ArticleCategory::where('slug', 'technology-trends')->first();
        $webCategory = ArticleCategory::where('slug', 'web-development')->first();
        $mobileCategory = ArticleCategory::where('slug', 'mobile-development')->first();
        $businessCategory = ArticleCategory::where('slug', 'digital-business')->first();
        $designCategory = ArticleCategory::where('slug', 'ui-ux-design')->first();

        // Create Articles
        $articles = [
            [
                'article_category_id' => $techCategory->id,
                'user_id' => $user->id,
                'title' => 'Artificial Intelligence dalam Pengembangan Software Modern',
                'slug' => 'artificial-intelligence-dalam-pengembangan-software-modern',
                'excerpt' => 'Eksplorasi bagaimana AI mengubah landscape pengembangan software dan dampaknya terhadap industri teknologi.',
                'content' => 'Artificial Intelligence (AI) telah menjadi salah satu teknologi paling revolusioner dalam dekade terakhir. Dalam dunia pengembangan software, AI tidak hanya mengubah cara kita membangun aplikasi, tetapi juga membuka peluang baru yang sebelumnya tidak pernah terbayangkan.\n\nPenggunaan AI dalam development mencakup berbagai aspek, mulai dari code generation, automated testing, hingga intelligent debugging. Tools seperti GitHub Copilot dan ChatGPT telah membuktikan bahwa AI dapat membantu developer menjadi lebih produktif dan efisien.\n\nNamun, penting untuk diingat bahwa AI bukanlah pengganti developer, melainkan alat yang powerful untuk meningkatkan kemampuan dan productivity. Masa depan pengembangan software akan didominasi oleh kolaborasi antara human intelligence dan artificial intelligence.',
                'tags' => ['AI', 'Machine Learning', 'Software Development', 'Technology'],
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now()->subDays(2),
                'views' => 156,
                'meta_title' => 'AI dalam Software Development - Masa Depan Programming',
                'meta_description' => 'Pelajari bagaimana Artificial Intelligence mengubah cara pengembangan software modern dan dampaknya terhadap industri teknologi.'
            ],
            [
                'article_category_id' => $webCategory->id,
                'user_id' => $user->id,
                'title' => 'Laravel 11: Fitur Baru dan Peningkatan Performance',
                'slug' => 'laravel-11-fitur-baru-dan-peningkatan-performance',
                'excerpt' => 'Overview lengkap tentang fitur-fitur baru Laravel 11 dan bagaimana memanfaatkannya untuk development yang lebih efisien.',
                'content' => 'Laravel 11 hadir dengan berbagai fitur baru dan peningkatan yang signifikan. Salah satu highlight utama adalah improved performance dan developer experience yang lebih baik.\n\nFitur-fitur baru yang patut diperhatikan:\n\n1. Streamlined Application Structure\nLaravel 11 memiliki struktur aplikasi yang lebih sederhana dengan mengurangi file-file yang tidak perlu untuk project kecil hingga menengah.\n\n2. New Artisan Commands\nArtisan commands yang lebih powerful dengan opsi customization yang lebih fleksibel.\n\n3. Enhanced Database Features\nImprovements pada Eloquent ORM dan Query Builder untuk performance yang lebih optimal.\n\n4. Better Testing Capabilities\nTools testing yang lebih comprehensive dan mudah digunakan.\n\nUpgrade ke Laravel 11 sangat direkomendasikan untuk project baru, terutama dengan ecosystem yang semakin mature.',
                'tags' => ['Laravel', 'PHP', 'Web Development', 'Framework'],
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'views' => 243,
                'meta_title' => 'Laravel 11 - Fitur Baru dan Performance Update',
                'meta_description' => 'Panduan lengkap fitur-fitur baru Laravel 11 dan cara memanfaatkannya untuk web development yang lebih efisien.'
            ],
            [
                'article_category_id' => $mobileCategory->id,
                'user_id' => $user->id,
                'title' => 'React Native vs Flutter: Pilihan Terbaik untuk Cross-Platform Development',
                'slug' => 'react-native-vs-flutter-pilihan-terbaik-cross-platform-development',
                'excerpt' => 'Perbandingan mendalam antara React Native dan Flutter untuk membantu developer memilih framework yang tepat.',
                'content' => 'Dalam dunia mobile development, cross-platform frameworks telah menjadi pilihan utama untuk mengembangkan aplikasi yang dapat berjalan di iOS dan Android sekaligus. Dua framework terpopuler saat ini adalah React Native dan Flutter.\n\nReact Native:\n- Dikembangkan oleh Facebook (Meta)\n- Menggunakan JavaScript dan React\n- Community yang besar dan mature\n- Hot reload untuk development yang cepat\n- Native performance yang baik\n\nFlutter:\n- Dikembangkan oleh Google\n- Menggunakan bahasa Dart\n- Performance yang excellent dengan rendering engine sendiri\n- Rich UI components out of the box\n- Growing ecosystem dan community\n\nPemilihan antara keduanya tergantung pada beberapa faktor:\n1. Expertise tim development\n2. Requirements performance aplikasi\n3. Timeline project\n4. Budget dan resources\n\nKedua framework memiliki kelebihan masing-masing dan dapat menghasilkan aplikasi berkualitas tinggi.',
                'tags' => ['React Native', 'Flutter', 'Mobile Development', 'Cross-Platform'],
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(7),
                'views' => 189,
                'meta_title' => 'React Native vs Flutter - Framework Mana yang Terbaik?',
                'meta_description' => 'Perbandingan lengkap React Native vs Flutter untuk cross-platform mobile development. Pilih framework yang tepat untuk project Anda.'
            ],
            [
                'article_category_id' => $businessCategory->id,
                'user_id' => $user->id,
                'title' => 'Digital Transformation: Strategi Sukses untuk Perusahaan Tradisional',
                'slug' => 'digital-transformation-strategi-sukses-perusahaan-tradisional',
                'excerpt' => 'Panduan praktis untuk perusahaan tradisional yang ingin melakukan transformasi digital dengan strategi yang tepat.',
                'content' => 'Digital transformation bukan lagi pilihan, tetapi keharusan untuk perusahaan yang ingin tetap kompetitif di era digital. Namun, proses transformasi ini sering kali menantang, terutama untuk perusahaan tradisional.\n\nLangkah-langkah Strategis:\n\n1. Assessment Digital Maturity\nEvaluasi kondisi current digital infrastructure dan capability organisasi.\n\n2. Define Clear Objectives\nTentukan tujuan yang specific, measurable, dan aligned dengan business goals.\n\n3. Technology Selection\nPilih teknologi yang sesuai dengan kebutuhan dan budget perusahaan.\n\n4. Change Management\nPersiapkan organisasi untuk perubahan dengan training dan komunikasi yang efektif.\n\n5. Phased Implementation\nImplementasi bertahap untuk minimize risk dan ensure smooth transition.\n\n6. Continuous Monitoring\nMonitor progress secara berkala dan adjust strategy sesuai kebutuhan.\n\nKey Success Factors:\n- Leadership commitment\n- Employee engagement\n- Customer-centric approach\n- Data-driven decision making\n\nTransformasi digital yang sukses membutuhkan kombinasi technology, people, dan process yang optimal.',
                'tags' => ['Digital Transformation', 'Business Strategy', 'Technology', 'Change Management'],
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'views' => 312,
                'meta_title' => 'Digital Transformation - Strategi Sukses untuk Perusahaan',
                'meta_description' => 'Panduan lengkap digital transformation untuk perusahaan tradisional. Strategi, implementasi, dan best practices.'
            ],
            [
                'article_category_id' => $designCategory->id,
                'user_id' => $user->id,
                'title' => 'Principles of Modern UI/UX Design: Creating User-Centered Experiences',
                'slug' => 'principles-modern-ui-ux-design-creating-user-centered-experiences',
                'excerpt' => 'Eksplorasi prinsip-prinsip fundamental dalam modern UI/UX design untuk menciptakan pengalaman pengguna yang exceptional.',
                'content' => 'Modern UI/UX design bukan hanya tentang membuat interface yang beautiful, tetapi juga tentang creating experiences yang meaningful dan functional. Berikut adalah prinsip-prinsip fundamental yang harus dipahami setiap designer.\n\nUser-Centered Design Principles:\n\n1. Usability First\nPrioritaskan kemudahan penggunaan over visual complexity. Interface yang indah tetapi sulit digunakan tidak akan berhasil.\n\n2. Consistency\nMaintain consistent design patterns, colors, typography, dan interactions across all touchpoints.\n\n3. Accessibility\nDesign untuk semua users, including those with disabilities. Follow WCAG guidelines untuk inclusive design.\n\n4. Visual Hierarchy\nGuide user attention dengan proper use of size, color, spacing, dan typography.\n\n5. Responsive Design\nEnsure optimal experience across all devices dan screen sizes.\n\n6. Performance\nOptimize load times dan smooth interactions untuk better user experience.\n\nDesign Process:\n1. Research & Discovery\n2. Information Architecture\n3. Wireframing & Prototyping\n4. Visual Design\n5. Testing & Iteration\n\nTools yang essential:\n- Figma atau Sketch untuk UI design\n- Adobe Creative Suite untuk graphics\n- Principle atau Framer untuk prototyping\n- Hotjar atau Google Analytics untuk user research\n\nRemember: Good design is invisible. Jika users dapat accomplish their goals effortlessly, berarti design Anda successful.',
                'tags' => ['UI Design', 'UX Design', 'User Experience', 'Design Principles'],
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(12),
                'views' => 167,
                'meta_title' => 'Modern UI/UX Design Principles - User-Centered Approach',
                'meta_description' => 'Pelajari prinsip-prinsip fundamental modern UI/UX design untuk menciptakan user experience yang exceptional dan user-centered.'
            ]
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['slug' => $article['slug']],
                $article
            );
        }
    }
}
