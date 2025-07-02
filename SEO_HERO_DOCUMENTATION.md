# Sistem Management SEO dan Hero Background

## Overview

Sistem ini menyediakan management SEO dan hero background untuk setiap halaman website company profile dengan fitur:

1. **SEO Management per Halaman**
   - Meta title, description, keywords
   - Open Graph tags untuk social media sharing
   - Twitter Card tags
   - Custom schema markup (JSON-LD)
   - Status active/inactive

2. **Hero Background Management per Halaman**
   - Custom title dan subtitle
   - Background image upload
   - Overlay color dan opacity settings
   - Text color dan alignment options
   - Call-to-action buttons (primary & secondary)
   - Height options (small, medium, large, fullscreen)
   - Status active/inactive

## File Structure

### Models
- `app/Models/PageSeo.php` - Model untuk SEO management
- `app/Models/PageHero.php` - Model untuk hero background management

### Controllers
- `app/Http/Controllers/Admin/PageSeoController.php` - Admin controller untuk SEO
- `app/Http/Controllers/Admin/PageHeroController.php` - Admin controller untuk hero

### Views
- `resources/views/components/seo-head.blade.php` - Component untuk SEO meta tags
- `resources/views/components/hero.blade.php` - Component untuk hero section
- `resources/views/admin/page-seo/` - Admin views untuk SEO management
- `resources/views/admin/page-hero/` - Admin views untuk hero management

### Migrations
- `database/migrations/2025_06_17_143000_create_page_seos_table.php`
- `database/migrations/2025_06_17_143001_create_page_heroes_table.php`
- `database/migrations/2025_06_17_143743_add_hero_settings_to_settings_table.php` - Menambahkan global hero settings

### Seeders
- `database/seeders/PageSeoSeeder.php` - Data default SEO
- `database/seeders/PageHeroSeeder.php` - Data default hero
- `database/seeders/ContactPageSeeder.php` - Data SEO dan hero untuk contact
- `database/seeders/HeroSettingsUpdateSeeder.php` - Update content hero settings dengan yang lebih baik

## Helper Functions

Tambahan di `app/helpers.php`:

```php
// Get page SEO data
page_seo($pageIdentifier)

// Get page hero data
page_hero($pageIdentifier) 

// Get page title with fallback
page_title($pageIdentifier, $default)

// Get page description with fallback
page_description($pageIdentifier, $default)
```

## Cara Penggunaan

### 1. Menggunakan SEO Component

Di dalam setiap view halaman, tambahkan di bagian head:

```blade
@push('seo')
    <x-seo-head 
        page-identifier="home" 
        :title="page_title('home', 'Default Title')"
        :description="page_description('home', 'Default description')" />
@endpush
```

### 2. Menggunakan Hero Component

Di dalam setiap view halaman, ganti hero section dengan:

```blade
<x-hero 
    page-identifier="home"
    fallback-title="Default Title"
    fallback-subtitle="Default subtitle jika tidak ada setting" />
```

### 3. Page Identifiers yang Tersedia

- `home` - Homepage
- `about` - Tentang Kami
- `services` - Layanan (index)
- `projects` - Portfolio (index)
- `articles` - Artikel (index)
- `careers` - Karier (index)
- `contact` - Kontak

## Admin Management

### Akses Admin Panel

1. Login ke admin panel di `/admin`
2. Navigate ke "SEO Management" untuk mengatur SEO per halaman
3. Navigate ke "Hero Management" untuk mengatur hero per halaman
4. Navigate ke "Global Hero Settings" untuk mengatur pengaturan hero global

### SEO Management Features

- **Basic SEO**: Title, description, keywords
- **Open Graph**: Title, description, image untuk Facebook/social media
- **Twitter Cards**: Title, description, image untuk Twitter
- **Schema Markup**: Custom JSON-LD structured data
- **Status**: Active/inactive per halaman

### Hero Management Features

- **Content**: Title, subtitle, CTA buttons
- **Background**: Image upload dengan overlay settings
- **Design**: Text color, alignment, height options
- **Call-to-Actions**: Primary dan secondary buttons dengan custom URLs
- **Status**: Active/inactive per halaman

### Global Hero Settings (Updated)

Sistem hero sekarang memiliki pengaturan global yang dapat dikelola melalui admin panel:

#### Default Settings
- `hero_default_overlay_color` - Warna overlay default (#000000)
- `hero_default_overlay_opacity` - Opacity overlay default (50%)
- `hero_default_text_color` - Warna teks default (white/dark)
- `hero_default_text_alignment` - Alignment teks default (left/center/right)
- `hero_default_height` - Tinggi hero default (small/medium/large/fullscreen)
- `hero_enable_animations` - Enable/disable animasi hero
- `hero_enable_parallax` - Enable/disable efek parallax

#### Enhanced Features
- **Fallback System**: Jika tidak ada hero khusus untuk halaman, sistem akan menggunakan global settings
- **Global Settings Management**: Admin dapat mengatur default settings melalui `/admin/page-hero-global/settings`
- **Better Inheritance**: Page-specific hero akan override global settings
- **Improved Component**: Hero component sekarang always return hero object (tidak ada fallback manual lagi)

## Database Structure

### page_seos table
```sql
- id (bigint, primary key)
- page_identifier (string, unique)
- title (string, nullable)
- description (text, nullable)
- keywords (string, nullable)
- og_title (string, nullable)
- og_description (text, nullable)
- og_image (string, nullable)
- twitter_title (string, nullable)
- twitter_description (text, nullable)
- twitter_image (string, nullable)
- schema_markup (text, nullable)
- is_active (boolean, default true)
- timestamps
```

### page_heroes table
```sql
- id (bigint, primary key)
- page_identifier (string, unique)
- title (string, required)
- subtitle (text, nullable)
- background_image (string, nullable)
- background_overlay_color (string, default #000000)
- background_overlay_opacity (integer, default 50, 0-100)
- text_color (enum: white/dark, default white)
- text_alignment (enum: left/center/right, default center)
- cta_primary_text (string, nullable)
- cta_primary_url (string, nullable)
- cta_secondary_text (string, nullable)
- cta_secondary_url (string, nullable)
- height (enum: small/medium/large/fullscreen, default large)
- is_active (boolean, default true)
- timestamps
```

## Storage

- Hero background images: `storage/app/public/heroes/`
- SEO images: `storage/app/public/seo/og-images/` dan `storage/app/public/seo/twitter-images/`

Pastikan storage sudah di-link:
```bash
php artisan storage:link
```

## Installation Commands

```bash
# Run migrations
php artisan migrate

# Run seeders for default data
php artisan db:seed --class=PageSeoSeeder
php artisan db:seed --class=PageHeroSeeder
php artisan db:seed --class=ContactPageSeeder
php artisan db:seed --class=HeroSettingsUpdateSeeder

# Link storage
php artisan storage:link
```

## Routes

Admin routes sudah ditambahkan di `routes/web.php`:

```php
Route::prefix('admin')->name('admin.')->group(function () {
    // Page SEO Management
    Route::resource('page-seo', App\Http\Controllers\Admin\PageSeoController::class);
    
    // Page Hero Management
    Route::resource('page-hero', App\Http\Controllers\Admin\PageHeroController::class);
});
```

## Benefits

1. **SEO Optimization**: Setiap halaman memiliki SEO yang dapat dioptimalkan secara individual
2. **Social Media Ready**: Open Graph dan Twitter Cards untuk sharing yang optimal
3. **Flexible Hero Design**: Hero background yang dapat dikustomisasi per halaman
4. **Professional Appearance**: Tampilan full screen laptop yang profesional
5. **Admin Friendly**: Interface admin yang mudah digunakan untuk management
6. **Responsive Design**: Hero dan SEO yang responsive di semua device
7. **Performance**: Optimasi gambar dan loading yang baik

## Best Practices

1. **SEO Title**: 50-60 karakter optimal
2. **Meta Description**: 150-160 karakter optimal
3. **Hero Images**: Minimum 1920x1080px untuk full screen
4. **OG Images**: 1200x630px untuk optimal social sharing
5. **Twitter Images**: 1200x675px untuk optimal Twitter cards
6. **Hero Height**: Gunakan 'large' atau 'fullscreen' untuk tampilan maksimal
7. **CTA Buttons**: Gunakan action words yang jelas dan compelling
