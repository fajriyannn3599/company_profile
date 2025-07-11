@extends('layouts.frontend')

@push('seo')
    <x-seo-head page-identifier="home" :title="page_title('home', setting('site_name', 'Company Profile'))"
        :description="page_description('home', setting('meta_description', 'Professional company profile website'))" />
@endpush

@section('content')
    <!-- Hero Section -->
    <x-hero page-identifier="home" :fallback-title="setting('hero_title', 'Solusi Terbaik untuk Bisnis Anda')"
        :fallback-subtitle="setting(
                    'hero_subtitle',
                    'Kami menyediakan layanan profesional dan inovatif untuk mengembangkan bisnis Anda ke level yang lebih tinggi.',
                )" /> <!-- Stats Counter Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center group">
                    <div
                        class="text-4xl md:text-5xl font-bold text-blue-600 mb-2 group-hover:scale-110 transition-transform duration-300">
                        {{ $featuredServices->count() > 0 ? $featuredServices->count() * 2 : 6 }}+
                    </div>
                    <div class="text-gray-600 font-medium">Layanan Profesional</div>
                </div>
                <div class="text-center group">
                    <div
                        class="text-4xl md:text-5xl font-bold text-green-600 mb-2 group-hover:scale-110 transition-transform duration-300">
                        {{ $featuredProjects->count() > 0 ? $featuredProjects->count() * 8 : 50 }}+
                    </div>
                    <div class="text-gray-600 font-medium">Proyek Selesai</div>
                </div>
                <div class="text-center group">
                    <div
                        class="text-4xl md:text-5xl font-bold text-purple-600 mb-2 group-hover:scale-110 transition-transform duration-300">
                        {{ $testimonials->count() > 0 ? $testimonials->count() * 10 : 30 }}+
                    </div>
                    <div class="text-gray-600 font-medium">Klien Puas</div>
                </div>
                <div class="text-center group">
                    <div
                        class="text-4xl md:text-5xl font-bold text-orange-600 mb-2 group-hover:scale-110 transition-transform duration-300">
                        8+
                    </div>
                    <div class="text-gray-600 font-medium">Tahun Pengalaman</div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <div
                        class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold mb-6">
                        <i class="fas fa-star mr-2"></i>
                        Tentang Kami
                    </div>
                    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                        {{ setting('about_title', 'Mitra Terpercaya untuk Kesuksesan Bisnis Anda') }}
                    </h2>
                    <div class="text-gray-600 text-lg leading-relaxed mb-8 space-y-4">
                        {!! nl2br(
        e(
            setting(
                'about_description',
                'Kami adalah perusahaan teknologi yang berdedikasi untuk memberikan solusi digital terbaik. Dengan pengalaman bertahun-tahun dan tim profesional yang berpengalaman, kami siap membantu mengembangkan bisnis Anda ke level yang lebih tinggi dengan teknologi terdepan dan strategi yang tepat sasaran.',
            ),
        ),
    ) !!}
                    </div>

                    <!-- Feature highlights -->
                    <!-- <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                            <i class="fas fa-check text-blue-600 text-lg"></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900">Tim Profesional</div>
                                            <div class="text-gray-600 text-sm">Expert berpengalaman</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                            <i class="fas fa-clock text-green-600 text-lg"></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900">Tepat Waktu</div>
                                            <div class="text-gray-600 text-sm">Delivery sesuai jadwal</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                            <i class="fas fa-shield-alt text-purple-600 text-lg"></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900">Berkualitas</div>
                                            <div class="text-gray-600 text-sm">Standard tinggi</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                                            <i class="fas fa-headset text-orange-600 text-lg"></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900">Support 24/7</div>
                                            <div class="text-gray-600 text-sm">Dukungan penuh</div>
                                        </div>
                                    </div>
                                </div> -->

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('about') }}"
                            class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition-all duration-300 hover:shadow-lg hover:scale-105">
                            Pelajari Lebih Lanjut
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center justify-center border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-8 py-4 rounded-lg font-semibold transition-all duration-300">
                            Konsultasi Gratis
                            <i class="fas fa-phone ml-2"></i>
                        </a>
                    </div>
                </div>
                <div class="order-1 lg:order-2 relative">
                    <div class="relative">
                        @if (setting('about_image'))
                            <img src="{{ asset('storage/' . setting('about_image')) }}" alt="About Us"
                                class="rounded-2xl shadow-2xl transform hover:scale-105 transition-transform duration-500">
                        @else
                            <div
                                class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl h-96 lg:h-[500px] flex items-center justify-center text-white shadow-2xl">
                                <div class="text-center">
                                    <i class="fas fa-building text-8xl mb-4 opacity-80"></i>
                                    <div class="text-2xl font-bold">{{ setting('site_name', 'Company') }}</div>
                                </div>
                            </div>
                        @endif

                        <!-- Floating elements -->
                        <div class="absolute -top-6 -left-6 w-24 h-24 bg-blue-200 rounded-full opacity-30 animate-pulse">
                        </div>
                        <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-blue-300 rounded-full opacity-20 animate-pulse"
                            style="animation-delay: 1s"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    @if ($featuredServices->count() > 0)
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold mb-6">
                        <i class="fas fa-cogs mr-2"></i>
                        Layanan Kami
                    </div>
                    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-6">Layanan Unggulan</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Kami menyediakan berbagai layanan teknologi profesional yang dirancang khusus untuk memenuhi
                        kebutuhan dan mengakselerasi pertumbuhan bisnis Anda
                    </p>
                </div> <!-- Services Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($featuredServices as $index => $service)
                            <div
                                class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-blue-200 hover:-translate-y-2">

                                @if($service->image)
                                        <!-- Service Image (Full Width) -->
                                        <div class="relative h-48 overflow-hidden">
                                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                        </div>
                                        <!-- Overlay with Icon -->
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                            <div class="absolute bottom-4 left-4">
                                                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                                    <div class="text-white text-xl">
                                                        @if ($service->icon)
                                                            <i class="{{ $service->icon }}"></i>
                                                        @else
                                                            <i class="fas fa-cog"></i>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Price Range Badge (if available) -->
                                        @if($service->price_range)
                                            <div class="absolute top-4 right-4">
                                                <span
                                                    class="inline-flex items-center px-3 py-1 bg-blue-600/90 backdrop-blur-sm text-white text-sm font-semibold rounded-full">
                                                    {{ $service->price_range }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                <!-- Service Icon & Gradient Background (fallback) -->
                                <div class="relative h-24 bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                    <div class="text-white text-3xl">
                                        @if ($service->icon)
                                            <i class="{{ $service->icon }}"></i>
                                        @else
                                            <i class="fas fa-cog"></i>
                                        @endif
                                    </div>

                                    <!-- Decorative Elements -->
                                    <div
                                        class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full transform translate-x-8 -translate-y-8">
                                    </div>
                                    <div
                                        class="absolute bottom-0 left-0 w-20 h-20 bg-white opacity-10 rounded-full transform -translate-x-4 translate-y-4">
                                    </div>

                                    <!-- Price Range Badge -->
                                    @if($service->price_range)
                                        <div class="absolute top-4 right-4">
                                            <span
                                                class="inline-flex items-center px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-sm font-semibold rounded-full">
                                                {{ $service->price_range }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <!-- Service Content -->
                            <div class="p-8">
                                <h3 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors">
                                    {{ $service->title }}
                                </h3>
                                <p class="text-gray-600 leading-relaxed mb-6">
                                    {{ $service->short_description }}
                                </p>

                                <!-- Service Features -->
                                @if ($service->description)
                                    <div class="space-y-2 mb-6">
                                        @php
                                            $features = explode("\n", strip_tags($service->description));
                                            $features = array_filter(array_map('trim', $features));
                                            $features = array_slice($features, 0, 3);
                                        @endphp
                                        @foreach ($features as $feature)
                                            @if (!empty($feature) && strlen($feature) > 10)
                                                <div class="flex items-center text-sm text-gray-600">
                                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                                    {{ Str::limit($feature, 40) }}
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif

                                <!-- CTA Button -->
                                <a href="{{ route('services.show', $service->slug) }}"
                                    class="inline-flex items-center justify-center w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 transform group-hover:scale-105">
                                    Pelajari Lebih Lanjut
                                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>

                            <!-- Hover Effect Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-blue-600 to-purple-600 opacity-0 group-hover:opacity-5 transition-opacity duration-500">
                            </div>
                        </div>
                    @endforeach
            </div>

            <!-- View All Button -->
            <div class="text-center mt-16">
                <a href="{{ route('services.index') }}"
                    class="inline-flex items-center bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 hover:shadow-lg hover:scale-105">
                    <i class="fas fa-th-large mr-3"></i>
                    Lihat Semua Layanan
                    <i class="fas fa-arrow-right ml-3"></i>
                </a>
            </div>
            </div>
        </section>
    @endif

    <!-- Projects Section -->
    <!--@if ($featuredProjects->count() > 0)
                <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> -->
    <!-- Section Header -->
    <!-- <div class="text-center mb-16">
                            <div
                                class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-semibold mb-6">
                                <i class="fas fa-folder-open mr-2"></i>
                                Portfolio Kami
                            </div>
                            <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-6">Proyek Terbaik</h2>
                            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                                Lihat showcase project-project unggulan yang telah kami selesaikan dengan tingkat kepuasan klien
                                yang tinggi dan hasil yang memukau
                            </p>
                        </div> -->

    <!-- Projects Grid -->
    <!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($featuredProjects as $index => $project)
                                <div
                                    class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden hover:-translate-y-2">
                        -->
    <!-- Project Image -->
    <!-- <div class="relative h-56 overflow-hidden">
                                        @if ($project->featured_image)
                                            <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                        @else
                                            <div
                                                class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                                <i class="fas fa-image text-6xl text-gray-400"></i>
                                            </div>
                                        @endif -->

    <!-- Overlay -->
    <!-- <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                        </div> -->

    <!-- Category Badge -->
    <!-- <div class="absolute top-4 left-4">
                                            <span
                                                class="inline-flex items-center px-3 py-1 bg-white/90 backdrop-blur-sm text-blue-600 text-sm font-semibold rounded-full">
                                                @if ($project->category)
                                                    {{ $project->category->name }}
                                                @else
                                                    Project
                                                @endif
                                            </span>
                                        </div> -->

    <!-- View Project Button (appears on hover) -->
    <!-- <div
                                            class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500">
                                            <a href="{{ route('projects.show', $project->slug) }}"
                                                class="bg-white text-gray-900 px-6 py-2 rounded-lg font-semibold transform scale-95 group-hover:scale-100 transition-transform duration-300 hover:bg-blue-50">
                                                <i class="fas fa-eye mr-2"></i>
                                                Lihat Detail
                                            </a>
                                        </div>
                                    </div> -->

    <!-- Project Content -->
    <!-- <div class="p-6">
                                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                                            {{ $project->title }}
                                        </h3>
                                        <p class="text-gray-600 leading-relaxed mb-4">
                                            {{ Str::limit($project->short_description, 100) }}
                                        </p> -->

    <!-- Project Details -->
    <!-- <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-4 text-sm text-gray-500">
                                                @if ($project->project_url)
                                                    <div class="flex items-center">
                                                        <i class="fas fa-globe mr-1"></i>
                                                        <span>Live Site</span>
                                                    </div>
                                                @endif
                                                <div class="flex items-center">
                                                    <i class="fas fa-calendar mr-1"></i>
                                                    <span>{{ $project->created_at->format('Y') }}</span>
                                                </div>
                                            </div> 

                                            <a href="{{ route('projects.show', $project->slug) }}"
                                                class="text-blue-600 hover:text-blue-700 font-semibold transition-colors">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div> -->

    <!-- Decorative gradient border -->
    <!-- <div class="absolute inset-0 rounded-2xl border-2 border-transparent bg-gradient-to-br from-blue-500 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                                        style="mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0); mask-composite: exclude;">
                                    </div>
                                </div>
                            @endforeach
                        </div> -->

    <!-- View All Button -->
    <!-- <div class="text-center mt-16">
                            <a href="{{ route('projects.index') }}"
                                class="inline-flex items-center bg-gradient-to-r from-green-600 to-blue-600 hover:from-green-700 hover:to-blue-700 text-white px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 hover:shadow-lg hover:scale-105">
                                <i class="fas fa-folder-open mr-3"></i>
                                Lihat Semua Proyek
                                <i class="fas fa-arrow-right ml-3"></i>
                            </a>
                        </div>
                    </div>
                </section>
            @endif -->

    <!-- Testimonials Section -->
    @if ($testimonials->count() > 0)
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center px-4 py-2 bg-yellow-100 text-yellow-800 rounded-full text-sm font-semibold mb-6">
                        <i class="fas fa-quote-right mr-2"></i>
                        Testimoni Klien
                    </div>
                    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-6">Kata Mereka</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Kepuasan dan kepercayaan klien adalah prioritas utama kami. Berikut adalah testimoni dari
                        klien-klien yang telah merasakan layanan terbaik kami
                    </p>
                </div>

                <!-- Testimonials Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($testimonials as $index => $testimonial)
                        <div
                            class="group relative bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-yellow-200 hover:-translate-y-2">
                            <!-- Quote Icon -->
                            <div
                                class="absolute -top-6 -right-6 w-24 h-24 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center opacity-10 group-hover:opacity-20 transition-opacity">
                                <i class="fas fa-quote-right text-4xl text-white"></i>
                            </div>

                            <!-- Rating Stars -->
                            <div class="p-8 pb-6">
                                <div class="flex items-center mb-4">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($testimonial->rating && $i <= $testimonial->rating)
                                            <i class="fas fa-star text-yellow-400"></i>
                                        @else
                                            <i class="fas fa-star text-yellow-400"></i>
                                        @endif
                                    @endfor
                                    <span class="ml-2 text-sm text-gray-600">(5.0)</span>
                                </div>

                                <!-- Testimonial Content -->
                                <blockquote class="text-gray-700 leading-relaxed mb-6 italic relative">
                                    <i class="fas fa-quote-left text-yellow-400 text-lg mr-2"></i>
                                    {{ $testimonial->message }}
                                    <i class="fas fa-quote-right text-yellow-400 text-lg ml-2"></i>
                                </blockquote>
                            </div>

                            <!-- Client Info -->
                            <div class="px-8 pb-8">
                                <div class="flex items-center">
                                    <!-- Client Avatar -->
                                    <div class="relative">
                                        @if ($testimonial->avatar)
                                            <img src="{{ asset($testimonial->avatar) }}" alt="{{ $testimonial->client_name }}"
                                                class="w-12 h-12 rounded-full object-cover border-2 border-white shadow-md">
                                        @else
                                            <div
                                                class="w-12 h-12 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm shadow-md">
                                                {{ substr($testimonial->client_name, 0, 1) }}
                                            </div>
                                        @endif

                                        <!-- Verified Badge -->
                                        <div
                                            class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full flex items-center justify-center">
                                            <i class="fas fa-check text-white text-xs"></i>
                                        </div>
                                    </div>

                                    <!-- Client Details -->
                                    <div class="ml-4">
                                        <div class="font-bold text-gray-900">{{ $testimonial->client_name }}</div>
                                        <div class="text-sm text-gray-600">
                                            {{ $testimonial->client_position ?? 'Klien' }}
                                            @if ($testimonial->company_name)
                                                <span class="text-gray-400">•</span>
                                                <span class="text-blue-600">{{ $testimonial->company_name }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Hover Effect -->
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-yellow-400 to-orange-500 opacity-0 group-hover:opacity-5 transition-opacity duration-500 rounded-2xl">
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Trust Indicators -->
                <div class="mt-16 text-center">
                    <div class="inline-flex items-center justify-center space-x-8 text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-users text-2xl text-blue-600 mr-2"></i>
                            <div>
                                <div class="font-bold text-2xl text-gray-900">100+</div>
                                <div class="text-sm">Klien Puas</div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-star text-2xl text-yellow-500 mr-2"></i>
                            <div>
                                <div class="font-bold text-2xl text-gray-900">4.9/5</div>
                                <div class="text-sm">Rating Client</div>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-award text-2xl text-purple-600 mr-2"></i>
                            <div>
                                <div class="font-bold text-2xl text-gray-900">99%</div>
                                <div class="text-sm">Satisfaction</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Why Choose Us Section -->
    @if ($whyChooseUs->count() > 0)
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center px-4 py-2 bg-orange-100 text-orange-800 rounded-full text-sm font-semibold mb-6">
                        <i class="fas fa-star mr-2"></i>
                        Keunggulan Kami
                    </div>
                    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-6">Mengapa Memilih Kami?</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Berbagai keunggulan dan alasan mengapa kami menjadi pilihan terbaik untuk partner bisnis Anda
                    </p>
                </div>

                <!-- Why Choose Us Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($whyChooseUs as $index => $reason)
                        <div
                            class="group relative bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-orange-200 hover:-translate-y-2 p-8">
                            <!-- Icon -->
                            <div class="mb-6">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                    <div class="text-white text-2xl">
                                        @if ($reason->icon)
                                            <i class="{{ $reason->icon }}"></i>
                                        @else
                                            <i class="fas fa-check-circle"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-orange-600 transition-colors">
                                    {{ $reason->title }}
                                </h3>
                                <p class="text-gray-600 leading-relaxed">
                                    {{ $reason->description }}
                                </p>
                            </div>

                            <!-- Decorative Elements -->
                            <div
                                class="absolute -top-6 -right-6 w-24 h-24 bg-orange-100 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                            <div
                                class="absolute -bottom-6 -left-6 w-32 h-32 bg-gradient-to-br from-orange-200 to-red-200 rounded-full opacity-0 group-hover:opacity-20 transition-opacity duration-500">
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- CTA Button -->
                <div class="text-center mt-16">
                    <a href="{{ route('contact') }}"
                        class="inline-flex items-center bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 hover:shadow-lg hover:scale-105">
                        <i class="fas fa-handshake mr-3"></i>
                        Mari Berkolaborasi
                        <i class="fas fa-arrow-right ml-3"></i>
                    </a>
                </div>
            </div>
        </section>
    @endif

    <!-- Latest Articles Section -->
    @if ($latestArticles->count() > 0)
        <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center px-4 py-2 bg-purple-100 text-purple-800 rounded-full text-sm font-semibold mb-6">
                        <i class="fas fa-newspaper mr-2"></i>
                        Blog & Insight
                    </div>
                    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-6">Artikel Terbaru</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        Dapatkan insight terbaru, tips, dan tren teknologi dari para ahli kami untuk membantu mengembangkan
                        bisnis Anda
                    </p>
                </div>

                <!-- Articles Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($latestArticles as $index => $article)
                        <article
                            class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden hover:-translate-y-2">
                            <!-- Article Image -->
                            <div class="relative h-52 overflow-hidden">
                                @if ($article->featured_image)
                                    <img src="{{ asset($article->featured_image) }}" alt="{{ $article->title }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-purple-200 to-blue-200 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-6xl text-purple-400"></i>
                                    </div>
                                @endif

                                <!-- Overlay -->
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                </div>

                                <!-- Category Badge -->
                                <div class="absolute top-4 left-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 bg-white/90 backdrop-blur-sm text-purple-600 text-sm font-semibold rounded-full">
                                        {{ $article->category->name }}
                                    </span>
                                </div>

                                <!-- Reading Time -->
                                <div class="absolute top-4 right-4">
                                    <span
                                        class="inline-flex items-center px-3 py-1 bg-black/50 backdrop-blur-sm text-white text-sm rounded-full">
                                        <i class="fas fa-clock mr-1"></i>
                                        {{ rand(3, 8) }} min
                                    </span>
                                </div>
                            </div>

                            <!-- Article Content -->
                            <div class="p-6">
                                <!-- Meta Info -->
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar mr-1"></i>
                                        <span>{{ $article->published_at->format('d M Y') }}</span>
                                    </div>
                                    <span class="mx-2">•</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-eye mr-1"></i>
                                        <span>{{ $article->views ?? rand(50, 500) }}</span>
                                    </div>
                                </div>

                                <!-- Article Title -->
                                <h3
                                    class="text-xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition-colors leading-tight">
                                    {{ $article->title }}
                                </h3>

                                <!-- Article Excerpt -->
                                <p class="text-gray-600 leading-relaxed mb-6">
                                    {{ Str::limit($article->excerpt ?? strip_tags($article->content), 120) }}
                                </p>

                                <!-- Author & CTA -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        @if ($article->author && $article->author->avatar)
                                            <img src="{{ asset($article->author->avatar) }}" alt="{{ $article->author->name }}"
                                                class="w-8 h-8 rounded-full object-cover mr-3">
                                        @else
                                            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                                <i class="fas fa-user text-purple-600 text-sm"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $article->author->name ?? 'Admin' }}
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ route('articles.show', $article->slug) }}"
                                        class="inline-flex items-center text-purple-600 hover:text-purple-700 font-semibold transition-colors">
                                        Baca
                                        <i
                                            class="fas fa-arrow-right ml-1 transform group-hover:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Decorative Element -->
                            <div
                                class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-purple-500 to-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- View All Button -->
                <div class="text-center mt-16">
                    <a href="{{ route('articles.index') }}"
                        class="inline-flex items-center bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 hover:shadow-lg hover:scale-105">
                        <i class="fas fa-newspaper mr-3"></i>
                        Lihat Semua Artikel
                        <i class="fas fa-arrow-right ml-3"></i>
                    </a>
                </div>
            </div>
        </section>
    @endif

    <!-- Contact CTA Section -->
    <section class="py-20 relative overflow-hidden">
        <!-- Background with Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-purple-900 to-blue-800"></div>

        <!-- Decorative Elements -->
        <div class="absolute inset-0">
            <div
                class="absolute top-0 left-0 w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse">
            </div>
            <div class="absolute top-0 right-0 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"
                style="animation-delay: 2s"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-pulse"
                style="animation-delay: 4s"></div>
        </div>

        <!-- Grid Pattern Overlay -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 20px 20px">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <!-- Main Content -->
            <div class="max-w-4xl mx-auto">
                <!-- Badge -->
                <div
                    class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm font-semibold mb-8">
                    <i class="fas fa-rocket mr-2"></i>
                    Mari Berkolaborasi
                </div>

                <!-- Headline -->
                <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                    Siap Memulai
                    <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                        Proyek Impian
                    </span>
                    Anda?
                </h2>

                <!-- Description -->
                <p class="text-xl md:text-2xl mb-12 opacity-90 leading-relaxed max-w-3xl mx-auto">
                    Jadilah bagian dari klien-klien sukses kami. Hubungi tim ahli kami sekarang untuk konsultasi gratis dan
                    wujudkan visi digital Anda menjadi kenyataan.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-16">
                    <a href="{{ route('contact') }}"
                        class="group relative inline-flex items-center justify-center bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-gray-900 px-10 py-4 rounded-xl text-lg font-bold transition-all duration-300 hover:shadow-2xl hover:scale-105 transform">
                        <i class="fas fa-phone mr-3"></i>
                        Konsultasi Gratis
                        <i class="fas fa-arrow-right ml-3 transform group-hover:translate-x-1 transition-transform"></i>
                    </a>

                    <a href="{{ route('services.index') }}"
                        class="group inline-flex items-center justify-center border-2 border-white/30 hover:border-white text-white hover:bg-white hover:text-gray-900 px-10 py-4 rounded-xl text-lg font-bold transition-all duration-300 backdrop-blur-sm">
                        <i class="fas fa-cogs mr-3"></i>
                        Lihat Layanan
                        <i class="fas fa-external-link-alt ml-3 transform group-hover:scale-110 transition-transform"></i>
                    </a>
                </div>

                <!-- Contact Info -->
                @if (setting('contact_phone') || setting('contact_email') || setting('contact_whatsapp'))
                    <div class="border-t border-white/20 pt-12">
                        <div class="text-lg mb-6 opacity-80">Atau hubungi kami langsung</div>
                        <div class="flex flex-col md:flex-row gap-8 justify-center items-center text-lg">
                            @if (setting('contact_phone'))
                                <a href="tel:{{ setting('contact_phone') }}"
                                    class="group flex items-center justify-center bg-white/10 hover:bg-white/20 backdrop-blur-sm px-6 py-3 rounded-lg transition-all duration-300 hover:scale-105">
                                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-phone text-xl"></i>
                                    </div>
                                    <div class="text-left">
                                        <div class="text-sm opacity-80">Telepon</div>
                                        <div class="font-semibold">{{ setting('contact_phone') }}</div>
                                    </div>
                                </a>
                            @endif

                            @if (setting('contact_email'))
                                <a href="mailto:{{ setting('contact_email') }}"
                                    class="group flex items-center justify-center bg-white/10 hover:bg-white/20 backdrop-blur-sm px-6 py-3 rounded-lg transition-all duration-300 hover:scale-105">
                                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-envelope text-xl"></i>
                                    </div>
                                    <div class="text-left">
                                        <div class="text-sm opacity-80">Email</div>
                                        <div class="font-semibold">{{ setting('contact_email') }}</div>
                                    </div>
                                </a>
                            @endif

                            @if (setting('contact_whatsapp'))
                                <a href="https://wa.me/{{ setting('contact_whatsapp') }}" target="_blank"
                                    class="group flex items-center justify-center bg-green-500/20 hover:bg-green-500/30 backdrop-blur-sm px-6 py-3 rounded-lg transition-all duration-300 hover:scale-105">
                                    <div class="w-12 h-12 bg-green-500/30 rounded-full flex items-center justify-center mr-4">
                                        <i class="fab fa-whatsapp text-xl"></i>
                                    </div>
                                    <div class="text-left">
                                        <div class="text-sm opacity-80">WhatsApp</div>
                                        <div class="font-semibold">Chat Sekarang</div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <!-- Trust Indicators -->
            <div class="mt-16 pt-12 border-t border-white/20">
                <div class="text-sm opacity-70 mb-6">Dipercaya oleh perusahaan terkemuka</div>
                <div class="flex items-center justify-center space-x-12 opacity-60">
                    <div class="text-center">
                        <div class="text-2xl font-bold">5+</div>
                        <div class="text-xs">Tahun</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">300+</div>
                        <div class="text-xs">Klien</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">100+</div>
                        <div class="text-xs">Proyek</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">90%</div>
                        <div class="text-xs">Puas</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection