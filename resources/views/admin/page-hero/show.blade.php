@extends('layouts.admin')

@section('title', 'Detail Page Hero')

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail Page Hero</h1>
            <p class="mt-1 text-sm text-gray-600">Hero section untuk halaman {{ ucfirst($pageHero->page_identifier) }}</p>
        </div>
        <div class="mt-4 sm:mt-0 flex space-x-3">
            <a href="{{ route('admin.page-hero.edit', $pageHero) }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('admin.page-hero.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="lg:col-span-2">
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Informasi Hero</h3>
                <p class="mt-1 text-sm text-gray-500">Detail lengkap hero section</p>
            </div>
            <div class="px-6 py-4 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Halaman</label>
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                {{ ucfirst($pageHero->page_identifier) }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex items-center">
                            @if($pageHero->is_active)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-1"></i>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                    <i class="fas fa-times mr-1"></i>
                                    Nonaktif
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $pageHero->title }}</p>
                </div>

                @if($pageHero->subtitle)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Subjudul</label>
                    <p class="text-gray-700">{{ $pageHero->subtitle }}</p>
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tinggi Hero</label>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                            {{ $pageHero->height === 'small' ? 'bg-yellow-100 text-yellow-800' : 
                               ($pageHero->height === 'medium' ? 'bg-blue-100 text-blue-800' : 
                               ($pageHero->height === 'large' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800')) }}">
                            {{ ucfirst($pageHero->height) }}
                            @switch($pageHero->height)
                                @case('small')
                                    (40% viewport)
                                    @break
                                @case('medium')
                                    (60% viewport)
                                    @break
                                @case('large')
                                    (80% viewport)
                                    @break
                                @case('fullscreen')
                                    (100% viewport)
                                    @break
                            @endswitch
                        </span>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Perataan Teks</label>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                            {{ ucfirst($pageHero->text_alignment) }}
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Warna Teks</label>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $pageHero->text_color === 'white' ? 'bg-gray-800 text-white' : 'bg-gray-200 text-gray-800' }}">
                            {{ $pageHero->text_color === 'white' ? 'Putih' : 'Gelap' }}
                        </span>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Warna & Opacity Overlay</label>
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 rounded border border-gray-300" style="background-color: {{ $pageHero->background_overlay_color }};"></div>
                            <span class="text-sm text-gray-700">{{ $pageHero->background_overlay_color }} ({{ $pageHero->background_overlay_opacity }}%)</span>
                        </div>
                    </div>
                </div>

                @if($pageHero->cta_primary_text || $pageHero->cta_secondary_text)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-3">Call to Action</label>
                    <div class="space-y-3">
                        @if($pageHero->cta_primary_text)
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-gray-900">CTA Utama</p>
                                    <p class="text-sm text-gray-600">{{ $pageHero->cta_primary_text }}</p>
                                </div>
                                @if($pageHero->cta_primary_url)
                                <a href="{{ $pageHero->cta_primary_url }}" target="_blank" 
                                   class="inline-flex items-center px-3 py-1 border border-blue-300 rounded-md text-sm text-blue-700 hover:bg-blue-50">
                                    <i class="fas fa-external-link-alt mr-1"></i>
                                    Buka
                                </a>
                                @endif
                            </div>
                            @if($pageHero->cta_primary_url)
                            <p class="text-xs text-gray-500 mt-2">{{ $pageHero->cta_primary_url }}</p>
                            @endif
                        </div>
                        @endif

                        @if($pageHero->cta_secondary_text)
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-gray-900">CTA Sekunder</p>
                                    <p class="text-sm text-gray-600">{{ $pageHero->cta_secondary_text }}</p>
                                </div>
                                @if($pageHero->cta_secondary_url)
                                <a href="{{ $pageHero->cta_secondary_url }}" target="_blank" 
                                   class="inline-flex items-center px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 hover:bg-gray-50">
                                    <i class="fas fa-external-link-alt mr-1"></i>
                                    Buka
                                </a>
                                @endif
                            </div>
                            @if($pageHero->cta_secondary_url)
                            <p class="text-xs text-gray-500 mt-2">{{ $pageHero->cta_secondary_url }}</p>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Dibuat</label>
                        <p class="text-sm text-gray-600">{{ $pageHero->created_at->format('d M Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Terakhir Diperbarui</label>
                        <p class="text-sm text-gray-600">{{ $pageHero->updated_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="lg:col-span-1">
        <!-- Background Image -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Background Image</h3>
            </div>
            <div class="p-6">
                @if($pageHero->background_image)
                    <img src="{{ Storage::url($pageHero->background_image) }}" 
                         alt="Background Image" 
                         class="w-full h-40 object-cover rounded-lg">
                    <div class="mt-3 text-center">
                        <a href="{{ Storage::url($pageHero->background_image) }}" target="_blank"
                           class="inline-flex items-center px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-external-link-alt mr-1"></i>
                            Lihat Full Size
                        </a>
                    </div>
                @else
                    <div class="text-center text-gray-500 py-8">
                        <i class="fas fa-image text-4xl mb-3"></i>
                        <p>Tidak ada background image</p>
                        <p class="text-sm">Menggunakan warna overlay saja</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Preview Hero Section -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Preview</h3>
            </div>
            <div class="p-6">
                <div class="relative rounded-lg overflow-hidden" 
                     style="
                        height: 200px; 
                        background-image: url('{{ $pageHero->background_image ? Storage::url($pageHero->background_image) : '' }}');
                        background-size: cover;
                        background-position: center;
                        background-color: #f3f4f6;
                     ">
                    <div class="absolute inset-0" 
                         style="
                            background-color: {{ $pageHero->background_overlay_color }};
                            opacity: {{ $pageHero->background_overlay_opacity / 100 }};
                         "></div>
                    <div class="absolute inset-0 flex items-center {{ $pageHero->text_alignment === 'left' ? 'justify-start pl-6' : ($pageHero->text_alignment === 'right' ? 'justify-end pr-6' : 'justify-center') }}">
                        <div class="text-{{ $pageHero->text_alignment }} px-3" style="color: {{ $pageHero->text_color === 'white' ? '#fff' : '#1f2937' }};">
                            <h4 class="text-xl font-bold mb-2">{{ $pageHero->title }}</h4>
                            @if($pageHero->subtitle)
                                <p class="text-sm opacity-90 mb-4">{{ Str::limit($pageHero->subtitle, 80) }}</p>
                            @endif
                            @if($pageHero->cta_primary_text || $pageHero->cta_secondary_text)
                                <div class="space-x-2">
                                    @if($pageHero->cta_primary_text)
                                        <span class="inline-block px-4 py-2 bg-blue-600 text-white text-sm rounded-lg">
                                            {{ $pageHero->cta_primary_text }}
                                        </span>
                                    @endif
                                    @if($pageHero->cta_secondary_text)
                                        <span class="inline-block px-4 py-2 bg-gray-600 text-white text-sm rounded-lg">
                                            {{ $pageHero->cta_secondary_text }}
                                        </span>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 text-center">
                    <p class="text-xs text-gray-500">Preview dengan tinggi {{ $pageHero->height }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
