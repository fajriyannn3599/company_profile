-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2025 at 08:28 AM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hanq5756_comprofLaravel_01`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tags`)),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article_category_id`, `user_id`, `title`, `slug`, `excerpt`, `content`, `featured_image`, `tags`, `is_featured`, `is_published`, `published_at`, `views`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Artificial Intelligence dalam Pengembangan Software Modern', 'artificial-intelligence-dalam-pengembangan-software-modern', 'Eksplorasi bagaimana AI mengubah landscape pengembangan software dan dampaknya terhadap industri teknologi.', '<div class=\"prose max-w-4xl mx-auto p-6\">\r\n  <h1 class=\"text-3xl font-bold text-gray-800 mb-4\">Artificial Intelligence dalam Pengembangan Software Modern</h1>\r\n\r\n  <p class=\"text-gray-700 mb-6\">\r\n    Artificial Intelligence (AI) kini menjadi komponen penting dalam pengembangan software modern. Dengan kemampuan untuk belajar dari data, mengenali pola, dan membuat keputusan cerdas, AI memberikan peluang besar bagi developer untuk menciptakan aplikasi yang lebih efisien, personal, dan adaptif.\r\n  </p>\r\n\r\n  <h2 class=\"text-2xl font-semibold text-gray-800 mb-2\">Peran AI dalam Pengembangan Software</h2>\r\n  <ul class=\"list-disc list-inside text-gray-700 mb-6 space-y-1\">\r\n    <li><strong>Otomatisasi Proses:</strong> AI dapat mengotomatiskan tugas rutin seperti pengujian kode dan deployment.</li>\r\n    <li><strong>Prediksi dan Analisis:</strong> AI membantu menganalisis perilaku pengguna dan memprediksi kebutuhan mereka.</li>\r\n    <li><strong>Asisten Koding:</strong> Tools seperti GitHub Copilot memanfaatkan AI untuk membantu developer menulis kode lebih cepat.</li>\r\n    <li><strong>Deteksi Bug Otomatis:</strong> AI mampu mendeteksi anomali dalam log atau kode yang berpotensi menjadi bug.</li>\r\n  </ul>\r\n\r\n  <h2 class=\"text-2xl font-semibold text-gray-800 mb-2\">Contoh Implementasi AI dalam Tools Developer</h2>\r\n  <div class=\"overflow-x-auto mb-6\">\r\n    <table class=\"min-w-full table-auto border border-gray-300 text-sm text-left\">\r\n      <thead class=\"bg-gray-100 text-gray-700\">\r\n        <tr>\r\n          <th class=\"border px-4 py-2\">Tool</th>\r\n          <th class=\"border px-4 py-2\">Fungsi</th>\r\n          <th class=\"border px-4 py-2\">Teknologi AI yang Digunakan</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        <tr class=\"hover:bg-gray-50\">\r\n          <td class=\"border px-4 py-2\">GitHub Copilot</td>\r\n          <td class=\"border px-4 py-2\">Otomatisasi penulisan kode</td>\r\n          <td class=\"border px-4 py-2\">Natural Language Processing (NLP)</td>\r\n        </tr>\r\n        <tr class=\"hover:bg-gray-50\">\r\n          <td class=\"border px-4 py-2\">Snyk</td>\r\n          <td class=\"border px-4 py-2\">Keamanan kode secara otomatis</td>\r\n          <td class=\"border px-4 py-2\">Machine Learning</td>\r\n        </tr>\r\n        <tr class=\"hover:bg-gray-50\">\r\n          <td class=\"border px-4 py-2\">Tabnine</td>\r\n          <td class=\"border px-4 py-2\">Autocomplete kode berbasis AI</td>\r\n          <td class=\"border px-4 py-2\">Deep Learning</td>\r\n        </tr>\r\n        <tr class=\"hover:bg-gray-50\">\r\n          <td class=\"border px-4 py-2\">DeepCode</td>\r\n          <td class=\"border px-4 py-2\">Analisis kode real-time</td>\r\n          <td class=\"border px-4 py-2\">AI Pattern Recognition</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </div>\r\n\r\n  <h2 class=\"text-2xl font-semibold text-gray-800 mb-2\">Manfaat AI dalam Software Engineering</h2>\r\n  <ol class=\"list-decimal list-inside text-gray-700 mb-6 space-y-1\">\r\n    <li><strong>Produktivitas meningkat:</strong> AI mempercepat proses development dan mengurangi kesalahan manual.</li>\r\n    <li><strong>Kualitas kode lebih baik:</strong> AI dapat memberikan saran perbaikan dan identifikasi bug lebih awal.</li>\r\n    <li><strong>User experience yang lebih baik:</strong> Software dapat dipersonalisasi sesuai preferensi pengguna.</li>\r\n    <li><strong>Skalabilitas lebih tinggi:</strong> Aplikasi lebih siap berkembang secara dinamis.</li>\r\n  </ol>\r\n\r\n  <h2 class=\"text-2xl font-semibold text-gray-800 mb-2\">Studi Kasus: AI dalam Aplikasi Nyata</h2>\r\n  <ul class=\"list-disc list-inside text-gray-700 mb-6 space-y-1\">\r\n    <li><strong>Netflix:</strong> Menganalisis histori tontonan untuk rekomendasi film.</li>\r\n    <li><strong>Grammarly:</strong> Memperbaiki grammar dan tone tulisan secara otomatis.</li>\r\n    <li><strong>Spotify:</strong> Membuat playlist dari kebiasaan mendengarkan pengguna.</li>\r\n    <li><strong>Self-driving car:</strong> AI vision digunakan untuk membaca lingkungan sekitar.</li>\r\n  </ul>\r\n\r\n  <h2 class=\"text-2xl font-semibold text-gray-800 mb-2\">Tantangan dan Risiko</h2>\r\n  <ul class=\"list-disc list-inside text-gray-700 mb-6 space-y-1\">\r\n    <li>Kebutuhan data besar untuk pelatihan model</li>\r\n    <li>Etika dan privasi pengguna</li>\r\n    <li>Transparansi algoritma masih terbatas</li>\r\n    <li>Ketergantungan terhadap vendor atau model pihak ketiga</li>\r\n  </ul>\r\n\r\n  <h2 class=\"text-2xl font-semibold text-gray-800 mb-2\">Kesimpulan</h2>\r\n  <p class=\"text-gray-700\">\r\n    Artificial Intelligence telah mengubah cara software dikembangkan dan digunakan. Dengan berbagai tools dan teknologi yang tersedia, AI menjadikan pengembangan software lebih cerdas, cepat, dan relevan dengan kebutuhan masa kini. Namun, penerapannya tetap harus memperhatikan etika dan keamanan demi keberlanjutan jangka panjang.\r\n  </p>\r\n</div>', 'articles/1BPaaCTEqmxNr1mp4SxgNKlTFgPWaepu1KUkb2RZ.jpg', '[\"AI\", \"Machine Learning\", \"Software Development\", \"Technology\"]', 1, 1, '2025-06-21 09:24:09', 156, 'AI dalam Software Development - Masa Depan Programming', 'Pelajari bagaimana Artificial Intelligence mengubah cara pengembangan software modern dan dampaknya terhadap industri teknologi.', '2025-06-23 09:24:09', '2025-06-23 19:12:43'),
(2, 2, 1, 'Laravel 11: Fitur Baru dan Peningkatan Performance', 'laravel-11-fitur-baru-dan-peningkatan-performance', 'Overview lengkap tentang fitur-fitur baru Laravel 11 dan bagaimana memanfaatkannya untuk development yang lebih efisien.', 'Laravel 11 hadir dengan berbagai fitur baru dan peningkatan yang signifikan. Salah satu highlight utama adalah improved performance dan developer experience yang lebih baik.\\n\\nFitur-fitur baru yang patut diperhatikan:\\n\\n1. Streamlined Application Structure\\nLaravel 11 memiliki struktur aplikasi yang lebih sederhana dengan mengurangi file-file yang tidak perlu untuk project kecil hingga menengah.\\n\\n2. New Artisan Commands\\nArtisan commands yang lebih powerful dengan opsi customization yang lebih fleksibel.\\n\\n3. Enhanced Database Features\\nImprovements pada Eloquent ORM dan Query Builder untuk performance yang lebih optimal.\\n\\n4. Better Testing Capabilities\\nTools testing yang lebih comprehensive dan mudah digunakan.\\n\\nUpgrade ke Laravel 11 sangat direkomendasikan untuk project baru, terutama dengan ecosystem yang semakin mature.', NULL, '[\"Laravel\", \"PHP\", \"Web Development\", \"Framework\"]', 1, 1, '2025-06-18 09:24:09', 243, 'Laravel 11 - Fitur Baru dan Performance Update', 'Panduan lengkap fitur-fitur baru Laravel 11 dan cara memanfaatkannya untuk web development yang lebih efisien.', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(3, 3, 1, 'React Native vs Flutter: Pilihan Terbaik untuk Cross-Platform Development', 'react-native-vs-flutter-pilihan-terbaik-cross-platform-development', 'Perbandingan mendalam antara React Native dan Flutter untuk membantu developer memilih framework yang tepat.', 'Dalam dunia mobile development, cross-platform frameworks telah menjadi pilihan utama untuk mengembangkan aplikasi yang dapat berjalan di iOS dan Android sekaligus. Dua framework terpopuler saat ini adalah React Native dan Flutter.\\n\\nReact Native:\\n- Dikembangkan oleh Facebook (Meta)\\n- Menggunakan JavaScript dan React\\n- Community yang besar dan mature\\n- Hot reload untuk development yang cepat\\n- Native performance yang baik\\n\\nFlutter:\\n- Dikembangkan oleh Google\\n- Menggunakan bahasa Dart\\n- Performance yang excellent dengan rendering engine sendiri\\n- Rich UI components out of the box\\n- Growing ecosystem dan community\\n\\nPemilihan antara keduanya tergantung pada beberapa faktor:\\n1. Expertise tim development\\n2. Requirements performance aplikasi\\n3. Timeline project\\n4. Budget dan resources\\n\\nKedua framework memiliki kelebihan masing-masing dan dapat menghasilkan aplikasi berkualitas tinggi.', NULL, '[\"React Native\", \"Flutter\", \"Mobile Development\", \"Cross-Platform\"]', 0, 1, '2025-06-16 09:24:09', 189, 'React Native vs Flutter - Framework Mana yang Terbaik?', 'Perbandingan lengkap React Native vs Flutter untuk cross-platform mobile development. Pilih framework yang tepat untuk project Anda.', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(4, 4, 1, 'Digital Transformation: Strategi Sukses untuk Perusahaan Tradisional', 'digital-transformation-strategi-sukses-perusahaan-tradisional', 'Panduan praktis untuk perusahaan tradisional yang ingin melakukan transformasi digital dengan strategi yang tepat.', 'Digital transformation bukan lagi pilihan, tetapi keharusan untuk perusahaan yang ingin tetap kompetitif di era digital. Namun, proses transformasi ini sering kali menantang, terutama untuk perusahaan tradisional.\\n\\nLangkah-langkah Strategis:\\n\\n1. Assessment Digital Maturity\\nEvaluasi kondisi current digital infrastructure dan capability organisasi.\\n\\n2. Define Clear Objectives\\nTentukan tujuan yang specific, measurable, dan aligned dengan business goals.\\n\\n3. Technology Selection\\nPilih teknologi yang sesuai dengan kebutuhan dan budget perusahaan.\\n\\n4. Change Management\\nPersiapkan organisasi untuk perubahan dengan training dan komunikasi yang efektif.\\n\\n5. Phased Implementation\\nImplementasi bertahap untuk minimize risk dan ensure smooth transition.\\n\\n6. Continuous Monitoring\\nMonitor progress secara berkala dan adjust strategy sesuai kebutuhan.\\n\\nKey Success Factors:\\n- Leadership commitment\\n- Employee engagement\\n- Customer-centric approach\\n- Data-driven decision making\\n\\nTransformasi digital yang sukses membutuhkan kombinasi technology, people, dan process yang optimal.', NULL, '[\"Digital Transformation\", \"Business Strategy\", \"Technology\", \"Change Management\"]', 1, 1, '2025-06-13 09:24:09', 312, 'Digital Transformation - Strategi Sukses untuk Perusahaan', 'Panduan lengkap digital transformation untuk perusahaan tradisional. Strategi, implementasi, dan best practices.', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(5, 5, 1, 'Principles of Modern UI/UX Design: Creating User-Centered Experiences', 'principles-modern-ui-ux-design-creating-user-centered-experiences', 'Eksplorasi prinsip-prinsip fundamental dalam modern UI/UX design untuk menciptakan pengalaman pengguna yang exceptional.', 'Modern UI/UX design bukan hanya tentang membuat interface yang beautiful, tetapi juga tentang creating experiences yang meaningful dan functional. Berikut adalah prinsip-prinsip fundamental yang harus dipahami setiap designer.\\n\\nUser-Centered Design Principles:\\n\\n1. Usability First\\nPrioritaskan kemudahan penggunaan over visual complexity. Interface yang indah tetapi sulit digunakan tidak akan berhasil.\\n\\n2. Consistency\\nMaintain consistent design patterns, colors, typography, dan interactions across all touchpoints.\\n\\n3. Accessibility\\nDesign untuk semua users, including those with disabilities. Follow WCAG guidelines untuk inclusive design.\\n\\n4. Visual Hierarchy\\nGuide user attention dengan proper use of size, color, spacing, dan typography.\\n\\n5. Responsive Design\\nEnsure optimal experience across all devices dan screen sizes.\\n\\n6. Performance\\nOptimize load times dan smooth interactions untuk better user experience.\\n\\nDesign Process:\\n1. Research & Discovery\\n2. Information Architecture\\n3. Wireframing & Prototyping\\n4. Visual Design\\n5. Testing & Iteration\\n\\nTools yang essential:\\n- Figma atau Sketch untuk UI design\\n- Adobe Creative Suite untuk graphics\\n- Principle atau Framer untuk prototyping\\n- Hotjar atau Google Analytics untuk user research\\n\\nRemember: Good design is invisible. Jika users dapat accomplish their goals effortlessly, berarti design Anda successful.', NULL, '[\"UI Design\", \"UX Design\", \"User Experience\", \"Design Principles\"]', 0, 1, '2025-06-11 09:24:09', 167, 'Modern UI/UX Design Principles - User-Centered Approach', 'Pelajari prinsip-prinsip fundamental modern UI/UX design untuk menciptakan user experience yang exceptional dan user-centered.', '2025-06-23 09:24:09', '2025-06-23 09:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE `article_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_categories`
--

INSERT INTO `article_categories` (`id`, `name`, `slug`, `description`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Technology Trends', 'technology-trends', 'Artikel tentang tren teknologi terbaru dan masa depan', 1, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(2, 'Web Development', 'web-development', 'Tips dan tutorial pengembangan web', 1, 2, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(3, 'Mobile Development', 'mobile-development', 'Panduan dan best practices mobile development', 1, 3, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(4, 'Digital Business', 'digital-business', 'Strategi dan tips untuk bisnis digital', 1, 4, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(5, 'UI/UX Design', 'ui-ux-design', 'Artikel tentang desain user interface dan user experience', 1, 5, '2025-06-23 09:24:09', '2025-06-23 09:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_listing_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `cover_letter` text NOT NULL,
  `resume_path` varchar(255) DEFAULT NULL,
  `portfolio_url` varchar(255) DEFAULT NULL,
  `status` enum('pending','reviewed','interview','accepted','rejected') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `job_listing_id`, `name`, `email`, `phone`, `cover_letter`, `resume_path`, `portfolio_url`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ahmad Rizki Pratama', 'ahmad.rizki@example.com', '+62 812 3456 7890', 'Saya sangat tertarik untuk bergabung sebagai Senior Frontend Developer di perusahaan Anda. Dengan pengalaman 6 tahun di bidang frontend development, saya telah mengembangkan berbagai aplikasi web menggunakan React dan Vue.js. Saya yakin kemampuan saya dalam menciptakan antarmuka pengguna yang menarik dan responsif akan memberikan nilai tambah bagi tim Anda.', NULL, 'https://ahmadrizki.dev', 'pending', NULL, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(2, 2, 'Siti Nurhaliza', 'siti.nurhaliza@example.com', '+62 856 7890 1234', 'Dengan latar belakang sebagai Backend Developer selama 4 tahun, saya memiliki pengalaman yang solid dalam mengembangkan API dan sistem backend menggunakan Laravel dan Node.js. Saya sangat antusias untuk berkontribusi dalam mengembangkan sistem yang scalable dan robust di perusahaan Anda.', NULL, 'https://github.com/sitinur', 'reviewed', 'Kandidat yang promising, experience yang sesuai dengan requirements.', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(3, 3, 'Budi Santoso', 'budi.santoso@example.com', '+62 821 4567 8901', 'Sebagai UI/UX Designer dengan pengalaman 3 tahun, saya telah merancang berbagai produk digital yang user-friendly dan engaging. Portfolio saya menunjukkan kemampuan dalam user research, wireframing, dan prototyping. Saya siap untuk memberikan kontribusi terbaik dalam menciptakan pengalaman pengguna yang luar biasa.', NULL, 'https://budisantoso.design', 'pending', NULL, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(4, 1, 'Maya Sari Dewi', 'maya.sari@example.com', '+62 878 9012 3456', 'Saya adalah seorang Frontend Developer dengan passion tinggi terhadap teknologi web modern. Dengan pengalaman 5 tahun menggunakan React dan TypeScript, saya telah mengembangkan berbagai aplikasi web yang kompleks. Saya juga memiliki pengalaman dalam mentoring junior developer dan implementasi best practices dalam development.', NULL, 'https://mayasari.dev', 'accepted', 'Excellent candidate, strong technical skills and good communication.', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(5, 2, 'Indra Firmansyah', 'indra.firmansyah@example.com', '+62 813 5678 9012', 'Dengan pengalaman 7 tahun sebagai Backend Developer, saya telah mengembangkan berbagai sistem enterprise menggunakan Laravel, Python Django, dan Node.js. Saya memiliki pengalaman yang kuat dalam database optimization, microservices architecture, dan cloud deployment menggunakan AWS.', NULL, 'https://github.com/indrafirman', 'rejected', 'Good technical skills but salary expectation too high.', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(6, 3, 'asd', 'admin@gmail.com', '082119011484', 'qwqdwqdwdwad', 'resumes/ZUH3uQ4HIiheYOcGO5K9PITPM2imMIchc2niXdYr.pdf', NULL, 'pending', NULL, '2025-06-23 10:12:48', '2025-06-23 10:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_listings`
--

CREATE TABLE `job_listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` longtext NOT NULL,
  `location` varchar(255) NOT NULL,
  `type` enum('full-time','part-time','contract','internship') NOT NULL,
  `level` enum('entry','junior','mid','senior','lead') NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `salary_min` decimal(12,2) DEFAULT NULL,
  `salary_max` decimal(12,2) DEFAULT NULL,
  `salary_range` varchar(255) DEFAULT NULL,
  `requirements` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`requirements`)),
  `responsibilities` text DEFAULT NULL,
  `benefits` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`benefits`)),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deadline` date DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_listings`
--

INSERT INTO `job_listings` (`id`, `title`, `slug`, `short_description`, `description`, `location`, `type`, `level`, `department`, `salary_min`, `salary_max`, `salary_range`, `requirements`, `responsibilities`, `benefits`, `is_active`, `deadline`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Senior Frontend Developer', 'senior-frontend-developer', 'Bergabunglah sebagai Senior Frontend Developer dan kembangkan antarmuka pengguna yang menarik menggunakan teknologi terdepan.', 'Kami mencari Senior Frontend Developer yang berpengalaman untuk bergabung dengan tim kami. Anda akan bertanggung jawab mengembangkan antarmuka pengguna yang menarik dan responsif menggunakan teknologi terdepan seperti React, Vue.js, atau Angular.', 'Jakarta', 'full-time', 'senior', 'Engineering', NULL, NULL, 'Rp 15.000.000 - Rp 25.000.000', '[\"Minimal 5 tahun pengalaman frontend development\", \"Menguasai React/Vue.js/Angular\", \"Pengalaman dengan TypeScript\", \"Familiar dengan tools seperti Webpack/Vite\", \"Pemahaman yang baik tentang UI/UX design\"]', '[\"Mengembangkan dan memaintenance aplikasi web frontend\",\"Berkolaborasi dengan tim backend dan designer\",\"Memastikan kualitas code dan performance aplikasi\",\"Mengikuti best practices dalam development\",\"Mentoring junior developer\"]', '[\"Gaji kompetitif\", \"Asuransi kesehatan\", \"Flexible working hours\", \"Work from home options\", \"Annual bonus\", \"Professional development budget\"]', 1, '2025-07-23', NULL, NULL, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(2, 'Backend Developer', 'backend-developer', 'Kembangkan sistem backend yang robust dan scalable menggunakan teknologi modern seperti Laravel dan Node.js.', 'Bergabunglah dengan tim development kami sebagai Backend Developer. Anda akan mengembangkan dan memelihara sistem backend yang robust dan scalable menggunakan teknologi modern seperti Laravel, Node.js, atau Python.', 'Bandung', 'full-time', 'mid', 'Engineering', NULL, NULL, 'Rp 12.000.000 - Rp 20.000.000', '[\"Minimal 3 tahun pengalaman backend development\", \"Menguasai PHP Laravel atau Node.js\", \"Pengalaman dengan database MySQL/PostgreSQL\", \"Familiar dengan RESTful API development\", \"Pemahaman tentang cloud services (AWS/GCP)\"]', '[\"Mengembangkan RESTful API dan microservices\",\"Database design dan optimization\",\"Implementasi security best practices\",\"Code review dan testing\",\"Dokumentasi teknis\"]', '[\"Gaji kompetitif\", \"Asuransi kesehatan\", \"Remote working\", \"Training dan sertifikasi\", \"Annual leave 12 hari\", \"Performance bonus\"]', 1, '2025-07-23', NULL, NULL, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(3, 'UI/UX Designer', 'ui-ux-designer', 'Rancang pengalaman pengguna yang luar biasa dan ciptakan desain yang user-friendly serta engaging.', 'Kami mencari UI/UX Designer yang kreatif dan detail untuk merancang pengalaman pengguna yang luar biasa. Anda akan bekerja sama dengan tim product dan development untuk menciptakan desain yang user-friendly dan engaging.', 'Jakarta', 'full-time', 'junior', 'Design', NULL, NULL, 'Rp 10.000.000 - Rp 18.000.000', '[\"Minimal 2 tahun pengalaman UI/UX design\", \"Menguasai Figma, Sketch, atau Adobe XD\", \"Portfolio yang menunjukkan design process\", \"Pemahaman tentang user research dan usability testing\", \"Familiar dengan design system\"]', '[\"Membuat wireframe dan prototype\",\"Melakukan user research dan testing\",\"Merancang user interface yang intuitive\",\"Berkolaborasi dengan product manager dan developer\",\"Memaintenance design system\"]', '[\"Gaji kompetitif\", \"Creative environment\", \"Latest design tools\", \"Flexible hours\", \"Health insurance\", \"Learning budget\"]', 1, '2025-08-23', NULL, NULL, '2025-06-23 09:24:09', '2025-06-23 09:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `read_at` timestamp NULL DEFAULT NULL,
  `reply` text DEFAULT NULL,
  `replied_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_16_142623_create_settings_table', 1),
(5, '2025_06_16_142631_create_services_table', 1),
(6, '2025_06_16_142640_create_project_categories_table', 1),
(7, '2025_06_16_142702_create_projects_table', 1),
(8, '2025_06_16_142732_create_teams_table', 1),
(9, '2025_06_16_142746_create_testimonials_table', 1),
(10, '2025_06_16_142752_create_article_categories_table', 1),
(11, '2025_06_16_142757_create_articles_table', 1),
(12, '2025_06_16_142803_create_jobs_table', 1),
(13, '2025_06_16_142812_create_job_applications_table', 1),
(14, '2025_06_16_142838_create_messages_table', 1),
(15, '2025_06_16_153505_add_columns_to_job_listings_table', 1),
(16, '2025_06_17_143000_create_page_seos_table', 1),
(17, '2025_06_17_143001_create_page_heroes_table', 1),
(18, '2025_06_17_143743_add_hero_settings_to_settings_table', 1),
(19, '2025_06_21_191738_add_price_range_to_services_table', 1),
(20, '2025_06_22_163024_make_resume_path_nullable_in_job_applications_table', 1),
(21, '2025_06_22_163110_make_resume_path_nullable_in_job_applications_table', 1),
(22, '2025_06_22_170436_add_features_and_price_range_to_services_table', 1),
(23, '2025_06_23_145903_create_why_choose_us_table', 1),
(24, '2025_06_23_155457_add_avatar_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_heroes`
--

CREATE TABLE `page_heroes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_identifier` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` text DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `background_overlay_color` varchar(255) NOT NULL DEFAULT '#000000',
  `background_overlay_opacity` int(11) NOT NULL DEFAULT 50,
  `text_color` enum('white','dark') NOT NULL DEFAULT 'white',
  `text_alignment` enum('left','center','right') NOT NULL DEFAULT 'center',
  `cta_primary_text` varchar(255) DEFAULT NULL,
  `cta_primary_url` varchar(255) DEFAULT NULL,
  `cta_secondary_text` varchar(255) DEFAULT NULL,
  `cta_secondary_url` varchar(255) DEFAULT NULL,
  `height` enum('small','medium','large','fullscreen') NOT NULL DEFAULT 'large',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_heroes`
--

INSERT INTO `page_heroes` (`id`, `page_identifier`, `title`, `subtitle`, `background_image`, `background_overlay_color`, `background_overlay_opacity`, `text_color`, `text_alignment`, `cta_primary_text`, `cta_primary_url`, `cta_secondary_text`, `cta_secondary_url`, `height`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Solusi Digital Terdepan untuk Bisnis Modern', 'Kami menghadirkan inovasi teknologi terbaru untuk membantu transformasi digital perusahaan Anda dengan solusi yang efektif dan efisien', 'heroes/7oYB3NH8UUCissuXK7BVelTdHWHUDZh9Ki2JSCno.jpg', '#000000', 50, 'white', 'center', 'Konsultasi Gratis', 'https://comprof-laravel01.hancode.my.id/kontak', 'Lihat Portfolio', 'https://comprof-laravel01.hancode.my.id/portofolio', 'fullscreen', 1, '2025-06-23 09:24:09', '2025-06-23 09:48:56'),
(2, 'about', 'Tentang Kami', 'Mengenal lebih dalam tentang perusahaan kami, visi misi, dan komitmen untuk memberikan yang terbaik', 'heroes/z7NBe3oEtANEc6ioT4VJyglJmGBFhJW1U7QRXYgu.jpg', '#000000', 80, 'white', 'center', 'Hubungi Kami', 'https://comprof-laravel01.hancode.my.id/kontak', NULL, NULL, 'large', 1, '2025-06-23 09:24:09', '2025-06-23 09:51:18'),
(3, 'services', 'Layanan Kami', 'Solusi teknologi komprehensif untuk mengembangkan bisnis Anda dengan standar kualitas internasional', 'heroes/QJkygqUaj8Wy6WqRwqlcvYsTQZNgkQFfZP6jEz80.jpg', '#000000', 80, 'white', 'center', 'Konsultasi Gratis', 'https://comprof-laravel01.hancode.my.id/kontak', 'Lihat Portfolio', 'https://comprof-laravel01.hancode.my.id/portofolio', 'large', 1, '2025-06-23 09:24:09', '2025-06-23 09:52:55'),
(4, 'projects', 'Portfolio Kami', 'Showcase project-project terbaik yang telah kami selesaikan untuk berbagai klien di berbagai industri', 'heroes/e2x1T8JyrUuAkqdZNgZBzfrcNBxmI9uWAv7DNaLO.jpg', '#000000', 80, 'white', 'center', 'Mulai Project', 'https://comprof-laravel01.hancode.my.id/kontak', 'Lihat Layanan', 'https://comprof-laravel01.hancode.my.id/layanan', 'large', 1, '2025-06-23 09:24:09', '2025-06-23 09:52:24'),
(5, 'articles', 'Artikel & Blog', 'Dapatkan insight terbaru, tips praktis, dan informasi berharga dari para ahli di bidang teknologi dan bisnis', 'heroes/znp9wa66WYoR3q1KVfDrgBEaaxlr3zsvOP3pbNX2.jpg', '#000000', 80, 'white', 'center', NULL, NULL, NULL, NULL, 'large', 1, '2025-06-23 09:24:09', '2025-06-23 09:53:28'),
(6, 'careers', 'Bergabunglah dengan Tim Terbaik', 'Kembangkan karier dan wujudkan potensi terbaik Anda bersama tim yang profesional dan berpengalaman', 'heroes/zG9J9k8mOyhRXnE5WsEUDNiF5T3txvzeRwK486WC.jpg', '#000000', 80, 'white', 'center', 'Lihat Lowongan', 'https://comprof-laravel01.hancode.my.id/karier', 'Tentang Kami', 'https://comprof-laravel01.hancode.my.id/tentang-kami', 'large', 1, '2025-06-23 09:24:09', '2025-06-23 09:51:10'),
(7, 'contact', 'Hubungi Kami', 'Mari diskusikan bagaimana kami dapat membantu mengembangkan bisnis Anda dengan solusi teknologi terdepan', 'heroes/wn27PfQqOnU5HsSbZO63WgsSYfC5hBKdXqLMQ53S.jpg', '#000000', 80, 'white', 'center', 'Konsultasi Gratis', 'https://comprof-laravel01.hancode.my.id/karier', 'Lihat Layanan', 'https://comprof-laravel01.hancode.my.id/layanan', 'large', 1, '2025-06-23 09:24:09', '2025-06-23 09:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `page_seos`
--

CREATE TABLE `page_seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_identifier` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_image` varchar(255) DEFAULT NULL,
  `twitter_title` varchar(255) DEFAULT NULL,
  `twitter_description` text DEFAULT NULL,
  `twitter_image` varchar(255) DEFAULT NULL,
  `schema_markup` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_seos`
--

INSERT INTO `page_seos` (`id`, `page_identifier`, `title`, `description`, `keywords`, `og_title`, `og_description`, `og_image`, `twitter_title`, `twitter_description`, `twitter_image`, `schema_markup`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Solusi Digital Terdepan - Company Profile CMS', 'Kami menyediakan solusi digital terdepan dengan teknologi modern untuk mengembangkan bisnis Anda. Konsultasi gratis dan layanan professional.', 'solusi digital, development, konsultasi IT, teknologi, bisnis digital', 'Solusi Digital Terdepan untuk Bisnis Modern', 'Partner terpercaya untuk transformasi digital bisnis Anda dengan teknologi terdepan dan layanan profesional.', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(2, 'about', 'Tentang Kami - Company Profile CMS', 'Pelajari lebih lanjut tentang perusahaan kami, visi misi, dan tim profesional yang berpengalaman dalam memberikan solusi terbaik.', 'tentang kami, company profile, visi misi, tim profesional', 'Tentang Kami - Perusahaan Teknologi Terpercaya', 'Mengenal lebih dalam tentang perusahaan, nilai-nilai, dan komitmen kami dalam memberikan layanan terbaik.', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(3, 'services', 'Layanan Kami - Company Profile CMS', 'Jelajahi berbagai layanan profesional kami: web development, mobile app, sistem informasi, dan konsultasi IT untuk bisnis Anda.', 'layanan IT, web development, mobile app, sistem informasi, konsultasi teknologi', 'Layanan Teknologi Profesional', 'Solusi teknologi lengkap untuk kebutuhan bisnis modern dengan kualitas terjamin dan harga kompetitif.', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(4, 'projects', 'Portfolio Kami - Company Profile CMS', 'Lihat portfolio dan project terbaik yang telah kami kerjakan untuk berbagai klien dalam berbagai industri dan skala bisnis.', 'portfolio, project, case study, hasil kerja, klien', 'Portfolio Project Terbaik', 'Showcase project-project sukses yang telah kami selesaikan dengan hasil yang memuaskan klien.', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(5, 'articles', 'Artikel & Blog - Company Profile CMS', 'Baca artikel dan blog terbaru seputar teknologi, tips bisnis, tutorial, dan insight menarik dari para ahli di bidangnya.', 'artikel teknologi, blog bisnis, tips, tutorial, insight', 'Artikel & Insight Teknologi Terbaru', 'Dapatkan informasi terkini dan tips berharga seputar teknologi dan perkembangan bisnis digital.', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(6, 'careers', 'Karier - Company Profile CMS', 'Bergabunglah dengan tim kami! Temukan peluang karier terbaik dan kembangkan potensi Anda di lingkungan kerja yang dinamis.', 'karier, lowongan kerja, join team, peluang kerja, recruitment', 'Karier & Peluang Kerja', 'Wujudkan karier impian Anda bersama tim yang profesional dan berkomitmen pada excellence.', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(7, 'contact', 'Hubungi Kami - Company Profile CMS', 'Hubungi kami untuk konsultasi gratis tentang kebutuhan teknologi dan digital solution untuk bisnis Anda. Tim expert siap membantu.', 'kontak, hubungi kami, konsultasi IT, bantuan teknologi, customer service', 'Hubungi Kami - Konsultasi Gratis', 'Dapatkan konsultasi gratis dan solusi terbaik untuk kebutuhan teknologi bisnis Anda.', NULL, NULL, NULL, NULL, NULL, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` longtext NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `project_url` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `technologies` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`technologies`)),
  `gallery` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gallery`)),
  `featured_image` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_category_id`, `title`, `slug`, `short_description`, `description`, `client_name`, `project_url`, `start_date`, `end_date`, `technologies`, `gallery`, `featured_image`, `is_featured`, `is_active`, `sort_order`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Portal Pembelajaran Online EduTech', 'portal-pembelajaran-online-edutech', 'Platform e-learning lengkap dengan fitur video conference, quiz, dan sertifikasi digital', 'EduTech merupakan platform pembelajaran online yang komprehensif yang dikembangkan untuk institusi pendidikan modern. Platform ini dilengkapi dengan berbagai fitur canggih seperti live streaming untuk kelas virtual, sistem quiz interaktif, tracking progress siswa, dan sistem sertifikasi digital.\\n\\nFitur Utama:\\n- Dashboard siswa dan pengajar yang intuitif\\n- Video conference terintegrasi dengan Zoom API\\n- Library konten pembelajaran multimedia\\n- Sistem penilaian otomatis\\n- Progress tracking dan analytics\\n- Mobile-responsive design\\n- Payment gateway untuk kursus berbayar\\n- Notification system real-time', 'EduTech Indonesia', 'https://edutech-demo.com', '2024-01-15', '2024-04-30', '\"[\\\"Laravel\\\",\\\"Vue.js\\\",\\\"MySQL\\\",\\\"Redis\\\",\\\"WebRTC\\\",\\\"AWS\\\"]\"', NULL, 'projects/utHppN9CJ2myC1B8KwvgclyMpmP9GMNdJQIXJVyU.jpg', 1, 1, 1, 'Portal Pembelajaran Online EduTech - Case Study', 'Case study pengembangan platform e-learning EduTech dengan fitur video conference, quiz interaktif, dan sertifikasi digital.', '2025-06-23 09:24:09', '2025-06-23 10:08:48'),
(2, 2, 'Aplikasi Food Delivery TasteGo', 'aplikasi-food-delivery-tastego', 'Aplikasi food delivery multi-platform dengan real-time tracking dan payment integration', 'TasteGo adalah aplikasi food delivery yang inovatif dengan antarmuka yang user-friendly dan fitur-fitur canggih. Aplikasi ini dikembangkan untuk menghubungkan customer, restaurant, dan driver dalam satu ecosystem yang terintegrasi.\\n\\nFitur Aplikasi:\\n- Multi-platform (iOS & Android)\\n- Real-time GPS tracking\\n- Multiple payment methods\\n- Restaurant management dashboard\\n- Driver tracking system\\n- Push notification\\n- Rating dan review system\\n- Promo dan loyalty program\\n- In-app chat support', 'TasteGo Startup', 'https://tastego-app.com', '2024-02-01', '2024-06-15', '\"[\\\"React Native\\\",\\\"Node.js\\\",\\\"MongoDB\\\",\\\"Socket.io\\\",\\\"Firebase\\\",\\\"Google Maps API\\\"]\"', NULL, 'projects/NmN9EOVthwL8SwfPPamUxCKkYX0ZI5KGqaE78hQv.png', 1, 1, 2, 'Aplikasi Food Delivery TasteGo - Case Study', 'Case study pengembangan aplikasi food delivery TasteGo dengan real-time tracking, payment integration, dan multi-platform support.', '2025-06-23 09:24:09', '2025-06-23 10:08:56'),
(3, 3, 'Sistem ERP Manufaktur IndustriMax', 'sistem-erp-manufaktur-industrimax', 'Sistem ERP terintegrasi untuk industri manufaktur dengan modul produksi, inventori, dan keuangan', 'IndustriMax adalah sistem ERP yang dikembangkan khusus untuk industri manufaktur dengan kompleksitas tinggi. Sistem ini mengintegrasikan seluruh aspek operasional perusahaan mulai dari procurement, production planning, quality control, hingga financial reporting.\\n\\nModul Sistem:\\n- Production Planning & Scheduling\\n- Inventory Management\\n- Quality Control System\\n- Financial Management\\n- Human Resource Management\\n- Procurement & Vendor Management\\n- Sales & Customer Management\\n- Reporting & Analytics Dashboard\\n- Mobile App untuk supervisor\\n- Integration dengan mesin produksi (IoT)', 'PT Industri Nusantara', NULL, '2023-08-01', '2024-03-30', '\"[\\\"Laravel\\\",\\\"React\\\",\\\"PostgreSQL\\\",\\\"Redis\\\",\\\"Docker\\\",\\\"IoT Integration\\\"]\"', NULL, 'projects/vuapsslzX8KPvUvguACqRIUiW3PDHGWpnffRb1s7.jpg', 1, 1, 3, 'Sistem ERP Manufaktur IndustriMax - Case Study', 'Case study pengembangan sistem ERP terintegrasi untuk industri manufaktur dengan modul produksi, inventori, dan keuangan.', '2025-06-23 09:24:09', '2025-06-23 10:09:06'),
(4, 4, 'Marketplace Fashion StyleHub', 'marketplace-fashion-stylehub', 'Platform marketplace fashion dengan AR virtual try-on dan social commerce features', 'StyleHub adalah marketplace fashion yang revolusioner dengan teknologi Augmented Reality untuk virtual try-on experience. Platform ini menggabungkan e-commerce tradisional dengan social commerce dan fitur-fitur inovatif untuk meningkatkan engagement customer.\\n\\nFitur Inovatif:\\n- AR Virtual Try-On technology\\n- Social commerce integration\\n- Influencer partnership program\\n- AI-powered product recommendation\\n- Size recommendation system\\n- Live streaming shopping\\n- Multi-vendor marketplace\\n- Advanced search dan filter\\n- Wishlist dan comparison tool\\n- Mobile app dengan camera integration', 'StyleHub Commerce', 'https://stylehub-marketplace.com', '2024-03-01', '2024-08-31', '\"[\\\"Next.js\\\",\\\"Express.js\\\",\\\"MongoDB\\\",\\\"TensorFlow.js\\\",\\\"WebRTC\\\",\\\"AR.js\\\"]\"', NULL, NULL, 0, 1, 4, 'Marketplace Fashion StyleHub - Case Study', 'Case study pengembangan marketplace fashion StyleHub dengan AR virtual try-on dan social commerce features.', '2025-06-23 09:24:09', '2025-06-23 10:04:32'),
(5, 1, 'Sistem Manajemen Rumah Sakit HealthCare Pro', 'sistem-manajemen-rumah-sakit-healthcare-pro', 'Sistem informasi rumah sakit terintegrasi dengan rekam medis elektronik dan telemedicine', 'HealthCare Pro adalah sistem informasi rumah sakit yang komprehensif yang mengintegrasikan seluruh aspek operasional rumah sakit modern. Sistem ini mendukung digitalisasi rekam medis, appointment online, dan fitur telemedicine.\\n\\nFitur Sistem:\\n- Electronic Medical Records (EMR)\\n- Appointment scheduling system\\n- Telemedicine platform\\n- Pharmacy management\\n- Laboratory information system\\n- Billing dan insurance claims\\n- Staff scheduling\\n- Patient portal\\n- Mobile app untuk dokter\\n- Integration dengan medical devices', 'RS Sehat Nusantara', NULL, '2023-10-01', '2024-05-30', '[\"Laravel\", \"Vue.js\", \"MySQL\", \"WebRTC\", \"HL7 FHIR\", \"AWS\"]', NULL, NULL, 0, 1, 5, 'Sistem Manajemen Rumah Sakit HealthCare Pro', 'Case study pengembangan sistem informasi rumah sakit dengan EMR, telemedicine, dan appointment scheduling.', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(6, 2, 'Aplikasi Keuangan Personal FinanceTracker', 'aplikasi-keuangan-personal-financetracker', 'Aplikasi pengelolaan keuangan personal dengan AI budgeting dan investment tracking', 'FinanceTracker adalah aplikasi mobile untuk pengelolaan keuangan personal yang dilengkapi dengan artificial intelligence untuk analisis spending pattern dan rekomendasi budgeting. Aplikasi ini membantu users mencapai financial goals mereka.\\n\\nFitur Aplikasi:\\n- Automatic expense categorization\\n- AI-powered budgeting recommendations\\n- Investment portfolio tracking\\n- Bill reminder dan autopay\\n- Financial goal setting\\n- Spending analytics dan insights\\n- Multi-currency support\\n- Bank account synchronization\\n- Security dengan biometric authentication\\n- Educational content tentang financial literacy', 'FinTech Solutions', NULL, '2024-01-01', '2024-04-30', '[\"Flutter\", \"Firebase\", \"Machine Learning\", \"Plaid API\", \"Biometric Auth\"]', NULL, NULL, 0, 1, 6, 'Aplikasi Keuangan Personal FinanceTracker', 'Case study pengembangan aplikasi keuangan personal dengan AI budgeting dan investment tracking.', '2025-06-23 09:24:09', '2025-06-23 09:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE `project_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `name`, `slug`, `description`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Aplikasi Web', 'aplikasi-web', 'Proyek pengembangan aplikasi web dan sistem online', 1, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(2, 'Aplikasi Mobile', 'aplikasi-mobile', 'Proyek pengembangan aplikasi mobile iOS dan Android', 1, 2, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(3, 'Sistem Enterprise', 'sistem-enterprise', 'Proyek sistem ERP dan manajemen enterprise', 1, 3, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(4, 'E-Commerce', 'e-commerce', 'Proyek platform e-commerce dan marketplace', 1, 4, '2025-06-23 09:24:09', '2025-06-23 09:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` longtext NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price_range` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `short_description`, `description`, `icon`, `image`, `price_range`, `is_featured`, `is_active`, `sort_order`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Pengembangan Aplikasi Web', 'pengembangan-aplikasi-web', 'Membangun aplikasi web modern dan responsif dengan teknologi terdepan', 'Kami menyediakan layanan pengembangan aplikasi web yang komprehensif menggunakan teknologi terbaru seperti Laravel, React, Vue.js, dan Node.js. Tim developer berpengalaman kami akan membantu Anda membangun aplikasi web yang tidak hanya menarik secara visual tetapi juga optimal dalam performa dan keamanan.\\n\\nLayanan kami meliputi:\\n- Analisis kebutuhan dan perencanaan project\\n- UI/UX Design yang user-friendly\\n- Development dengan best practices\\n- Testing dan quality assurance\\n- Deployment dan maintenance\\n- Training dan dokumentasi lengkap', 'fas fa-code', 'services/uakbovKkv233S6ptaFA9DkIozCcFzSV8O6bDNyX1.jpg', NULL, 1, 1, 1, 'Jasa Pengembangan Aplikasi Web Profesional', 'Layanan pengembangan aplikasi web modern dan responsif dengan teknologi terdepan. Konsultasi gratis dengan tim developer berpengalaman.', '2025-06-23 09:24:09', '2025-06-23 10:01:44'),
(2, 'Aplikasi Mobile (iOS & Android)', 'aplikasi-mobile-ios-android', 'Pengembangan aplikasi mobile native dan cross-platform untuk iOS dan Android', 'Kembangkan aplikasi mobile yang powerful dan user-friendly untuk platform iOS dan Android. Kami menggunakan teknologi terbaru seperti React Native, Flutter, Swift, dan Kotlin untuk memberikan pengalaman pengguna yang optimal.\\n\\nKeunggulan layanan kami:\\n- Native dan Cross-platform development\\n- UI/UX design yang intuitive\\n- Integrasi dengan API dan database\\n- Push notification dan real-time features\\n- App Store dan Google Play Store submission\\n- Maintenance dan update berkelanjutan', 'fas fa-mobile-alt', 'services/7feCZlUT30V3dudXKAZWA96grRsmxZ6hpN8cYaPC.jpg', NULL, 1, 1, 2, 'Jasa Pembuatan Aplikasi Mobile iOS & Android', 'Pengembangan aplikasi mobile profesional untuk iOS dan Android dengan teknologi terdepan. Konsultasi gratis sekarang!', '2025-06-23 09:24:09', '2025-06-23 10:01:54'),
(3, 'Sistem Manajemen Enterprise (ERP)', 'sistem-manajemen-enterprise-erp', 'Solusi ERP terintegrasi untuk mengoptimalkan operasional bisnis Anda', 'Tingkatkan efisiensi operasional perusahaan dengan sistem ERP yang dikustomisasi sesuai kebutuhan bisnis Anda. Sistem kami mencakup manajemen inventori, keuangan, SDM, produksi, dan customer relationship management.\\n\\nFitur unggulan:\\n- Dashboard analytics real-time\\n- Multi-user dan role management\\n- Automated reporting dan alert\\n- Integrasi dengan sistem existing\\n- Mobile-friendly interface\\n- Data security dan backup otomatis\\n- Training dan support 24/7', 'fas fa-chart-line', 'services/o5qS30GFqFbR81IeORd1AIF64ZZsfW5K3ZoeRkEQ.jpg', NULL, 1, 1, 3, 'Sistem ERP Enterprise Terintegrasi', 'Solusi sistem ERP terintegrasi untuk mengoptimalkan operasional bisnis. Dashboard real-time, automated reporting, dan security terjamin.', '2025-06-23 09:24:09', '2025-06-23 10:02:06'),
(4, 'E-Commerce & Marketplace', 'e-commerce-marketplace', 'Platform e-commerce lengkap dengan fitur marketplace modern', 'Bangun toko online atau marketplace yang powerful dengan fitur lengkap untuk mendukung bisnis digital Anda. Platform kami dilengkapi dengan sistem pembayaran terintegrasi, manajemen inventori, dan analytics yang komprehensif.\\n\\nFitur Platform:\\n- Multi-vendor marketplace\\n- Payment gateway integration\\n- Inventory management system\\n- Order tracking dan notification\\n- Customer review dan rating\\n- SEO-friendly structure\\n- Mobile responsive design\\n- Admin dashboard lengkap', 'fas fa-shopping-cart', 'services/1CD0ZDxeTcG6J0guSgvhngDfYR2fyXKtmtbq9Rmx.jpg', NULL, 0, 1, 4, 'Platform E-Commerce & Marketplace Profesional', 'Solusi e-commerce dan marketplace lengkap dengan payment gateway, inventory management, dan SEO-friendly. Konsultasi gratis!', '2025-06-23 09:24:09', '2025-06-23 10:02:55'),
(5, 'Cloud Computing & DevOps', 'cloud-computing-devops', 'Migrasi cloud dan implementasi DevOps untuk infrastruktur yang scalable', 'Modernisasi infrastruktur IT Anda dengan solusi cloud computing dan implementasi DevOps best practices. Kami membantu migrasi dari on-premise ke cloud dan mengoptimalkan deployment pipeline untuk efisiensi maksimal.\\n\\nLayanan Cloud & DevOps:\\n- Cloud migration strategy\\n- AWS, Google Cloud, Azure implementation\\n- CI/CD pipeline setup\\n- Container orchestration (Docker, Kubernetes)\\n- Infrastructure as Code (Terraform)\\n- Monitoring dan alerting system\\n- Security dan compliance\\n- 24/7 support dan maintenance', 'fas fa-cloud', 'services/28mHacIZTREMYqPNhDSTtBzEduMKSzO7ycNS3Ydy.jpg', NULL, 0, 1, 5, 'Layanan Cloud Computing & DevOps', 'Solusi cloud computing dan DevOps untuk infrastruktur scalable. AWS, Google Cloud, CI/CD pipeline, dan container orchestration.', '2025-06-23 09:24:09', '2025-06-23 10:02:25'),
(6, 'Digital Marketing & SEO', 'digital-marketing-seo', 'Strategi digital marketing dan optimasi SEO untuk meningkatkan online presence', 'Tingkatkan visibility dan reach bisnis online Anda dengan strategi digital marketing yang tepat sasaran. Tim digital marketing kami akan membantu mengoptimalkan website, konten, dan campaign untuk hasil maksimal.\\n\\nLayanan Digital Marketing:\\n- SEO On-page dan Off-page\\n- Google Ads dan Facebook Ads management\\n- Content marketing strategy\\n- Social media management\\n- Email marketing automation\\n- Analytics dan reporting\\n- Conversion rate optimization\\n- Brand awareness campaigns', 'fas fa-bullhorn', 'services/fGAhfgxDHKsUnhinwwC5u62R8zy6inGs2Ic0pSE4.jpg', NULL, 0, 1, 6, 'Jasa Digital Marketing & SEO Profesional', 'Layanan digital marketing dan SEO untuk meningkatkan online presence. Google Ads, Facebook Ads, content marketing, dan analytics.', '2025-06-23 09:24:09', '2025-06-23 10:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2ltdjPSkTiwadckjZLQKZomIYnxCiHIGLBrdtlKD', NULL, '54.194.242.128', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.13; rv:71.0) Gecko/20100101 Firefox/71.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnFpRlEyRVdZVXBOTUZhbUhIQUxYMUtVYmlBM3dncmY2YUc1Y2g4eiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9jb21wcm9mLWxhcmF2ZWwwMS5oYW5jb2RlLm15LmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1750810020),
('a0EVMYirnjCO9iSKGT3S8QcCDx9vFwA5qhu4DCu4', NULL, '54.194.242.128', 'Mozilla/5.0 (ZZ; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid0JvRzJTbXU2VkNGUU1xYXVTcWdjQlpFVkwyTjBYUkVpVGNmSGxIUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vd3d3LmNvbXByb2YtbGFyYXZlbDAxLmhhbmNvZGUubXkuaWQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1750810078),
('ffRAFrN1WLIDNeGmXphCVEnEtJT182Sj4iocV4qw', NULL, '54.194.242.128', 'Mozilla/5.0 (Fedora; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibXFmalVMSE9RbVFwUGFCWEIyQ0NoMnZtcnZFZ2xJbWUwT3VvRGV2dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vY29tcHJvZi1sYXJhdmVsMDEuaGFuY29kZS5teS5pZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1750810020),
('QKh6htMKF0c0KDxu4SKkdlYw87slqgMDIsUgSn1X', NULL, '54.194.242.128', 'Mozilla/5.0 (ZZ; Linux i686; rv:125.0) Gecko/20100101 Firefox/125.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieGUwUTFpVkhFdE9GVTl2RFhiMDVJaVJPNTlrSVMzWVZtbEJ6Rk5nNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly93d3cuY29tcHJvZi1sYXJhdmVsMDEuaGFuY29kZS5teS5pZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1750810078);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `type`, `group`, `created_at`, `updated_at`) VALUES
(1, 'hero_default_overlay_color', '#000000', 'color', 'hero', '2025-06-23 09:24:08', '2025-06-23 09:24:08'),
(2, 'hero_default_overlay_opacity', '50', 'number', 'hero', '2025-06-23 09:24:08', '2025-06-23 09:24:08'),
(3, 'hero_default_text_color', 'white', 'select', 'hero', '2025-06-23 09:24:08', '2025-06-23 09:24:08'),
(4, 'hero_default_text_alignment', 'center', 'select', 'hero', '2025-06-23 09:24:08', '2025-06-23 09:24:08'),
(5, 'hero_default_height', 'large', 'select', 'hero', '2025-06-23 09:24:08', '2025-06-23 09:24:08'),
(6, 'hero_cta_primary_url', '/contact', 'url', 'hero', '2025-06-23 09:24:08', '2025-06-23 09:24:08'),
(7, 'hero_cta_secondary_url', '/projects', 'url', 'hero', '2025-06-23 09:24:08', '2025-06-23 09:24:08'),
(8, 'hero_enable_animations', '1', 'boolean', 'hero', '2025-06-23 09:24:08', '2025-06-23 09:24:08'),
(9, 'hero_enable_parallax', '0', 'boolean', 'hero', '2025-06-23 09:24:08', '2025-06-23 09:24:08'),
(10, 'site_name', 'PT Digital Solusi Nusantara', 'text', 'general', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(11, 'meta_description', 'Perusahaan teknologi terdepan yang menyediakan solusi digital inovatif untuk mengembangkan bisnis Anda', 'textarea', 'general', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(12, 'favicon', '/favicon.ico', 'image', 'general', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(13, 'logo', '', 'image', 'general', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(14, 'primary_color', '#2563eb', 'text', 'general', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(15, 'hero_title', 'Transformasi Digital untuk Masa Depan Bisnis Anda', 'text', 'hero', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(16, 'hero_subtitle', 'Kami menghadirkan solusi teknologi terdepan dan inovatif untuk membantu perusahaan Anda berkembang pesat di era digital yang terus berubah', 'textarea', 'hero', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(17, 'hero_cta_primary', 'Mulai Konsultasi', 'text', 'hero', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(18, 'hero_cta_secondary', 'Lihat Portfolio', 'text', 'hero', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(19, 'hero_background_image', '', 'image', 'hero', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(20, 'about_title', 'Tentang PT Digital Solusi Nusantara', 'text', 'about', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(21, 'about_description', 'Sejak didirikan pada tahun 2015, kami telah menjadi mitra terpercaya bagi lebih dari 500 perusahaan dalam transformasi digital mereka. Tim ahli kami terdiri dari profesional berpengalaman di bidang teknologi informasi, desain, dan strategi bisnis.\\n\\nKami mengkhususkan diri dalam pengembangan aplikasi web dan mobile, sistem manajemen enterprise, e-commerce, dan solusi cloud computing. Dengan pendekatan yang berfokus pada klien, kami memastikan setiap solusi yang kami berikan sesuai dengan kebutuhan spesifik dan tujuan bisnis Anda.', 'textarea', 'about', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(22, 'about_image', 'settings/qoircn3EDqWb7EbitdduhOtrO0NAYDMsyKrGBsNC.jpg', 'image', 'about', '2025-06-23 09:24:09', '2025-06-23 09:53:52'),
(23, 'vision', 'Menjadi perusahaan teknologi terdepan di Indonesia yang memberikan solusi digital inovatif dan berkelanjutan', 'textarea', 'about', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(24, 'mission', 'Membantu perusahaan dalam transformasi digital melalui teknologi terdepan, layanan berkualitas tinggi, dan partnership jangka panjang yang saling menguntungkan', 'textarea', 'about', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(25, 'contact_address', 'Jl. Sudirman No. 123, Jakarta Pusat 10220, Indonesia', 'textarea', 'contact', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(26, 'contact_phone', '+62 21 1234 5678', 'text', 'contact', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(27, 'contact_email', 'info@digitalsolusi.com', 'email', 'contact', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(28, 'contact_whatsapp', '+62 812 3456 7890', 'text', 'contact', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(29, 'google_maps_embed', '', 'textarea', 'contact', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(30, 'facebook_url', 'https://facebook.com/digitalsolusi', 'url', 'social', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(31, 'twitter_url', 'https://twitter.com/digitalsolusi', 'url', 'social', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(32, 'linkedin_url', 'https://linkedin.com/company/digitalsolusi', 'url', 'social', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(33, 'instagram_url', 'https://instagram.com/digitalsolusi', 'url', 'social', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(34, 'youtube_url', 'https://youtube.com/digitalsolusi', 'url', 'social', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(35, 'footer_description', 'PT Digital Solusi Nusantara adalah perusahaan teknologi yang berfokus pada pengembangan solusi digital inovatif untuk membantu bisnis berkembang di era digital.', 'textarea', 'footer', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(36, 'footer_copyright', 'PT Digital Solusi Nusantara', 'text', 'footer', '2025-06-23 09:24:09', '2025-06-23 09:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `social_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`social_links`)),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `position`, `bio`, `photo`, `email`, `phone`, `social_links`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Andi Wijaya', 'Chief Executive Officer', 'Dengan pengalaman lebih dari 15 tahun di industri teknologi, Andi memimpin visi strategis perusahaan dan mengembangkan inovasi digital untuk masa depan.', NULL, 'andi.wijaya@company.com', '+62 812 3456 7890', '{\"twitter\": \"https://twitter.com/andiwijaya\", \"linkedin\": \"https://linkedin.com/in/andiwijaya\"}', 1, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(2, 'Sari Indrawati', 'Chief Technology Officer', 'Expert dalam arsitektur software dan cloud computing. Sari bertanggung jawab atas implementasi teknologi terdepan dan memastikan kualitas setiap solusi yang kami develop.', NULL, 'sari.indrawati@company.com', '+62 813 2345 6789', '{\"github\": \"https://github.com/sariindrawati\", \"linkedin\": \"https://linkedin.com/in/sariindrawati\"}', 1, 2, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(3, 'Budi Santoso', 'Head of Development', 'Full-stack developer dengan keahlian khusus dalam Laravel, React, dan mobile development. Budi memimpin tim development dan memastikan delivery proyek tepat waktu.', NULL, 'budi.santoso@company.com', '+62 814 3456 7890', '{\"github\": \"https://github.com/budisantoso\", \"linkedin\": \"https://linkedin.com/in/budisantoso\"}', 1, 3, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(4, 'Maya Kusuma', 'Head of Design', 'UI/UX Designer dengan passion untuk menciptakan user experience yang exceptional. Maya memastikan setiap produk memiliki desain yang beautiful dan functional.', NULL, 'maya.kusuma@company.com', '+62 815 4567 8901', '{\"behance\": \"https://behance.net/mayakusuma\", \"dribbble\": \"https://dribbble.com/mayakusuma\", \"linkedin\": \"https://linkedin.com/in/mayakusuma\"}', 1, 4, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(5, 'Rahman Hakim', 'Head of Operations', 'Specialist dalam project management dan client relations. Rahman memastikan setiap proyek berjalan smooth dan client mendapatkan service excellence.', NULL, 'rahman.hakim@company.com', '+62 816 5678 9012', '{\"linkedin\": \"https://linkedin.com/in/rahmanhakim\"}', 1, 5, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(6, 'Lisa Pratiwi', 'Head of Marketing', 'Digital marketing expert dengan track record yang proven dalam growth hacking dan brand development. Lisa bertanggung jawab atas strategi marketing dan business development.', NULL, 'lisa.pratiwi@company.com', '+62 817 6789 0123', '{\"twitter\": \"https://twitter.com/lisapratiwi\", \"linkedin\": \"https://linkedin.com/in/lisapratiwi\", \"instagram\": \"https://instagram.com/lisapratiwi\"}', 1, 6, '2025-06-23 09:24:09', '2025-06-23 09:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_position` varchar(255) DEFAULT NULL,
  `client_company` varchar(255) DEFAULT NULL,
  `testimonial` text NOT NULL,
  `client_photo` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `client_name`, `client_position`, `client_company`, `testimonial`, `client_photo`, `rating`, `is_featured`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Budi Santoso', 'CEO', 'PT Maju Bersama', 'Tim Digital Solusi Nusantara berhasil mengembangkan sistem ERP yang sangat membantu operasional perusahaan kami. Mereka profesional, responsif, dan selalu memberikan solusi terbaik. Highly recommended!', 'testimonials/Wet95mQJBkY5rSsHcK8vlrULxiF3d3jYgoTQLlvo.png', 5, 1, 1, 1, '2025-06-23 09:24:09', '2025-06-23 10:11:24'),
(2, 'Sarah Wijaya', 'Marketing Director', 'StartupTech Indonesia', 'Website dan aplikasi mobile yang dikembangkan sangat membantu bisnis kami berkembang pesat. User experience yang luar biasa dan performa yang optimal. Terima kasih atas kerja sama yang luar biasa!', NULL, 5, 1, 1, 2, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(3, 'Ahmad Rahman', 'IT Manager', 'CV Digital Prima', 'Proses development yang transparan dan komunikasi yang sangat baik. Tim mereka benar-benar memahami kebutuhan bisnis kami dan memberikan solusi yang tepat sasaran.', NULL, 5, 1, 1, 3, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(4, 'Diana Kusuma', 'Operations Manager', 'Toko Online Nusantara', 'Platform e-commerce yang dikembangkan sangat user-friendly dan memiliki fitur yang lengkap. Penjualan online kami meningkat drastis setelah menggunakan platform ini.', NULL, 5, 0, 1, 4, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(5, 'Rizki Pratama', 'Founder', 'EduLearn Academy', 'Sistem pembelajaran online yang dikembangkan sangat inovatif dan mudah digunakan. Siswa-siswa kami sangat antusias menggunakan platform ini untuk belajar.', NULL, 5, 0, 1, 5, '2025-06-23 09:24:09', '2025-06-23 09:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `avatar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@company.com', '2025-06-23 09:24:08', NULL, '$2y$12$04da7phtigGAIZvM4O2UNeB04HJd0jdNXzL3Ear0J.oQVIKoh8r2O', 'JVYoKIxTEX', '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(2, 'Administrator', 'admin@example.com', '2025-06-23 09:24:09', NULL, '$2y$12$2x/fQkHdgGKr8ccBRqQIMeZp5YY9qZ85FjaZtMyexGyv0DRV0wm.q', NULL, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(3, 'Company Admin', 'admin@companyprofile.com', '2025-06-23 09:24:09', NULL, '$2y$12$F4l2T9YZHUkaHeZXrv/n6e.Rgp.mcNN627/kZAyMvc7yVMhevfZce', NULL, '2025-06-23 09:24:09', '2025-06-23 09:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_us`
--

CREATE TABLE `why_choose_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `color` varchar(20) NOT NULL DEFAULT 'blue',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_choose_us`
--

INSERT INTO `why_choose_us` (`id`, `title`, `description`, `icon`, `color`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Tim Berpengalaman', 'Didukung oleh tim profesional dengan pengalaman lebih dari 5 tahun di industri teknologi dan telah menangani berbagai proyek skala enterprise.', 'fas fa-users', 'blue', 1, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(2, 'Teknologi Terdepan', 'Menggunakan teknologi dan framework terbaru seperti Laravel, React, Vue.js untuk menghasilkan solusi yang optimal, scalable dan future-proof.', 'fas fa-rocket', 'purple', 2, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(3, 'Support 24/7', 'Dukungan teknis dan maintenance berkelanjutan untuk menjamin kelancaran sistem Anda dengan response time yang cepat dan reliable.', 'fas fa-headset', 'green', 3, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(4, 'Keamanan Terjamin', 'Implementasi standar keamanan tertinggi dengan enkripsi SSL, secure coding practices, dan regular security audit untuk melindungi data Anda.', 'fas fa-shield-alt', 'red', 4, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(5, 'Hasil Terukur', 'Setiap solusi dirancang untuk memberikan hasil yang dapat diukur dengan KPI yang jelas untuk meningkatkan ROI dan efisiensi bisnis Anda.', 'fas fa-chart-line', 'yellow', 5, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(6, 'Partnership Jangka Panjang', 'Kami tidak hanya vendor, tapi partner strategis yang berkomitmen untuk kesuksesan jangka panjang bisnis Anda dengan relationship yang berkelanjutan.', 'fas fa-handshake', 'indigo', 6, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(7, 'Harga Kompetitif', 'Solusi berkualitas tinggi dengan harga yang terjangkau dan transparan. Tidak ada biaya tersembunyi, semua sudah termasuk dalam paket yang kami tawarkan.', 'fas fa-dollar-sign', 'green', 7, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09'),
(8, 'Proses Transparan', 'Metodologi pengembangan yang transparan dengan regular update, milestone tracking, dan komunikasi yang jelas di setiap tahap project.', 'fas fa-eye', 'gray', 8, 1, '2025-06-23 09:24:09', '2025-06-23 09:24:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_article_category_id_foreign` (`article_category_id`),
  ADD KEY `articles_user_id_foreign` (`user_id`);

--
-- Indexes for table `article_categories`
--
ALTER TABLE `article_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_categories_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_listing_id_foreign` (`job_listing_id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_listings`
--
ALTER TABLE `job_listings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_listings_slug_unique` (`slug`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_heroes`
--
ALTER TABLE `page_heroes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_heroes_page_identifier_unique` (`page_identifier`);

--
-- Indexes for table `page_seos`
--
ALTER TABLE `page_seos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_seos_page_identifier_unique` (`page_identifier`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`),
  ADD KEY `projects_project_category_id_foreign` (`project_category_id`);

--
-- Indexes for table `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_categories_slug_unique` (`slug`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_listings`
--
ALTER TABLE `job_listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `page_heroes`
--
ALTER TABLE `page_heroes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `page_seos`
--
ALTER TABLE `page_seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `why_choose_us`
--
ALTER TABLE `why_choose_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_article_category_id_foreign` FOREIGN KEY (`article_category_id`) REFERENCES `article_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_job_listing_id_foreign` FOREIGN KEY (`job_listing_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_project_category_id_foreign` FOREIGN KEY (`project_category_id`) REFERENCES `project_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
