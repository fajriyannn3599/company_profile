<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobApplication;
use App\Models\JobListing;

class JobApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobListings = JobListing::all();
        
        if ($jobListings->isEmpty()) {
            return;
        }

        $applications = [
            [
                'job_listing_id' => $jobListings->first()->id,
                'name' => 'Ahmad Rizki Pratama',
                'email' => 'ahmad.rizki@example.com',
                'phone' => '+62 812 3456 7890',
                'cover_letter' => 'Saya sangat tertarik untuk bergabung sebagai Senior Frontend Developer di perusahaan Anda. Dengan pengalaman 6 tahun di bidang frontend development, saya telah mengembangkan berbagai aplikasi web menggunakan React dan Vue.js. Saya yakin kemampuan saya dalam menciptakan antarmuka pengguna yang menarik dan responsif akan memberikan nilai tambah bagi tim Anda.',
                'resume_path' => null,
                'portfolio_url' => 'https://ahmadrizki.dev',
                'status' => 'pending',
                'notes' => null,
            ],
            [
                'job_listing_id' => $jobListings->skip(1)->first()->id ?? $jobListings->first()->id,
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@example.com',
                'phone' => '+62 856 7890 1234',
                'cover_letter' => 'Dengan latar belakang sebagai Backend Developer selama 4 tahun, saya memiliki pengalaman yang solid dalam mengembangkan API dan sistem backend menggunakan Laravel dan Node.js. Saya sangat antusias untuk berkontribusi dalam mengembangkan sistem yang scalable dan robust di perusahaan Anda.',
                'resume_path' => null,
                'portfolio_url' => 'https://github.com/sitinur',
                'status' => 'reviewed',
                'notes' => 'Kandidat yang promising, experience yang sesuai dengan requirements.',
            ],
            [
                'job_listing_id' => $jobListings->last()->id,
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'phone' => '+62 821 4567 8901',
                'cover_letter' => 'Sebagai UI/UX Designer dengan pengalaman 3 tahun, saya telah merancang berbagai produk digital yang user-friendly dan engaging. Portfolio saya menunjukkan kemampuan dalam user research, wireframing, dan prototyping. Saya siap untuk memberikan kontribusi terbaik dalam menciptakan pengalaman pengguna yang luar biasa.',
                'resume_path' => null,
                'portfolio_url' => 'https://budisantoso.design',
                'status' => 'pending',
                'notes' => null,
            ],
            [
                'job_listing_id' => $jobListings->first()->id,
                'name' => 'Maya Sari Dewi',
                'email' => 'maya.sari@example.com',
                'phone' => '+62 878 9012 3456',
                'cover_letter' => 'Saya adalah seorang Frontend Developer dengan passion tinggi terhadap teknologi web modern. Dengan pengalaman 5 tahun menggunakan React dan TypeScript, saya telah mengembangkan berbagai aplikasi web yang kompleks. Saya juga memiliki pengalaman dalam mentoring junior developer dan implementasi best practices dalam development.',
                'resume_path' => null,
                'portfolio_url' => 'https://mayasari.dev',
                'status' => 'accepted',
                'notes' => 'Excellent candidate, strong technical skills and good communication.',
            ],
            [
                'job_listing_id' => $jobListings->skip(1)->first()->id ?? $jobListings->first()->id,
                'name' => 'Indra Firmansyah',
                'email' => 'indra.firmansyah@example.com',
                'phone' => '+62 813 5678 9012',
                'cover_letter' => 'Dengan pengalaman 7 tahun sebagai Backend Developer, saya telah mengembangkan berbagai sistem enterprise menggunakan Laravel, Python Django, dan Node.js. Saya memiliki pengalaman yang kuat dalam database optimization, microservices architecture, dan cloud deployment menggunakan AWS.',
                'resume_path' => null,
                'portfolio_url' => 'https://github.com/indrafirman',
                'status' => 'rejected',
                'notes' => 'Good technical skills but salary expectation too high.',
            ],
        ];

        foreach ($applications as $application) {
            JobApplication::create($application);
        }
    }
}
