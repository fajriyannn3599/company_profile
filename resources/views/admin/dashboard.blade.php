@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Ringkasan data dan statistik website')

@section('content')
<div class="space-y-8">
    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl shadow-xl p-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h1>
                <p class="text-blue-100">Kelola konten website perusahaan Anda dengan mudah</p>
            </div>
            <div class="hidden md:block">
                <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                    <i class="fas fa-crown text-4xl text-white"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Statistics Cards (rapi, tidak duplikat) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Services -->
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Total Layanan</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $stats['services'] }}</p>
                    <p class="text-sm text-blue-600 mt-1">
                        <i class="fas fa-cogs mr-1"></i>Layanan aktif
                    </p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-cogs text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        <!-- Projects -->
        <!-- <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Total Proyek</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $stats['projects'] }}</p>
                    <p class="text-sm text-green-600 mt-1">
                        <i class="fas fa-folder mr-1"></i>Portofolio
                    </p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-folder text-green-600 text-xl"></i>
                </div>
            </div>
        </div> -->
        <!-- Articles -->
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Total Artikel</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $stats['articles'] }}</p>
                    <p class="text-sm text-purple-600 mt-1">
                        <i class="fas fa-newspaper mr-1"></i>Konten blog
                    </p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-newspaper text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
        <!-- Messages -->
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">Pesan Baru</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $stats['messages'] }}</p>
                    <p class="text-sm text-orange-600 mt-1">
                        <i class="fas fa-envelope mr-1"></i>Belum dibaca
                    </p>
                </div>
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-envelope text-orange-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity & Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Activity -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-clock mr-2 text-gray-500"></i>
                    Aktivitas Terkini
                </h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-plus text-blue-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-800">Layanan baru "Web Development" ditambahkan</p>
                            <p class="text-xs text-gray-500 mt-1">2 jam yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-edit text-green-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-800">Artikel "Tips SEO" diperbarui</p>
                            <p class="text-xs text-gray-500 mt-1">5 jam yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-envelope text-purple-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-800">Pesan baru diterima dari John Doe</p>
                            <p class="text-xs text-gray-500 mt-1">1 hari yang lalu</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fas fa-star text-yellow-600 text-xs"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-800">Testimoni baru dari PT. ABC</p>
                            <p class="text-xs text-gray-500 mt-1">2 hari yang lalu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-bolt mr-2 text-gray-500"></i>
                    Aksi Cepat
                </h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('admin.services.create') }}" 
                       class="p-4 border-2 border-dashed border-blue-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-colors group">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-2 group-hover:bg-blue-200 transition-colors">
                                <i class="fas fa-plus text-blue-600 text-lg"></i>
                            </div>
                            <p class="text-sm font-medium text-gray-700">Tambah Layanan</p>
                        </div>
                    </a>
                    <a href="{{ route('admin.projects.create') }}" 
                       class="p-4 border-2 border-dashed border-green-300 rounded-lg hover:border-green-500 hover:bg-green-50 transition-colors group">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-2 group-hover:bg-green-200 transition-colors">
                                <i class="fas fa-folder-plus text-green-600 text-lg"></i>
                            </div>
                            <p class="text-sm font-medium text-gray-700">Tambah Proyek</p>
                        </div>
                    </a>
                    <a href="{{ route('admin.articles.create') }}" 
                       class="p-4 border-2 border-dashed border-purple-300 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition-colors group">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-2 group-hover:bg-purple-200 transition-colors">
                                <i class="fas fa-pen text-purple-600 text-lg"></i>
                            </div>
                            <p class="text-sm font-medium text-gray-700">Tulis Artikel</p>
                        </div>
                    </a>
                    <a href="{{ route('admin.messages.index') }}" 
                       class="p-4 border-2 border-dashed border-red-300 rounded-lg hover:border-red-500 hover:bg-red-50 transition-colors group">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mx-auto mb-2 group-hover:bg-red-200 transition-colors">
                                <i class="fas fa-inbox text-red-600 text-lg"></i>
                            </div>
                            <p class="text-sm font-medium text-gray-700">Lihat Pesan</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-chart-line mr-2 text-gray-500"></i>
                Statistik Kunjungan Website
            </h3>
        </div>
        <div class="p-6">
            <div class="h-64 bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-chart-bar text-4xl text-gray-400 mb-4"></i>
                    <p class="text-gray-600">Grafik statistik akan ditampilkan di sini</p>
                    <p class="text-sm text-gray-500 mt-2">Integrasi dengan Google Analytics</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Dashboard interactive features
    document.addEventListener('DOMContentLoaded', function() {
        // Add any dashboard-specific JavaScript here
        console.log('Dashboard loaded successfully');
    });
</script>
@endpush
