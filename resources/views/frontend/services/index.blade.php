@extends('layouts.frontend')

@push('seo')
    <x-seo-head page-identifier="services" :title="page_title('services', 'Layanan Kami - ' . setting('site_name'))"
        :description="page_description('services', 'Jelajahi berbagai layanan profesional yang kami tawarkan untuk mengembangkan bisnis Anda dengan teknologi terdepan.')" />
@endpush

@push('styles')
    <style>
        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .service-grid-animation {
            opacity: 0;
            animation: slideUp 0.7s ease-out forwards;
        }

        /* Delay animasi berdasarkan indeks */
        .service-grid-animation:nth-child(1) {
            animation-delay: 0.1s;
        }

        .service-grid-animation:nth-child(2) {
            animation-delay: 0.2s;
        }

        .service-grid-animation:nth-child(3) {
            animation-delay: 0.3s;
        }

        .service-grid-animation:nth-child(4) {
            animation-delay: 0.4s;
        }

        .service-grid-animation:nth-child(5) {
            animation-delay: 0.5s;
        }

        .service-grid-animation:nth-child(6) {
            animation-delay: 0.6s;
        }

        /* Agar hover tetap aktif di PC */
        @media (hover: hover) {
            .service-grid-animation:hover {
                transform: translateY(-4px);
                transition: transform 0.3s ease;
            }
        }

        .floating-element {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .gradient-background {
            background: linear-gradient(135deg, #667eea 0%, #F8D94E 100%);
        }
    </style>
@endpush

@section('content')
    <section class="py-20 bg-gradient-to-br from-gray-50 via-blue-50 to-indigo-50 relative overflow-hidden">
        <!-- Background Decorations -->
        <div
            class="absolute top-20 left-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 floating-element">
        </div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 floating-element"
            style="animation-delay: -3s;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            @if($service_categories->count() > 0)
                <!-- Section Header -->
                <div class="text-center mb-auto">
                    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                    <span
                        class="inline-block px-4 py-2 bg-white/80 text-yellow-600 rounded-full text-sm font-semibold mb-4 shadow-md backdrop-blur-sm"
                        style="font-family: 'Poppins', sans-serif;" >
                        🚀 Produk Profesional
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                        Solusi <span
                            class="bg-gradient-to-r from-yellow-400 to-yellow-600 bg-clip-text text-transparent">Teknologi</span>
                        Terdepan
                    </h2>

                    @if (request('search') || request('servicecategory'))
                        <p
                            class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed transition-opacity duration-500 ease-in-out">
                            Menampilkan layanan berdasarkan hasil pencarian dan kategori pilihan Anda.
                        </p>
                    @else
                        <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                            Kami menyediakan berbagai layanan teknologi profesional yang dirancang khusus untuk memenuhi kebutuhan
                            bisnis modern Anda
                        </p>
                    @endif

                    <div class="w-24 h-1 bg-gradient-to-r from-yellow-600 to-red-300 rounded-full mx-auto mt-8"></div>
                </div>
            @endif

            <!-- Search & Filter Section -->
            <div class="py-12 bg-gray-50">
                <div class="container mx-auto px-4">
                    <div class="max-w-4xl mx-auto">
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <form method="GET" action="{{ route('services.index') }}"
                                class="flex flex-col sm:flex-row gap-4">
                                <div class="flex-1">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Cari layanan..."
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                                        style="font-family: 'Poppins', sans-serif;">
                                </div>
                                <div class="sm:w-48">
                                    <select name="servicecategory"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                                        style="font-family: 'Poppins', sans-serif;">
                                        <option value="">Semua Kategori</option>
                                        @foreach($service_categories as $service_category)
                                            <option value="{{ $service_category->slug }}" {{ request('servicecategory') == $service_category->slug ? 'selected' : '' }}>
                                                {{ $service_category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                <button type="submit"
                                    class="bg-orange-600 text-white px-6 py-3 rounded-xl hover:bg-yellow-600 transition-colors font-medium" style="font-family: 'Poppins', sans-serif;">
                                    Cari
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Result -->
            <div class="max-w-6xl mx-auto">
                @if ($services->count() > 0)
                    @if (request('search') || request('servicecategory'))
                        <div class="mb-8">
                            <div class="flex items-center justify-between">
                                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
                                <h2 class="text-2xl font-bold text-gray-900"
                                    style="font-family: 'Poppins', sans-serif;">
                                    Hasil Pencarian
                                    @if (request('search'))
                                        untuk "{{ request('search') }}"
                                    @endif
                                    @if (request('servicecategory'))
                                        dalam kategori
                                        "{{ $service_categories->where('slug', request('servicecategory'))->first()->name ?? request('servicecategory') }}"
                                    @endif
                                </h2>
                                <span class="text-gray-600">{{ $services->total() }} produk ditemukan</span>
                            </div>
                        </div>
                    @endif

                    <!-- Services Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                        @foreach($services as $index => $service)
                            <div class="service-grid-animation">
                                <x-service-card :service="$service" variant="featured" />
                            </div>
                        @endforeach
                    </div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        @foreach($service_categories as $category)
                            @if($category->services->count() > 0)
                                <!-- Kategori Header -->
                                <div class="mb-6 mt-12">
                                    <h2 class="text-2xl font-bold text-gray-800 border-b pb-2 border-yellow-400">
                                        {{ $category->name }}
                                    </h2>
                                </div>

                                <!-- Layanan Grid -->
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                    @foreach($category->services as $index => $service)
                                        <div class="service-grid-animation" style="animation-delay: {{ ($index % 6) * 0.1 }}s;">
                                            <x-service-card :service="$service" variant="featured" />
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    @if($services->hasPages())
                        <div class="flex justify-center">
                            <div class="bg-white shadow-lg p-6">
                                {{ $services->links() }}
                            </div>
                        </div>
                    @endif
                @else
                    <div class="text-center py-16">
                        <div class="max-w-md mx-auto">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Layanan Tidak Ditemukan</h3>
                            <p class="text-gray-600 mb-6">
                                Maaf, tidak ada layanan yang sesuai dengan pencarian Anda.
                                Coba gunakan kata kunci yang berbeda.
                            </p>
                            <a href="{{ route('services.index') }}"
                                class="inline-flex items-center bg-blue-600 text-white px-6 py-3 font-medium hover:bg-blue-700 transition-colors">
                                Lihat Semua Layanan
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection