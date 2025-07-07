@extends('layouts.frontend')

@push('seo')
    <x-seo-head
        page-identifier="about"
        :title="page_title('about', 'Tentang Kami - ' . setting('site_name'))"
        :description="page_description('about', 'Pelajari lebih lanjut tentang ' . setting('site_name') . ', visi misi, dan tim profesional kami.')" />
@endpush

@push('styles')
<style>
    .gradient-overlay {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.9) 0%, rgba(147, 51, 234, 0.9) 100%);
    }

    .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .float-animation {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    .parallax-bg {
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .counter-animation {
        animation: fadeInUp 0.8s ease-out;
    }

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

    .team-card {
        position: relative;
        overflow: hidden;
    }
      .team-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(59, 130, 246, 0.1) 0%, rgba(147, 51, 234, 0.1) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none; /* This prevents the overlay from blocking clicks */
    }

    .team-card:hover::before {
        opacity: 1;
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<x-hero
    page-identifier="about"
    fallback-title="Tentang Kami"
    fallback-subtitle="Mengenal lebih dalam tentang perusahaan kami" />

<!-- About Content -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
            <div class="space-y-8">
                <div>
                    <span class="inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-sm font-semibold mb-4">
                        🚀 Tentang Perusahaan
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                        {{ setting('about_title', 'Tentang Perusahaan Kami') }}
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full mb-8"></div>
                </div>

                <div class="text-gray-700 text-lg leading-relaxed space-y-6">
                    @if(setting('about_description'))
                        @foreach(explode("\n\n", setting('about_description')) as $paragraph)
                            <p class="text-justify">{{ $paragraph }}</p>
                        @endforeach
                    @else
                        <p class="text-justify">Kami adalah perusahaan yang berdedikasi untuk memberikan solusi terbaik bagi klien kami. Dengan pengalaman bertahun-tahun dan tim profesional yang berpengalaman, kami siap membantu mengembangkan bisnis Anda.</p>
                    @endif
                </div>

                <!-- Key Features -->
                <div class="grid grid-cols-2 gap-6 mt-8">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-check text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Berpengalaman</h4>
                            <p class="text-sm text-gray-600">8+ tahun di industri</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-rocket text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Inovatif</h4>
                            <p class="text-sm text-gray-600">Teknologi terdepan</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-users text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Tim Solid</h4>
                            <p class="text-sm text-gray-600">50+ profesional</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-award text-yellow-600 text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Berkualitas</h4>
                            <p class="text-sm text-gray-600">Standar tinggi</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-4 bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl blur opacity-20 float-animation"></div>
                @if(setting('about_image'))
                    <img src="{{ asset('storage/'.setting('about_image')) }}" alt="About Us" class="relative rounded-3xl shadow-2xl w-full h-96 object-cover">
                @else
                    <div class="relative bg-gradient-to-br from-blue-100 to-purple-100 rounded-3xl h-96 flex items-center justify-center shadow-2xl">
                        <div class="text-center">
                            <i class="fas fa-building text-6xl text-blue-400 mb-4"></i>
                            <p class="text-gray-600 font-medium">Gambar Perusahaan</p>
                        </div>
                    </div>
                @endif

                <!-- Floating Stats -->
                <div class="absolute -bottom-8 -left-8 bg-white rounded-2xl shadow-xl p-6 glass-effect">
                    <div class="text-3xl font-bold text-blue-600">500+</div>
                    <div class="text-sm text-gray-600">Proyek Selesai</div>
                </div>

                <div class="absolute -top-8 -right-8 bg-white rounded-2xl shadow-xl p-6 glass-effect">
                    <div class="text-3xl font-bold text-purple-600">200+</div>
                    <div class="text-sm text-gray-600">Klien Puas</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-20 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-purple-50"></div>
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 2px 2px, rgba(59, 130, 246, 0.3) 1px, transparent 0); background-size: 40px 40px;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-white/80 text-blue-600 rounded-full text-sm font-semibold mb-4 shadow-md">
                🎯 Visi & Misi
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Panduan Langkah Kami</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Vision -->
            <div class="card-hover bg-white rounded-3xl shadow-xl p-10 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full -translate-y-16 translate-x-16 opacity-50"></div>
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg">
                        <i class="fas fa-eye text-white text-3xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Visi Kami</h3>
                    <p class="text-gray-700 text-lg leading-relaxed font-medium">
                        {{ setting('vision', 'Menjadi perusahaan teknologi terdepan di Indonesia yang memberikan solusi digital inovatif dan berkelanjutan') }}
                    </p>

                    <!-- Decorative Elements -->
                    <div class="absolute bottom-6 right-6 opacity-10">
                        <i class="fas fa-quote-right text-6xl text-blue-600"></i>
                    </div>
                </div>
            </div>

            <!-- Mission -->
            <div class="card-hover bg-white rounded-3xl shadow-xl p-10 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-100 to-purple-200 rounded-full -translate-y-16 translate-x-16 opacity-50"></div>
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg">
                        <i class="fas fa-bullseye text-white text-3xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Misi Kami</h3>
                    <p class="text-gray-700 text-lg leading-relaxed font-medium">
                        {{ setting('mission', 'Membantu perusahaan dalam transformasi digital melalui teknologi terdepan, layanan berkualitas tinggi, dan partnership jangka panjang yang saling menguntungkan') }}
                    </p>

                    <!-- Decorative Elements -->
                    <div class="absolute bottom-6 right-6 opacity-10">
                        <i class="fas fa-quote-right text-6xl text-purple-600"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Values -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <span class="inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-sm font-semibold mb-4">
                💎 Nilai-Nilai Kami
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Fondasi Kekuatan</h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Nilai-nilai yang menjadi fondasi dalam setiap layanan dan solusi yang kami berikan untuk menciptakan partnership yang berkelanjutan
            </p>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full mx-auto mt-8"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="card-hover text-center bg-gradient-to-br from-blue-50 to-blue-100 rounded-3xl p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-blue-200 rounded-full -translate-y-10 translate-x-10 opacity-30"></div>
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-lightbulb text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Inovasi</h3>
                    <p class="text-gray-700 leading-relaxed font-medium">Selalu menghadirkan solusi terdepan dan teknologi terbaru untuk kebutuhan klien</p>
                </div>
            </div>

            <div class="card-hover text-center bg-gradient-to-br from-green-50 to-green-100 rounded-3xl p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-green-200 rounded-full -translate-y-10 translate-x-10 opacity-30"></div>
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-r from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-award text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Kualitas</h3>
                    <p class="text-gray-700 leading-relaxed font-medium">Berkomitmen memberikan hasil terbaik dengan standar kualitas tinggi</p>
                </div>
            </div>

            <div class="card-hover text-center bg-gradient-to-br from-purple-50 to-purple-100 rounded-3xl p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-purple-200 rounded-full -translate-y-10 translate-x-10 opacity-30"></div>
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-handshake text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Integritas</h3>
                    <p class="text-gray-700 leading-relaxed font-medium">Menjalankan bisnis dengan transparansi dan kejujuran dalam setiap proses</p>
                </div>
            </div>

            <div class="card-hover text-center bg-gradient-to-br from-orange-50 to-orange-100 rounded-3xl p-8 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-orange-200 rounded-full -translate-y-10 translate-x-10 opacity-30"></div>
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                        <i class="fas fa-users text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Kolaborasi</h3>
                    <p class="text-gray-700 leading-relaxed font-medium">Membangun kemitraan jangka panjang yang saling menguntungkan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
@if($teams->count() > 0)
<section class="py-20 bg-gradient-to-br from-gray-50 to-white relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-blue-100 rounded-full -translate-x-48 -translate-y-48 opacity-30"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-100 rounded-full translate-x-48 translate-y-48 opacity-30"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-20">
            <span class="inline-block px-4 py-2 bg-white text-blue-600 rounded-full text-sm font-semibold mb-4 shadow-md">
                👥 Tim Kami
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Tim Manajemen</h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Dipimpin oleh profesional berpengalaman di bidangnya masing-masing untuk memberikan hasil terbaik
            </p>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full mx-auto mt-8"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($teams as $team)
                <div class="team-card card-hover bg-white rounded-3xl shadow-xl overflow-hidden">
                    @if($team->photo)
                        <img src="{{ asset('storage/'. $team->photo) }}" alt="{{ $team->name }}" class="w-full h-64 object-cover">
                    @else
                        <div class="w-full h-64 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-user text-5xl text-gray-400 mb-2"></i>
                                <p class="text-gray-500 text-sm">Foto Tim</p>
                            </div>
                        </div>
                    @endif

                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $team->name }}</h3>
                        <p class="text-blue-600 font-semibold mb-4 text-lg">{{ $team->position }}</p>
                          @if($team->bio)
                            <p class="text-gray-700 text-sm mb-6 leading-relaxed">{{ Str::limit($team->bio, 100) }}</p>
                        @endif                        <div class="text-center">
                            <a href="{{ route('team.detail', $team->id) }}"
                               class="inline-flex items-center bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-2 rounded-xl text-sm font-semibold hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <i class="fas fa-info-circle mr-2"></i>Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Stats Section --> <!--
<section class="py-20 relative overflow-hidden"> -->
    <!-- Animated Background --> <!--
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900 via-purple-900 to-blue-900"></div>
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle at 3px 3px, rgba(255, 255, 255, 0.3) 1px, transparent 0); background-size: 60px 60px;"></div>
-->
    <!-- Floating Elements -->
    <!-- <div class="absolute top-20 left-20 w-32 h-32 bg-white/10 rounded-full blur-xl float-animation"></div>
    <div class="absolute bottom-20 right-20 w-40 h-40 bg-white/5 rounded-full blur-xl float-animation" style="animation-delay: -3s;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-white">
        <div class="text-center mb-20">
            <span class="inline-block px-4 py-2 bg-white/20 text-white rounded-full text-sm font-semibold mb-4 backdrop-blur-sm">
                📊 Pencapaian Kami
            </span>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Angka Berbicara</h2>
            <p class="text-xl opacity-90 max-w-4xl mx-auto leading-relaxed">
                Bukti nyata dedikasi dan kepercayaan klien yang telah memilih kami sebagai partner teknologi
            </p>
            <div class="w-24 h-1 bg-white/40 rounded-full mx-auto mt-8"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center counter-animation">
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 card-hover">
                    <div class="w-20 h-20 bg-gradient-to-r from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-project-diagram text-white text-2xl"></i>
                    </div>
                    <div class="text-5xl font-bold mb-4">500+</div>
                    <p class="text-lg opacity-90 font-medium">Proyek Selesai</p>
                    <p class="text-sm opacity-70 mt-2">Berbagai industri & skala</p>
                </div>
            </div>

            <div class="text-center counter-animation" style="animation-delay: 0.2s;">
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 card-hover">
                    <div class="w-20 h-20 bg-gradient-to-r from-purple-400 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <div class="text-5xl font-bold mb-4">200+</div>
                    <p class="text-lg opacity-90 font-medium">Klien Puas</p>
                    <p class="text-sm opacity-70 mt-2">Rating kepuasan 4.9/5</p>
                </div>
            </div>

            <div class="text-center counter-animation" style="animation-delay: 0.4s;">
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 card-hover">
                    <div class="w-20 h-20 bg-gradient-to-r from-green-400 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar-alt text-white text-2xl"></i>
                    </div>
                    <div class="text-5xl font-bold mb-4">8+</div>
                    <p class="text-lg opacity-90 font-medium">Tahun Pengalaman</p>
                    <p class="text-sm opacity-70 mt-2">Sejak 2016 melayani</p>
                </div>
            </div>

            <div class="text-center counter-animation" style="animation-delay: 0.6s;">
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 card-hover">
                    <div class="w-20 h-20 bg-gradient-to-r from-orange-400 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <div class="text-5xl font-bold mb-4">50+</div>
                    <p class="text-lg opacity-90 font-medium">Tim Profesional</p>
                    <p class="text-sm opacity-70 mt-2">Expert di bidangnya</p>
                </div>
            </div>
        </div> -->

        <!-- Additional Stats Row -->
         <!-- <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16 max-w-4xl mx-auto">
            <div class="text-center">
                <div class="text-3xl font-bold mb-2">99.9%</div>
                <p class="opacity-90">Uptime Server</p>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold mb-2">24/7</div>
                <p class="opacity-90">Support System</p>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold mb-2">100%</div>
                <p class="opacity-90">Money Back Guarantee</p>
            </div>
        </div>
    </div>
</section> -->

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-br from-white to-gray-50 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full translate-x-48 -translate-y-48 opacity-40"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-gradient-to-tr from-purple-100 to-pink-100 rounded-full -translate-x-48 translate-y-48 opacity-40"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
        <div class="max-w-4xl mx-auto">
            <span class="inline-block px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-sm font-semibold mb-6">
                🤝 Mari Berkolaborasi
            </span>

            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                Siap Bekerja Sama Dengan Kami?
            </h2>

            <p class="text-xl text-gray-600 mb-12 leading-relaxed">
                Mari diskusikan bagaimana kami dapat membantu mengembangkan bisnis Anda dengan solusi teknologi terdepan dan strategi digital yang efektif
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center mb-12">
                <a href="{{ route('contact') }}" class="group bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-10 py-4 rounded-2xl text-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                    <i class="fas fa-phone mr-3 group-hover:animate-pulse"></i>
                    Hubungi Kami Sekarang
                </a>
                <a href="{{ route('services.index') }}" class="group border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-10 py-4 rounded-2xl text-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                    <i class="fas fa-eye mr-3 group-hover:animate-pulse"></i>
                    Lihat Produk Kami
                </a>
            </div>

            <!-- Contact Info Quick -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone text-blue-600 text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-2">Telepon</h4>
                    <p class="text-gray-600">{{ setting('phone', '+62 812-3456-7890') }}</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-purple-600 text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-2">Email</h4>
                    <p class="text-gray-600">{{ setting('email', 'info@example.com') }}</p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-green-600 text-2xl"></i>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-2">Jam Kerja</h4>                    <p class="text-gray-600">Senin - Jumat, 08:00 - 17:00</p>
                </div>
            </div>        </div>
    </div>
</section>

@endsection
