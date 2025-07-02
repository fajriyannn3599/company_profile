<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WhyChooseUs;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@company.com',
        ]);

        // Run all seeders
        $this->call([
            AdminUserSeeder::class,
            SettingSeeder::class,
            PageSeoSeeder::class,
            PageHeroSeeder::class,
            HeroSettingsUpdateSeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class,
            TestimonialSeeder::class,
            TeamSeeder::class,
            ArticleSeeder::class,
            JobListingSeeder::class,
            JobApplicationSeeder::class,
            WhyChooseUsSeeder::class,
            ContactPageSeeder::class,
        ]);
    }
}
