<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'Senior Frontend Developer',
                'slug' => 'senior-frontend-developer',
                'short_description' => 'Bergabunglah sebagai Senior Frontend Developer dan kembangkan antarmuka pengguna yang menarik menggunakan teknologi terdepan.',
                'description' => 'Kami mencari Senior Frontend Developer yang berpengalaman untuk bergabung dengan tim kami. Anda akan bertanggung jawab mengembangkan antarmuka pengguna yang menarik dan responsif menggunakan teknologi terdepan seperti React, Vue.js, atau Angular.',
                'requirements' => [
                    'Minimal 5 tahun pengalaman frontend development',
                    'Menguasai React/Vue.js/Angular',
                    'Pengalaman dengan TypeScript',
                    'Familiar dengan tools seperti Webpack/Vite',
                    'Pemahaman yang baik tentang UI/UX design'
                ],
                'responsibilities' => [
                    'Mengembangkan dan memaintenance aplikasi web frontend',
                    'Berkolaborasi dengan tim backend dan designer',
                    'Memastikan kualitas code dan performance aplikasi',
                    'Mengikuti best practices dalam development',
                    'Mentoring junior developer'
                ],
                'benefits' => [
                    'Gaji kompetitif',
                    'Asuransi kesehatan',
                    'Flexible working hours',
                    'Work from home options',
                    'Annual bonus',
                    'Professional development budget'
                ],
                'type' => 'full-time',
                'level' => 'senior',
                'department' => 'Engineering',
                'location' => 'Jakarta',
                'salary_range' => 'Rp 15.000.000 - Rp 25.000.000',
                'deadline' => now()->addMonths(1),
                'is_active' => true,
            ],
            [
                'title' => 'Backend Developer',
                'slug' => 'backend-developer',
                'short_description' => 'Kembangkan sistem backend yang robust dan scalable menggunakan teknologi modern seperti Laravel dan Node.js.',
                'description' => 'Bergabunglah dengan tim development kami sebagai Backend Developer. Anda akan mengembangkan dan memelihara sistem backend yang robust dan scalable menggunakan teknologi modern seperti Laravel, Node.js, atau Python.',
                'requirements' => [
                    'Minimal 3 tahun pengalaman backend development',
                    'Menguasai PHP Laravel atau Node.js',
                    'Pengalaman dengan database MySQL/PostgreSQL',
                    'Familiar dengan RESTful API development',
                    'Pemahaman tentang cloud services (AWS/GCP)'
                ],
                'responsibilities' => [
                    'Mengembangkan RESTful API dan microservices',
                    'Database design dan optimization',
                    'Implementasi security best practices',
                    'Code review dan testing',
                    'Dokumentasi teknis'
                ],
                'benefits' => [
                    'Gaji kompetitif',
                    'Asuransi kesehatan',
                    'Remote working',
                    'Training dan sertifikasi',
                    'Annual leave 12 hari',
                    'Performance bonus'
                ],
                'type' => 'full-time',
                'level' => 'mid',
                'department' => 'Engineering',
                'location' => 'Bandung',
                'salary_range' => 'Rp 12.000.000 - Rp 20.000.000',
                'deadline' => now()->addMonths(1),
                'is_active' => true,
            ],
            [
                'title' => 'UI/UX Designer',
                'slug' => 'ui-ux-designer',
                'short_description' => 'Rancang pengalaman pengguna yang luar biasa dan ciptakan desain yang user-friendly serta engaging.',
                'description' => 'Kami mencari UI/UX Designer yang kreatif dan detail untuk merancang pengalaman pengguna yang luar biasa. Anda akan bekerja sama dengan tim product dan development untuk menciptakan desain yang user-friendly dan engaging.',
                'requirements' => [
                    'Minimal 2 tahun pengalaman UI/UX design',
                    'Menguasai Figma, Sketch, atau Adobe XD',
                    'Portfolio yang menunjukkan design process',
                    'Pemahaman tentang user research dan usability testing',
                    'Familiar dengan design system'
                ],
                'responsibilities' => [
                    'Membuat wireframe dan prototype',
                    'Melakukan user research dan testing',
                    'Merancang user interface yang intuitive',
                    'Berkolaborasi dengan product manager dan developer',
                    'Memaintenance design system'
                ],
                'benefits' => [
                    'Gaji kompetitif',
                    'Creative environment',
                    'Latest design tools',
                    'Flexible hours',
                    'Health insurance',
                    'Learning budget'
                ],
                'type' => 'full-time',
                'level' => 'junior',
                'department' => 'Design',
                'location' => 'Jakarta',
                'salary_range' => 'Rp 10.000.000 - Rp 18.000.000',
                'deadline' => now()->addMonths(2),
                'is_active' => true,
            ],
        ];

        foreach ($jobs as $job) {
            \App\Models\JobListing::create($job);
        }
    }
}
