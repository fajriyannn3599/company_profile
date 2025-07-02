<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        $teams = [
            [
                'name' => 'Andi Wijaya',
                'position' => 'Chief Executive Officer',
                'bio' => 'Dengan pengalaman lebih dari 15 tahun di industri teknologi, Andi memimpin visi strategis perusahaan dan mengembangkan inovasi digital untuk masa depan.',
                'email' => 'andi.wijaya@company.com',
                'phone' => '+62 812 3456 7890',
                'social_links' => [
                    'linkedin' => 'https://linkedin.com/in/andiwijaya',
                    'twitter' => 'https://twitter.com/andiwijaya'
                ],
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Sari Indrawati',
                'position' => 'Chief Technology Officer',
                'bio' => 'Expert dalam arsitektur software dan cloud computing. Sari bertanggung jawab atas implementasi teknologi terdepan dan memastikan kualitas setiap solusi yang kami develop.',
                'email' => 'sari.indrawati@company.com',
                'phone' => '+62 813 2345 6789',
                'social_links' => [
                    'linkedin' => 'https://linkedin.com/in/sariindrawati',
                    'github' => 'https://github.com/sariindrawati'
                ],
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'Budi Santoso',
                'position' => 'Head of Development',
                'bio' => 'Full-stack developer dengan keahlian khusus dalam Laravel, React, dan mobile development. Budi memimpin tim development dan memastikan delivery proyek tepat waktu.',
                'email' => 'budi.santoso@company.com',
                'phone' => '+62 814 3456 7890',
                'social_links' => [
                    'linkedin' => 'https://linkedin.com/in/budisantoso',
                    'github' => 'https://github.com/budisantoso'
                ],
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'name' => 'Maya Kusuma',
                'position' => 'Head of Design',
                'bio' => 'UI/UX Designer dengan passion untuk menciptakan user experience yang exceptional. Maya memastikan setiap produk memiliki desain yang beautiful dan functional.',
                'email' => 'maya.kusuma@company.com',
                'phone' => '+62 815 4567 8901',
                'social_links' => [
                    'linkedin' => 'https://linkedin.com/in/mayakusuma',
                    'dribbble' => 'https://dribbble.com/mayakusuma',
                    'behance' => 'https://behance.net/mayakusuma'
                ],
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'name' => 'Rahman Hakim',
                'position' => 'Head of Operations',
                'bio' => 'Specialist dalam project management dan client relations. Rahman memastikan setiap proyek berjalan smooth dan client mendapatkan service excellence.',
                'email' => 'rahman.hakim@company.com',
                'phone' => '+62 816 5678 9012',
                'social_links' => [
                    'linkedin' => 'https://linkedin.com/in/rahmanhakim'
                ],
                'is_active' => true,
                'sort_order' => 5
            ],
            [
                'name' => 'Lisa Pratiwi',
                'position' => 'Head of Marketing',
                'bio' => 'Digital marketing expert dengan track record yang proven dalam growth hacking dan brand development. Lisa bertanggung jawab atas strategi marketing dan business development.',
                'email' => 'lisa.pratiwi@company.com',
                'phone' => '+62 817 6789 0123',
                'social_links' => [
                    'linkedin' => 'https://linkedin.com/in/lisapratiwi',
                    'twitter' => 'https://twitter.com/lisapratiwi',
                    'instagram' => 'https://instagram.com/lisapratiwi'
                ],
                'is_active' => true,
                'sort_order' => 6
            ]
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}
