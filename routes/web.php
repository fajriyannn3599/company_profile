<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\ContactController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');
Route::get('/tim/{id}', [AboutController::class, 'teamDetail'])->name('team.detail');

// Services
Route::get('/layanan', [ServiceController::class, 'index'])->name('services.index');
Route::get('/layanan/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Financial Reports
Route::get('/laporan-keuangan', [App\Http\Controllers\Frontend\FinancialReportController::class, 'index'])->name('financial-reports.index');
Route::get('/laporan-keuangan/{id}', [App\Http\Controllers\Frontend\FinancialReportController::class, 'show'])->name('financial-reports.show');

// Governances
Route::get('/tata-kelola', [App\Http\Controllers\Frontend\GovernanceController::class, 'index'])->name('governances.index');
Route::get('/tata-kelola/{id}', [App\Http\Controllers\Frontend\GovernanceController::class, 'show'])->name('governances.show');

// Projects/Portfolio
Route::get('/portofolio', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/portofolio/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Articles
Route::get('/artikel', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// Careers
Route::get('/karier', [CareerController::class, 'index'])->name('careers.index');
Route::get('/karier/{slug}', [CareerController::class, 'show'])->name('careers.show');
Route::get('/karier/{slug}/apply', [CareerController::class, 'showApplyForm'])->name('careers.apply');
Route::post('/karier/{slug}/apply', [CareerController::class, 'apply'])->name('careers.apply.store');

// Contact
Route::get('/pengajuan', [ContactController::class, 'index'])->name('contact');
Route::post('/pengajuan', [ContactController::class, 'store'])->name('contact.store');

// Hubungi Kami
Route::get('/hubungi-kami', [CareerController   ::class, 'index'])->name('hubungi-kami');
Route::post('/hubungi-kami', [ContactController::class, 'store'])->name('contact.store');

// Admin Authentication Routes (Public)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login']);
    Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
});

// Admin Routes (Protected with auth middleware)
Route::prefix('admin')->name('admin.')->middleware('admin.auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Settings
    Route::resource('settings', App\Http\Controllers\Admin\SettingController::class);
    
    // Page SEO Management
    Route::resource('page-seo', App\Http\Controllers\Admin\PageSeoController::class);
    
    // Page Hero Management
    Route::resource('page-hero', App\Http\Controllers\Admin\PageHeroController::class);
    Route::get('page-hero-global/settings', [App\Http\Controllers\Admin\PageHeroController::class, 'globalSettings'])->name('page-hero.global-settings');
    Route::post('page-hero-global/settings', [App\Http\Controllers\Admin\PageHeroController::class, 'updateGlobalSettings'])->name('page-hero.update-global-settings');
    
    // Services
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class);
    
    // Projects
    Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class);
    
    // Articles
    Route::resource('articles', App\Http\Controllers\Admin\ArticleController::class);
    
    // Article Categories
    Route::resource('article-categories', App\Http\Controllers\Admin\ArticleCategoryController::class);

    // Service Categories
    Route::resource('service-categories', App\Http\Controllers\Admin\ServiceCategoryController::class);

    // Financial Reports
    Route::resource('financial-reports', App\Http\Controllers\Admin\FinancialReportController::class);

    // Governance
    Route::resource('governances', App\Http\Controllers\Admin\GovernanceController::class);

    // Teams
    Route::resource('teams', App\Http\Controllers\Admin\TeamController::class);
    
    // Why Choose Us
    Route::resource('why-choose-us', App\Http\Controllers\Admin\WhyChooseUsController::class);
    
    // Testimonials
    Route::resource('testimonials', App\Http\Controllers\Admin\TestimonialController::class);
    
    // Job Listings
    Route::resource('jobs', App\Http\Controllers\Admin\JobListingController::class);
    
    // Job Applications
    Route::get('job-applications', [App\Http\Controllers\Admin\JobApplicationController::class, 'index'])->name('job-applications.index');
    Route::get('job-applications/{jobApplication}', [App\Http\Controllers\Admin\JobApplicationController::class, 'show'])->name('job-applications.show');
    Route::delete('job-applications/{jobApplication}', [App\Http\Controllers\Admin\JobApplicationController::class, 'destroy'])->name('job-applications.destroy');
    
    // Messages
    Route::get('messages', [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [App\Http\Controllers\Admin\MessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{message}', [App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('messages.destroy');
    Route::patch('messages/{message}/mark-read', [App\Http\Controllers\Admin\MessageController::class, 'markAsRead'])->name('messages.mark-read');
    
    // Profile
    Route::get('profile', [App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/password', [App\Http\Controllers\Admin\ProfileController::class, 'editPassword'])->name('profile.edit-password');
    Route::put('profile/password', [App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::delete('profile/avatar', [App\Http\Controllers\Admin\ProfileController::class, 'removeAvatar'])->name('profile.remove-avatar');
});
