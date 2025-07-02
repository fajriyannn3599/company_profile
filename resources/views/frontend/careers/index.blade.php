@extends('layouts.frontend')

@push('seo')
    <x-seo-head page-identifier="careers" :title="page_title('careers', 'Karier - ' . setting('company_name'))" :description="page_description(
        'careers',
        'Bergabunglah dengan tim ' .
            setting('company_name') .
            '. Temukan peluang karier terbaik dan kembangkan potensi Anda bersama kami.',
    )" />
@endpush

@section('content')
    <!-- Hero Section -->
    <x-hero page-identifier="careers" fallback-title="Karier di {{ setting('company_name') }}"
        fallback-subtitle="Bergabunglah dengan tim yang passionate, inovatif, dan berkomitmen untuk menciptakan masa depan yang lebih baik" />
    <div class="bg-white rounded-2xl shadow-lg p-6 max-w-2xl mx-auto mt-8">
        <form method="GET" action="{{ route('careers.index') }}" class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari posisi..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="sm:w-48">
                <select name="location"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Lokasi</option>
                    <option value="jakarta" {{ request('location') == 'jakarta' ? 'selected' : '' }}>Jakarta</option>
                    <option value="bandung" {{ request('location') == 'bandung' ? 'selected' : '' }}>Bandung</option>
                    <option value="surabaya" {{ request('location') == 'surabaya' ? 'selected' : '' }}>Surabaya</option>
                    <option value="remote" {{ request('location') == 'remote' ? 'selected' : '' }}>Remote</option>
                </select>
            </div>
            <div class="sm:w-48">
                <select name="type"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Semua Jenis</option>
                    <option value="full-time" {{ request('type') == 'full-time' ? 'selected' : '' }}>Full Time</option>
                    <option value="part-time" {{ request('type') == 'part-time' ? 'selected' : '' }}>Part Time</option>
                    <option value="contract" {{ request('type') == 'contract' ? 'selected' : '' }}>Contract</option>
                    <option value="internship" {{ request('type') == 'internship' ? 'selected' : '' }}>Internship</option>
                </select>
            </div>
            <button type="submit"
                class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-colors font-medium">
                Cari
            </button>
        </form>
    </div>  

    <!-- Why Join Us -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Mengapa Bergabung dengan Kami?
                    </h2>
                    <p class="text-xl text-gray-600">
                        Kami menawarkan lingkungan kerja yang mendukung pertumbuhan dan pengembangan karier Anda
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Inovasi Berkelanjutan</h3>
                        <p class="text-gray-600">
                            Bekerja dengan teknologi terdepan dan berkontribusi pada proyek-proyek yang mengubah industri
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Pengembangan Karier</h3>
                        <p class="text-gray-600">
                            Program pelatihan berkelanjutan dan jalur karier yang jelas untuk mendukung pertumbuhan Anda
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Tim yang Solid</h3>
                        <p class="text-gray-600">
                            Bekerja bersama tim yang kolaboratif, supportif, dan berpengalaman di berbagai bidang
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Benefit Menarik</h3>
                        <p class="text-gray-600">
                            Kompensasi kompetitif, asuransi kesehatan, dan berbagai tunjangan menarik lainnya
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Work-Life Balance</h3>
                        <p class="text-gray-600">
                            Fleksibilitas waktu kerja dan budaya kerja yang mendukung keseimbangan hidup yang sehat
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Remote Friendly</h3>
                        <p class="text-gray-600">
                            Dukungan penuh untuk kerja remote dan hybrid, dengan tools dan infrastruktur terbaik
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Job Listings -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Posisi Terbuka</h2>
                        @if (request('search') || request('location') || request('type'))
                            <p class="text-gray-600">
                                {{ $jobs->total() }} posisi ditemukan
                                @if (request('search'))
                                    untuk "{{ request('search') }}"
                                @endif
                                @if (request('location'))
                                    di {{ ucfirst(request('location')) }}
                                @endif
                                @if (request('type'))
                                    dengan jenis {{ ucfirst(str_replace('-', ' ', request('type'))) }}
                                @endif
                            </p>
                        @else
                            <p class="text-gray-600">{{ $jobs->total() }} posisi tersedia</p>
                        @endif
                    </div>

                    @if (request()->hasAny(['search', 'location', 'type']))
                        <a href="{{ route('careers.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            Reset Filter
                        </a>
                    @endif
                </div>

                @if ($jobs->count() > 0)
                    <div class="space-y-6">
                        @foreach ($jobs as $job)
                            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-4 mb-4">
                                            <h3
                                                class="text-2xl font-bold text-gray-900 hover:text-blue-600 transition-colors">
                                                <a href="{{ route('careers.show', $job->slug) }}">
                                                    {{ $job->title }}
                                                </a>
                                            </h3>
                                            <span
                                                class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                                                {{ ucfirst(str_replace('-', ' ', $job->type)) }}
                                            </span>
                                        </div>

                                        <p class="text-gray-600 mb-4 line-clamp-2">
                                            {{ $job->description }}
                                        </p>

                                        <div class="flex flex-wrap items-center gap-6 text-sm text-gray-600">
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <span>{{ $job->location }}</span>
                                            </div>

                                            @if ($job->salary_range)
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                                    </svg>
                                                    <span>{{ $job->salary_range }}</span>
                                                </div>
                                            @endif

                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                <span>Deadline: {{ $job->deadline->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                        <!-- Requirements Preview -->
                                        @if ($job->requirements && is_array($job->requirements) && count($job->requirements) > 0)
                                            <div class="mt-4">
                                                <div class="flex flex-wrap gap-2">
                                                    @foreach (array_slice($job->requirements, 0, 3) as $requirement)
                                                        <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-sm">
                                                            {{ trim($requirement) }}
                                                        </span>
                                                    @endforeach
                                                    @if (count($job->requirements) > 3)
                                                        <span class="text-gray-500 text-sm">
                                                            +{{ count($job->requirements) - 3 }} lainnya
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mt-6 lg:mt-0 lg:ml-8 flex flex-col sm:flex-row lg:flex-col gap-3">
                                        <a href="{{ route('careers.show', $job->slug) }}"
                                            class="bg-blue-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-blue-700 transition-colors text-center">
                                            Lihat Detail
                                        </a>
                                        <a href="{{ route('careers.apply', $job->slug) }}"
                                            class="border-2 border-blue-600 text-blue-600 px-6 py-3 rounded-xl font-medium hover:bg-blue-600 hover:text-white transition-colors text-center">
                                            Lamar Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    @if ($jobs->hasPages())
                        <div class="mt-12">
                            {{ $jobs->links('pagination::tailwind') }}
                        </div>
                    @endif
                @else
                    <div class="text-center py-16">
                        <div class="max-w-md mx-auto">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 01-2 2H10a2 2 0 01-2-2V6m8 0H8" />
                            </svg>
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Tidak Ada Posisi Tersedia</h3>
                            <p class="text-gray-600 mb-6">
                                Maaf, saat ini tidak ada posisi yang sesuai dengan kriteria pencarian Anda.
                                Coba ubah filter atau kembali lagi nanti.
                            </p>
                            <a href="{{ route('careers.index') }}"
                                class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-blue-700 transition-colors">
                                Lihat Semua Posisi
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Tidak Menemukan Posisi yang Sesuai?
                </h2>
                <p class="text-xl text-blue-100 mb-8">
                    Kirimkan CV Anda kepada kami. Kami akan menghubungi Anda ketika ada posisi yang sesuai
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}"
                        class="bg-white text-blue-600 px-8 py-3 rounded-xl font-medium hover:bg-gray-100 transition-colors">
                        Kirim CV Spontan
                    </a>
                    <a href="{{ route('about') }}"
                        class="border-2 border-white text-white px-8 py-3 rounded-xl font-medium hover:bg-white hover:text-blue-600 transition-colors">
                        Pelajari Tentang Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
