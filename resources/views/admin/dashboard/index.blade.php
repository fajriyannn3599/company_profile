@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name }}!</h1>
                <p class="text-blue-100 mt-1">Panel administrasi website company profile</p>
            </div>
            <div class="text-right">
                <p class="text-blue-100 text-sm">{{ now()->translatedFormat('l, d F Y') }}</p>
                <p class="text-blue-100 text-sm">{{ now()->format('H:i') }} WIB</p>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Services Card -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Layanan</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['services'] ?? 0 }}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-cogs text-blue-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.services.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    Kelola Layanan →
                </a>
            </div>
        </div>

        <!-- Projects Card -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Proyek</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['projects'] ?? 0 }}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-project-diagram text-green-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.projects.index') }}" class="text-green-600 hover:text-green-800 text-sm font-medium">
                    Kelola Proyek →
                </a>
            </div>
        </div>

        <!-- Articles Card -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Artikel</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['articles'] ?? 0 }}</p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full">
                    <i class="fas fa-newspaper text-yellow-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.articles.index') }}" class="text-yellow-600 hover:text-yellow-800 text-sm font-medium">
                    Kelola Artikel →
                </a>
            </div>
        </div>

        <!-- Messages Card -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Pesan Baru</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['messages'] ?? 0 }}</p>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="fas fa-envelope text-red-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.messages.index') }}" class="text-red-600 hover:text-red-800 text-sm font-medium">
                    Lihat Pesan →
                </a>
            </div>
        </div>
    </div>

    <!-- Secondary Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Teams Card -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Anggota Tim</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['teams'] ?? 0 }}</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <i class="fas fa-users text-purple-600"></i>
                </div>
            </div>
        </div>

        <!-- Testimonials Card -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Testimoni</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['testimonials'] ?? 0 }}</p>
                </div>
                <div class="bg-indigo-100 p-3 rounded-full">
                    <i class="fas fa-quote-right text-indigo-600"></i>
                </div>
            </div>
        </div>

        <!-- Job Applications Card -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Lamaran Kerja</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['job_applications'] ?? 0 }}</p>
                </div>
                <div class="bg-teal-100 p-3 rounded-full">
                    <i class="fas fa-file-alt text-teal-600"></i>
                </div>
            </div>
        </div>

        <!-- Active Jobs Card -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Lowongan Aktif</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['active_jobs'] ?? 0 }}</p>
                </div>
                <div class="bg-orange-100 p-3 rounded-full">
                    <i class="fas fa-briefcase text-orange-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Messages -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">
                        <i class="fas fa-envelope mr-2 text-red-600"></i>
                        Pesan Terbaru
                    </h3>
                    <a href="{{ route('admin.messages.index') }}" class="text-sm text-blue-600 hover:text-blue-800">
                        Lihat Semua
                    </a>
                </div>
            </div>
            <div class="p-6">
                @if(isset($recent['messages']) && $recent['messages']->count() > 0)
                    <div class="space-y-4">
                        @foreach($recent['messages'] as $message)
                            <div class="flex items-start space-x-3 p-3 rounded-lg {{ !$message->is_read ? 'bg-blue-50' : 'bg-gray-50' }}">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-red-600 text-sm"></i>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">{{ $message->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $message->email }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $message->created_at->diffForHumans() }}</p>
                                </div>
                                @if(!$message->is_read)
                                    <div class="flex-shrink-0">
                                        <span class="inline-block w-2 h-2 bg-blue-600 rounded-full"></span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-inbox text-gray-400 text-4xl mb-4"></i>
                        <p class="text-gray-500">Belum ada pesan</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Recent Articles -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">
                        <i class="fas fa-newspaper mr-2 text-yellow-600"></i>
                        Artikel Terbaru
                    </h3>
                    <a href="{{ route('admin.articles.index') }}" class="text-sm text-blue-600 hover:text-blue-800">
                        Lihat Semua
                    </a>
                </div>
            </div>
            <div class="p-6">
                @if(isset($recent['articles']) && $recent['articles']->count() > 0)
                    <div class="space-y-4">
                        @foreach($recent['articles'] as $article)
                            <div class="flex items-start space-x-3 p-3 rounded-lg bg-gray-50">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-file-alt text-yellow-600 text-sm"></i>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">{{ $article->title }}</p>
                                    <p class="text-xs text-gray-500 mt-1">{{ $article->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $article->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ $article->is_published ? 'Published' : 'Draft' }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-newspaper text-gray-400 text-4xl mb-4"></i>
                        <p class="text-gray-500">Belum ada artikel</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">
            <i class="fas fa-bolt mr-2 text-blue-600"></i>
            Aksi Cepat
        </h3>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <a href="{{ route('admin.services.create') }}" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-blue-50 transition duration-200">
                <i class="fas fa-plus-circle text-blue-600 text-2xl mb-2"></i>
                <span class="text-sm font-medium text-gray-700">Tambah Layanan</span>
            </a>
            <a href="{{ route('admin.projects.create') }}" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-green-50 transition duration-200">
                <i class="fas fa-project-diagram text-green-600 text-2xl mb-2"></i>
                <span class="text-sm font-medium text-gray-700">Tambah Proyek</span>
            </a>
            <a href="{{ route('admin.articles.create') }}" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-yellow-50 transition duration-200">
                <i class="fas fa-edit text-yellow-600 text-2xl mb-2"></i>
                <span class="text-sm font-medium text-gray-700">Tulis Artikel</span>
            </a>
            <a href="{{ route('admin.teams.create') }}" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-purple-50 transition duration-200">
                <i class="fas fa-user-plus text-purple-600 text-2xl mb-2"></i>
                <span class="text-sm font-medium text-gray-700">Tambah Tim</span>
            </a>
            <a href="{{ route('admin.settings.index') }}" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition duration-200">
                <i class="fas fa-cog text-gray-600 text-2xl mb-2"></i>
                <span class="text-sm font-medium text-gray-700">Pengaturan</span>
            </a>
            <a href="{{ route('admin.page-seo.index') }}" class="flex flex-col items-center p-4 border border-gray-200 rounded-lg hover:bg-indigo-50 transition duration-200">
                <i class="fas fa-search text-indigo-600 text-2xl mb-2"></i>
                <span class="text-sm font-medium text-gray-700">SEO</span>
            </a>
        </div>
    </div>
</div>
@endsection
