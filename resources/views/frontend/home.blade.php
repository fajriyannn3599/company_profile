@extends('layouts.frontend')

@push('seo')
    <x-seo-head page-identifier="home" :title="page_title('home', setting('site_name', 'Company Profile'))"
        :description="page_description('home', setting('meta_description', 'Professional company profile website'))" />
@endpush

@section('content')


    <!-- Hero Section -->
    <!-- <x-hero page-identifier="home" :fallback-title="setting('hero_title', 'Solusi Terbaik untuk Bisnis Anda')"
                                                                :fallback-subtitle="setting(
                                                                                                                                                                                                                                    'hero_subtitle',
                                                                                                                                                                                                                                    'Kami menyediakan layanan profesional dan inovatif untuk mengembangkan bisnis Anda ke level yang lebih tinggi.',
                                                                                                                                                                                                                                )" /> -->
    <section class="w-full overflow-hidden relative">
        <!-- Aspect Ratio 1440x554 -->
        <div class="aspect-[1440/553]">
            <!-- Swiper -->
            <div class="swiper w-full h-full">
                <div class="swiper-wrapper h-full">
                    <!-- Slide 1 -->
                    <div class="swiper-slide h-full">
                        <a href="#">
                            <img src="{{ asset('images/slides/slide1.png') }}" class="w-full h-full object-cover"
                                alt="Slide 1">
                            <div class="slider-content">
                                <!-- Konten tambahan (jika ada) -->
                            </div>
                        </a>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide h-full">
                        <a href="#">
                            <img src="{{ asset('images/slides/slide2.png') }}" class="w-full h-full object-cover"
                                alt="Slide 2">
                            <div class="slider-content">
                                <!-- Konten tambahan (jika ada) -->
                            </div>
                        </a>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide h-full">
                        <a href="#">
                            <img src="{{ asset('images/slides/SIMPANAN-ANDA.jpg') }}" class="w-full h-full object-cover"
                                alt="Slide 3">
                            <div class="slider-content">
                                <!-- Konten tambahan (jika ada) -->
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Tombol Navigasi -->
                <div
                    class="swiper-button-next !text-white !bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 !p-4 sm:!p-6 !rounded !shadow transition-all">
                </div>
                <div
                    class="swiper-button-prev !text-white !bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 !p-4 sm:!p-6 !rounded !shadow transition-all">
                </div>

                <!-- Bullet Pagination -->
                <div class="swiper-pagination !bottom-3"></div>
            </div>
        </div>
    </section>










    <!-- home -->
    <!-- <section class="py-16 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-2 gap-8 items-center"> -->
    <!-- Left Side -->
    <!-- <div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                            BPR Syariah Arsa Sejahtera
                        </h2>

                        <div class="border-l-4 border-blue-800 pl-4 mb-6">
                            <p class="text-gray-700 text-justify">
                                BPR Syariah Arsa Sejahtera siap memberikan layanan perbankan dengan proses yang mudah dan juga siap
                                menjalin kemitraan secara professional dan saling menguntungkan dengan seluruh stakeholder untuk
                                kelangsungan dan pertumbuhan bisnis.
                            </p>
                        </div>

                        <div class="border-l-4 border-blue-800 pl-4 mb-6">
                            <p class="text-gray-700 text-justify">
                                BPR Syariah Arsa Sejahtera merupakan peserta penjaminan LPS. Maksimum nilai simpanan yang dijamin
                                LPS per nasabah per bank adalah Rp 2 miliar. Untuk Mengetahui Tingkat Bunga Penjaminan LPS, silahkan
                                akses ke
                                <a href="https://apps.lps.go.id/BankPesertaLPSRate" class="text-blue-600 hover:underline"
                                    target="_blank">
                                    https://apps.lps.go.id/BankPesertaLPSRate
                                </a>
                            </p>
                        </div>
                    </div> -->

    <!-- Right Side -->
    <!-- @if(setting('about_image'))
                        <img src="{{ asset('storage/' . setting('about_image')) }}" alt="About Us"
                            class="relative shadow-2xl w-full h-96 object-cover">
                    @else
                        <div
                            class="relative bg-gradient-to-br from-blue-100 to-purple-100 h-96 flex items-center justify-center shadow-2xl">
                            <div class="text-center">
                                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                <i class="fas fa-building text-6xl text-blue-400 mb-4"></i>
                                <p class="text-gray-600 font-medium" style="font-family: 'Poppins', sans-serif;">Gambar Perusahaan</p>
                            </div>
                        </div>
                    @endif
                </div>
            </section> -->

    <!-- Latest Articles Section -->
    @if ($latestArticles->count() > 0)
        <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-10">
                    <!-- Tambahkan link Google Fonts di bagian <head> -->
                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                    <div class="inline-flex items-center px-5 py-2 bg-red-100 text-red-800 text-sm font-semibold rounded-lg shadow-md"
                        style="font-family: 'Poppins', sans-serif;">
                        <i class="fas fa-newspaper mr-2"></i>
                        Arsa Updates
                    </div>

                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                    @foreach ($latestArticles as $article)
                        <a href="{{ route('articles.show', $article->slug) }}"
                            class="group relative bg-white shadow-md overflow-hidden transition-transform duration-300 hover:-translate-y-2"
                            style="font-family: 'Poppins', sans-serif;">

                            <!-- Gambar -->
                            <div class="relative h-48 overflow-hidden">
                                @if ($article->featured_image)
                                    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}"
                                        class="w-full h-48 object-cover transition-transform duration-700 group-hover:scale-105">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-red-200 to-blue-200 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-5xl text-red-400"></i>
                                    </div>
                                @endif

                                <!-- Kategori -->
                                <div class="absolute top-3 left-3 z-10">
                                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap"
                                        rel="stylesheet">
                                    <span class="px-3 py-1 bg-white/90 text-red-800 text-xs font-semibold "
                                        style="font-family: 'Poppins', sans-serif;">
                                        {{ $article->category->name }}
                                    </span>
                                </div>

                                <!-- Durasi -->
                                <div class="absolute top-3 right-3 z-10">
                                    <span class="px-3 py-1 bg-black/50 text-white text-xs ">
                                        <i class="fas fa-clock mr-1"></i> {{ $article->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>

                            <!-- Konten -->
                            <div class="p-4 h-auto">
                                <!-- Meta -->
                                <div class="flex items-center text-xs text-gray-500 mb-2">
                                    <i class="fas fa-calendar mr-1"></i>
                                    <span>{{ $article->created_at->format('d M Y') }}</span>
                                    <span class="mx-1">•</span>
                                    <i class="fas fa-eye mr-1"></i>
                                    <span>{{ $article->views }}</span>
                                </div>

                                <!-- Judul -->
                                <h3 class="text-sm font-semibold text-gray-800 leading-tight line-clamp-2 mb-2">
                                    {{ $article->title }}
                                </h3>

                                <!-- Deskripsi langsung ditampilkan -->
                                <p class="text-gray-600 text-xs leading-snug">
                                    {{ Str::limit($article->excerpt ?? strip_tags($article->content), 120) }}
                                </p>
                            </div>

                            <!-- Border bawah animasi -->
                            <div
                                class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-red-500 to-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Section Pengajuan -->
    <!-- Why Choose Us Section -->

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <!-- <div class="text-center mb-16">
                                                <div class="inline-flex items-center px-4 py-2 bg-red-100 text-red-800 rounded-full text-sm font-bold mb-6"
                                                    style="font-family: 'Poppins', sans-serif;">
                                                    <i class="fas fa-star mr-2"></i>
                                                    Pengajuan biaya
                                                </div>
                                                <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mb-6" style="font-family: 'Poppins', sans-serif;">
                                                    Ajukan Pembiayaan Anda</h2>
                                                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed"
                                                    style="font-family: 'Poppins', sans-serif;">
                                                    Solusi praktis untuk memenuhi kebutuhanmu. Siap mewujudkan setiap impian dengan semangat baru.
                                                </p>
                                            </div> -->

            <div class="text-center mb-10">
                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                <div class="inline-flex items-center px-5 py-2 bg-red-100 text-red-800 text-sm font-semibold rounded-lg shadow-md mb-6"
                    style="font-family: 'Poppins', sans-serif;">
                    <i class="fas fa-star mr-2"></i>
                    Pengajuan Biaya
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Ajukan <span
                        class="bg-gradient-to-r from-yellow-400 to-yellow-600 bg-clip-text text-transparent">Pembiayaan</span>
                    Anda
                </h2>
                <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                    Solusi praktis untuk memenuhi kebutuhanmu. Siap mewujudkan setiap impian dengan semangat baru.
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-yellow-600 to-red-300 rounded-full mx-auto mt-8"></div>
            </div>

            <!-- CTA Button -->
            <div class="text-center mt-16">
                <a href="{{ route('contact') }}"
                    class="inline-flex items-center bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 hover:shadow-lg hover:scale-105"
                    style="font-family: 'Poppins', sans-serif;">
                    <i class="fas fa-handshake mr-3"></i>
                    Ajukan Pembiayaan
                    <i class="fas fa-arrow-right ml-3"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Service Categories Section -->
    @if ($service_categories->count() > 0)
        <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
            <div class="max-w-screen-full mx-auto px-4 sm:px-6 lg:px-8 ">
                <!-- Header -->
                <div class="text-center mb-10">
                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                    <div class="inline-flex items-center px-5 py-2 bg-red-100 text-red-800 text-sm font-semibold rounded-lg shadow-md mb-6"
                        style="font-family: 'Poppins', sans-serif;">
                        <i class="fas fa-dollar mr-2"></i>
                        Layanan Kami
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                        Solusi <span
                            class="bg-gradient-to-r from-yellow-400 to-yellow-600 bg-clip-text text-transparent">Keuangan
                            Syariah</span>
                        Terdepan
                    </h2>
                    <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                        Kami menyediakan layanan keuangan syariah yang profesional dan sesuai prinsip syariah, untuk mendukung
                        pertumbuhan UMKM dan meningkatkan kesejahteraan ekonomi masyarakat.
                    </p>
                    <div class="w-24 h-1 bg-gradient-to-r from-yellow-600 to-red-300 rounded-full mx-auto mt-8"></div>
                </div>

                <!-- Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-6 ">
                    @foreach ($service_categories as $category)
                        <a href="{{ route('services.index') }}#{{ $category->slug }}"
                            class="service-card relative h-[400px] overflow-hidden shadow-md group transition-all duration-700 ease-in-out hover:scale-105">


                            <!-- Gambar -->
                            @if ($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                    class="w-full h-full object-cover transition-all duration-700 ease-in-out">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-4xl">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif



                            <!-- Kategori -->
                            <div class="absolute top-4 left-4 z-10">
                                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap"
                                    rel="stylesheet">
                                <span class="px-3 py-1 bg-white/90 text-red-800 text-sm font-semibold "
                                    style="font-family: 'Poppins', sans-serif;">
                                    {{ $category->name }}
                                </span>
                            </div>

                            <!-- Konten hover / deskripsi -->
                            <div class="hidden md:flex absolute bottom-0 left-0 w-full h-[45%] z-20 overflow-hidden rounded-b-xl">
                                <div class="service-description translate-y-full group-hover:translate-y-0 transition-all duration-700 ease-in-out bg-white px-4 py-3 h-full flex flex-col justify-between w-full"
                                    style="font-family: 'Poppins', sans-serif;">
                                    <div>
                                        <p class="text-sm md:text-base text-gray-800 line-clamp-2 mb-2 font-bold">
                                            {{ $category->description ?? 'Tidak ada deskripsi.' }}
                                        </p>
                                        <div
                                            class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-red-500 to-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                                        </div>
                                        @if ($category->services->count() > 0)
                                            <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                                                @foreach ($category->services->take(5) as $service)
                                                    <li>{{ $service->title }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="italic text-gray-500 text-sm">Tidak ada layanan.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif









@endsection