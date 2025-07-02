@extends('layouts.admin')

@section('title', 'Tambah Page Hero')

@section('content')
<div class="mb-6">
    <div class="flex items-center">
        <a href="{{ route('admin.page-heroes.index') }}" class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out mr-4">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Tambah Page Hero</h1>
            <p class="mt-1 text-sm text-gray-600">Buat hero section baru untuk halaman website</p>
        </div>
    </div>
</div>

<form action="{{ route('admin.page-heroes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Dasar</h3>
                <div class="space-y-4">
                    <div>
                        <label for="page_identifier" class="block text-sm font-medium text-gray-700 mb-2">Halaman <span class="text-red-500">*</span></label>
                        <select name="page_identifier" id="page_identifier" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('page_identifier') border-red-500 @enderror" required>
                            <option value="">Pilih Halaman</option>
                            @foreach(App\Models\PageHero::getPageIdentifierOptions() as $key => $label)
                                <option value="{{ $key }}" {{ old('page_identifier') == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('page_identifier')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror" placeholder="Masukkan judul hero" required>
                        @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    
                    <div>
                        <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <textarea name="subtitle" id="subtitle" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('subtitle') border-red-500 @enderror" placeholder="Masukkan subtitle hero">{{ old('subtitle') }}</textarea>
                        @error('subtitle')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            
            <!-- CTA Buttons -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Call-to-Action Buttons</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <h4 class="font-medium text-gray-800">Primary Button</h4>
                        <div>
                            <label for="cta_primary_text" class="block text-sm font-medium text-gray-700 mb-2">Text Button</label>
                            <input type="text" name="cta_primary_text" id="cta_primary_text" value="{{ old('cta_primary_text') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('cta_primary_text') border-red-500 @enderror" placeholder="Contoh: Hubungi Kami">
                            @error('cta_primary_text')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="cta_primary_url" class="block text-sm font-medium text-gray-700 mb-2">URL Button</label>
                            <input type="text" name="cta_primary_url" id="cta_primary_url" value="{{ old('cta_primary_url') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('cta_primary_url') border-red-500 @enderror" placeholder="/contact">
                            @error('cta_primary_url')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <h4 class="font-medium text-gray-800">Secondary Button</h4>
                        <div>
                            <label for="cta_secondary_text" class="block text-sm font-medium text-gray-700 mb-2">Text Button</label>
                            <input type="text" name="cta_secondary_text" id="cta_secondary_text" value="{{ old('cta_secondary_text') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('cta_secondary_text') border-red-500 @enderror" placeholder="Contoh: Lihat Portfolio">
                            @error('cta_secondary_text')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="cta_secondary_url" class="block text-sm font-medium text-gray-700 mb-2">URL Button</label>
                            <input type="text" name="cta_secondary_url" id="cta_secondary_url" value="{{ old('cta_secondary_url') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('cta_secondary_url') border-red-500 @enderror" placeholder="/projects">
                            @error('cta_secondary_url')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Background & Design -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Background & Design</h3>
                <div class="space-y-4">
                    <div>
                        <label for="background_image" class="block text-sm font-medium text-gray-700 mb-2">Background Image</label>
                        <input type="file" name="background_image" id="background_image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        @error('background_image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    
                    <div>
                        <label for="background_overlay_color" class="block text-sm font-medium text-gray-700 mb-2">Overlay Color</label>
                        <input type="color" name="background_overlay_color" id="background_overlay_color" value="{{ old('background_overlay_color', '#000000') }}" class="w-full h-10 border border-gray-300 rounded-lg @error('background_overlay_color') border-red-500 @enderror">
                        @error('background_overlay_color')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    
                    <div>
                        <label for="background_overlay_opacity" class="block text-sm font-medium text-gray-700 mb-2">Overlay Opacity (%)</label>
                        <input type="range" name="background_overlay_opacity" id="background_overlay_opacity" min="0" max="100" value="{{ old('background_overlay_opacity', 50) }}" class="w-full">
                        <div class="flex justify-between text-xs text-gray-500 mt-1">
                            <span>0%</span>
                            <span id="opacity-value">50%</span>
                            <span>100%</span>
                        </div>
                        @error('background_overlay_opacity')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    
                    <div>
                        <label for="height" class="block text-sm font-medium text-gray-700 mb-2">Height</label>
                        <select name="height" id="height" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('height') border-red-500 @enderror" required>
                            @foreach(App\Models\PageHero::getHeightOptions() as $key => $label)
                                <option value="{{ $key }}" {{ old('height', 'large') == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('height')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            
            <!-- Text Settings -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Text Settings</h3>
                <div class="space-y-4">
                    <div>
                        <label for="text_color" class="block text-sm font-medium text-gray-700 mb-2">Text Color</label>
                        <select name="text_color" id="text_color" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('text_color') border-red-500 @enderror" required>
                            @foreach(App\Models\PageHero::getTextColorOptions() as $key => $label)
                                <option value="{{ $key }}" {{ old('text_color', 'white') == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('text_color')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    
                    <div>
                        <label for="text_alignment" class="block text-sm font-medium text-gray-700 mb-2">Text Alignment</label>
                        <select name="text_alignment" id="text_alignment" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('text_alignment') border-red-500 @enderror" required>
                            @foreach(App\Models\PageHero::getTextAlignmentOptions() as $key => $label)
                                <option value="{{ $key }}" {{ old('text_alignment', 'center') == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('text_alignment')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            
            <!-- Status -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Status</h3>
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-700">Aktifkan Hero</label>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <div class="flex flex-col space-y-3">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Page Hero
                    </button>
                    <a href="{{ route('admin.page-heroes.index') }}" class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    document.getElementById('background_overlay_opacity').addEventListener('input', function(e) {
        document.getElementById('opacity-value').textContent = e.target.value + '%';
    });
</script>
@endsection
