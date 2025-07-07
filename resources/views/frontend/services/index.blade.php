@extends('layouts.frontend')

@push('seo')
    <x-seo-head
        page-identifier="services"
        :title="page_title('services', 'Layanan Kami - ' . setting('site_name'))"
        :description="page_description('services', 'Jelajahi berbagai layanan profesional yang kami tawarkan untuk mengembangkan bisnis Anda dengan teknologi terdepan.')" />
@endpush

@push('styles')
<style>
    .service-grid-animation {
        animation: fadeInUp 0.6s ease-out;
    }

    .service-grid-animation:nth-child(1) { animation-delay: 0.1s; }
    .service-grid-animation:nth-child(2) { animation-delay: 0.2s; }
    .service-grid-animation:nth-child(3) { animation-delay: 0.3s; }
    .service-grid-animation:nth-child(4) { animation-delay: 0.4s; }
    .service-grid-animation:nth-child(5) { animation-delay: 0.5s; }
    .service-grid-animation:nth-child(6) { animation-delay: 0.6s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .floating-element {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    .gradient-background {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<x-hero
    page-identifier="services"
    fallback-title="Layanan Kami"
    fallback-subtitle="Solusi teknologi terdepan untuk mengembangkan bisnis Anda" />

<!-- Services Grid -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 floating-element"></div>
    <div class="absolute bottom-20 right-10 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 floating-element" style="animation-delay: -3s;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        @if($services->count() > 0)
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 bg-white/80 text-blue-600 rounded-full text-sm font-semibold mb-4 shadow-md backdrop-blur-sm">
                    🚀 Layanan Profesional
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Solusi <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Teknologi</span> Terdepan
                </h2>
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Kami menyediakan berbagai layanan teknologi profesional yang dirancang khusus untuk memenuhi kebutuhan bisnis modern Anda
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full mx-auto mt-8"></div>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                @foreach($services as $index => $service)
                    <div class="service-grid-animation" style="animation-delay: {{ ($index % 6) * 0.1 }}s;">
                        <x-service-card :service="$service" variant="featured" />
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($services->hasPages())
                <div class="flex justify-center">
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        {{ $services->links() }}
                    </div>
                </div>
            @endif
        @else
            <div class="text-center py-20">
                <div class="relative inline-block mb-8">
                    <div class="absolute inset-0 bg-blue-200 rounded-full blur-2xl opacity-30"></div>
                    <div class="relative w-32 h-32 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto shadow-2xl">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 7.172V5L8 4z"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Layanan Sedang Dipersiapkan</h3>
                <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                    Kami sedang mempersiapkan informasi layanan terbaru untuk memberikan solusi teknologi terbaik bagi Anda.
                </p>
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Hubungi Kami
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-20 relative overflow-hidden">
    <!-- Gradient Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900"></div>
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 3px 3px, rgba(255, 255, 255, 0.15) 1px, transparent 0); background-size: 60px 60px;"></div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-20 w-32 h-32 bg-white/10 rounded-full blur-xl floating-element"></div>
    <div class="absolute bottom-20 right-20 w-40 h-40 bg-white/5 rounded-full blur-xl floating-element" style="animation-delay: -3s;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-white">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-white/20 text-white rounded-full text-sm font-semibold mb-4 backdrop-blur-sm">
                ⭐ Keunggulan Kami
            </span>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Mengapa Memilih Kami?</h2>
            <p class="text-xl opacity-90 max-w-4xl mx-auto leading-relaxed">
                Keunggulan dan komitmen kami dalam memberikan layanan teknologi terbaik untuk kesuksesan bisnis Anda
            </p>
            <div class="w-24 h-1 bg-white/40 rounded-full mx-auto mt-8"></div>
        </div>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($whyChooseUs as $item)
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-r from-{{ $item->color }}-400 to-{{ $item->color }}-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        @if($item->icon)
                            <i class="{{ $item->icon }} text-white text-2xl"></i>
                        @else
                            <i class="fas fa-star text-white text-2xl"></i>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-center">{{ $item->title }}</h3>
                    <p class="opacity-90 text-center leading-relaxed">{{ $item->description }}</p>
                </div>
            @empty
                <!-- Fallback content if no data in database -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-center">Tim Berpengalaman</h3>
                    <p class="opacity-90 text-center leading-relaxed">Didukung oleh tim profesional dengan pengalaman bertahun-tahun di industri teknologi</p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-bolt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-center">Teknologi Terdepan</h3>
                    <p class="opacity-90 text-center leading-relaxed">Menggunakan teknologi dan tools terbaru untuk menghasilkan solusi yang optimal dan inovatif</p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 border border-white/20 hover:bg-white/15 transition-all duration-300 group">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-400 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-headset text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-center">Support 24/7</h3>
                    <p class="opacity-90 text-center leading-relaxed">Dukungan teknis dan maintenance berkelanjutan untuk menjamin kelancaran sistem</p>
                </div>
            @endforelse
        <!-- </div>
                <p class="opacity-90 text-center leading-relaxed">Membangun hubungan kemitraan jangka panjang yang saling menguntungkan</p>
            </div> -->
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-10 right-10 w-64 h-64 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 floating-element"></div>
    <div class="absolute bottom-10 left-10 w-64 h-64 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 floating-element" style="animation-delay: -2s;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-white/80 text-blue-600 rounded-full text-sm font-semibold mb-4 shadow-md backdrop-blur-sm">
                🎯 Metodologi Kami
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Proses <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Kerja</span> Kami
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Metodologi yang teruji dan terstruktur untuk memastikan kesuksesan setiap proyek teknologi yang kami kerjakan
            </p>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full mx-auto mt-8"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="relative group">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 p-8 border border-gray-100 transform hover:-translate-y-2">
                    <div class="absolute -top-4 left-8">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            1
                        </div>
                    </div>
                    <div class="pt-4">
                        <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Konsultasi & Analisis</h3>
                        <p class="text-gray-600 text-center leading-relaxed">Memahami kebutuhan dan tujuan bisnis Anda secara mendalam</p>
                    </div>
                </div>
                <!-- Connection Line -->
                <div class="hidden lg:block absolute top-1/2 -right-4 transform -translate-y-1/2">
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative group">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 p-8 border border-gray-100 transform hover:-translate-y-2">
                    <div class="absolute -top-4 left-8">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            2
                        </div>
                    </div>
                    <div class="pt-4">
                        <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Perencanaan & Desain</h3>
                        <p class="text-gray-600 text-center leading-relaxed">Merancang solusi yang tepat dengan arsitektur dan desain optimal</p>
                    </div>
                </div>
                <!-- Connection Line -->
                <div class="hidden lg:block absolute top-1/2 -right-4 transform -translate-y-1/2">
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative group">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 p-8 border border-gray-100 transform hover:-translate-y-2">
                    <div class="absolute -top-4 left-8">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            3
                        </div>
                    </div>
                    <div class="pt-4">
                        <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Development & Testing</h3>
                        <p class="text-gray-600 text-center leading-relaxed">Pengembangan dengan quality assurance dan testing menyeluruh</p>
                    </div>
                </div>
                <!-- Connection Line -->
                <div class="hidden lg:block absolute top-1/2 -right-4 transform -translate-y-1/2">
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="relative group">
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 p-8 border border-gray-100 transform hover:-translate-y-2">
                    <div class="absolute -top-4 left-8">
                        <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                            4
                        </div>
                    </div>
                    <div class="pt-4">
                        <div class="w-16 h-16 bg-orange-100 rounded-2xl flex items-center justify-center mb-6 mx-auto group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">Deployment & Support</h3>
                        <p class="text-gray-600 text-center leading-relaxed">Go-live dan dukungan berkelanjutan untuk kesuksesan jangka panjang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 relative overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900 via-purple-900 to-indigo-900"></div>
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.2) 2px, transparent 0), radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.1) 1px, transparent 0); background-size: 100px 100px, 50px 50px;"></div>
    </div>

    <!-- Floating Elements -->
    <!-- <div class="absolute top-20 left-20 w-32 h-32 bg-white/10 rounded-full blur-xl floating-element"></div>
    <div class="absolute bottom-20 right-20 w-40 h-40 bg-white/5 rounded-full blur-xl floating-element" style="animation-delay: -3s;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative">
        <div class="max-w-4xl mx-auto">
            <span class="inline-block px-4 py-2 bg-white/20 text-white rounded-full text-sm font-semibold mb-6 backdrop-blur-sm">
                🚀 Mulai Proyek Anda
            </span>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Siap Memulai Proyek Anda?</h2>
            <p class="text-xl mb-10 opacity-90 leading-relaxed">
                Konsultasikan kebutuhan teknologi Anda dengan tim ahli kami dan dapatkan solusi terbaik untuk mengembangkan bisnis Anda ke level yang lebih tinggi
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center mb-12">
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center bg-white text-blue-900 hover:bg-gray-100 px-8 py-4 rounded-xl text-lg font-bold transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Konsultasi Gratis
                </a>
                <a href="{{ route('projects.index') }}"
                   class="inline-flex items-center border-2 border-white text-white hover:bg-white hover:text-blue-900 px-8 py-4 rounded-xl text-lg font-bold transition-all duration-300 transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Lihat Portfolio
                </a>
            </div>

            @if(setting('contact_phone') || setting('contact_email'))
                <div class="flex flex-col sm:flex-row gap-8 justify-center text-lg">
                    @if(setting('contact_phone'))
                        <div class="flex items-center justify-center bg-white/10 backdrop-blur-sm rounded-xl px-6 py-4">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <span class="font-medium">{{ setting('contact_phone') }}</span>
                        </div>
                    @endif
                    @if(setting('contact_email'))
                        <div class="flex items-center justify-center bg-white/10 backdrop-blur-sm rounded-xl px-6 py-4">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="font-medium">{{ setting('contact_email') }}</span>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section> -->
@endsection
