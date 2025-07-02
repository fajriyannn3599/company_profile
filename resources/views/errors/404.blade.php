@extends('layouts.frontend')

@section('title', 'Halaman Tidak Ditemukan - ' . setting('company_name'))
@section('meta_description', 'Halaman yang Anda cari tidak ditemukan. Kembali ke beranda atau jelajahi halaman lain di ' . setting('company_name'))

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <!-- 404 Illustration -->
            <div class="mb-8">
                <div class="relative">
                    <h1 class="text-9xl font-bold text-blue-200 select-none">404</h1>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-24 h-24 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Error Message -->
            <div class="mb-8">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Oops! Halaman Tidak Ditemukan
                </h2>
                <p class="text-xl text-gray-600 mb-6 leading-relaxed">
                    Halaman yang Anda cari mungkin telah dipindahkan, dihapus, atau tidak pernah ada. 
                    Jangan khawatir, mari kita bantu Anda menemukan yang Anda butuhkan.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="mb-12">
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" 
                       class="bg-blue-600 text-white px-8 py-3 rounded-xl font-medium hover:bg-blue-700 transition-colors">
                        Kembali ke Beranda
                    </a>
                    <button onclick="history.back()" 
                            class="border-2 border-blue-600 text-blue-600 px-8 py-3 rounded-xl font-medium hover:bg-blue-600 hover:text-white transition-colors">
                        Halaman Sebelumnya
                    </button>
                </div>
            </div>

            <!-- Search -->
            <div class="mb-12">
                <div class="bg-white rounded-2xl shadow-lg p-6 max-w-lg mx-auto">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Cari yang Anda Butuhkan</h3>
                    <form method="GET" action="{{ route('articles.index') }}" class="flex gap-3">
                        <input type="text" 
                               name="search" 
                               placeholder="Cari artikel, layanan, atau informasi..."
                               class="flex-1 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button type="submit" 
                                class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 transition-colors">
                            Cari
                        </button>
                    </form>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl mx-auto">
                <a href="{{ route('about') }}" 
                   class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300 text-center group">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-blue-200 transition-colors">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-1">Tentang Kami</h4>
                    <p class="text-sm text-gray-600">Pelajari lebih lanjut</p>
                </a>

                <a href="{{ route('services.index') }}" 
                   class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300 text-center group">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-green-200 transition-colors">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0H8m8 0v2a2 2 0 01-2 2H10a2 2 0 01-2-2V6m8 0H8"/>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-1">Layanan</h4>
                    <p class="text-sm text-gray-600">Jelajahi layanan</p>
                </a>

                <a href="{{ route('projects.index') }}" 
                   class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300 text-center group">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-purple-200 transition-colors">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-1">Portfolio</h4>
                    <p class="text-sm text-gray-600">Lihat karya kami</p>
                </a>

                <a href="{{ route('contact') }}" 
                   class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300 text-center group">
                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-yellow-200 transition-colors">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-900 mb-1">Kontak</h4>
                    <p class="text-sm text-gray-600">Hubungi kami</p>
                </a>
            </div>

            <!-- Help Text -->
            <div class="mt-12 text-sm text-gray-500">
                <p>
                    Masih tidak menemukan yang Anda cari? 
                    <a href="{{ route('contact') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                        Hubungi tim support kami
                    </a>
                    untuk bantuan lebih lanjut.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
