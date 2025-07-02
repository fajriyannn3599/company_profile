@extends('layouts.admin')

@section('title', 'Edit SEO Halaman')

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit SEO Halaman</h1>
            <p class="mt-1 text-sm text-gray-600">Edit pengaturan SEO untuk halaman {{ $pageSeo->page_identifier }}</p>
        </div>
        <div class="mt-4 sm:mt-0 flex space-x-3">
            <a href="{{ route('admin.page-seo.show', $pageSeo) }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                <i class="fas fa-eye mr-2"></i>
                Lihat Detail
            </a>
            <a href="{{ route('admin.page-seo.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<form action="{{ route('admin.page-seo.update', $pageSeo) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Form -->
        <div class="lg:col-span-2">
            <!-- Basic Information -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Dasar SEO</h3>
                    <p class="mt-1 text-sm text-gray-500">Pengaturan SEO dasar untuk halaman</p>
                </div>
                <div class="px-6 py-4 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="page_identifier" class="block text-sm font-medium text-gray-700 mb-2">
                                Halaman <span class="text-red-500">*</span>
                            </label>
                            <select name="page_identifier" id="page_identifier" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('page_identifier') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                    required>
                                <option value="">Pilih Halaman</option>
                                @foreach($pages as $key => $value)
                                    <option value="{{ $key }}" {{ old('page_identifier', $pageSeo->page_identifier) == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('page_identifier')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="is_active" class="block text-sm font-medium text-gray-700 mb-2">
                                Status
                            </label>
                            <select name="is_active" id="is_active" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="1" {{ old('is_active', $pageSeo->is_active) == 1 ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('is_active', $pageSeo->is_active) == 0 ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Meta Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" 
                               value="{{ old('title', $pageSeo->title) }}"
                               maxlength="60"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                               placeholder="Masukkan meta title (maksimal 60 karakter)"
                               required>
                        <div class="flex justify-between mt-1">
                            @error('title')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @else
                                <p class="text-sm text-gray-500">Meta title untuk search engine</p>
                            @enderror
                            <span id="title-count" class="text-sm text-gray-400">{{ strlen(old('title', $pageSeo->title)) }}/60</span>
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Meta Description <span class="text-red-500">*</span>
                        </label>
                        <textarea name="description" id="description" rows="3"
                                  maxlength="160"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                  placeholder="Masukkan meta description (maksimal 160 karakter)"
                                  required>{{ old('description', $pageSeo->description) }}</textarea>
                        <div class="flex justify-between mt-1">
                            @error('description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @else
                                <p class="text-sm text-gray-500">Deskripsi yang muncul di hasil pencarian</p>
                            @enderror
                            <span id="description-count" class="text-sm text-gray-400">{{ strlen(old('description', $pageSeo->description)) }}/160</span>
                        </div>
                    </div>

                    <div>
                        <label for="keywords" class="block text-sm font-medium text-gray-700 mb-2">
                            Keywords
                        </label>
                        <input type="text" name="keywords" id="keywords" 
                               value="{{ old('keywords', $pageSeo->keywords) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('keywords') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                               placeholder="kata kunci, pisahkan dengan koma">
                        @error('keywords')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @else
                            <p class="mt-1 text-sm text-gray-500">Pisahkan dengan koma untuk multiple keywords</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Open Graph Settings -->
            <div class="mt-6 bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Open Graph (Facebook)</h3>
                    <p class="mt-1 text-sm text-gray-500">Pengaturan untuk tampilan di media sosial</p>
                </div>
                <div class="px-6 py-4 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="og_title" class="block text-sm font-medium text-gray-700 mb-2">
                                OG Title
                            </label>
                            <input type="text" name="og_title" id="og_title" 
                                   value="{{ old('og_title', $pageSeo->og_title) }}"
                                   maxlength="95"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('og_title') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                   placeholder="Judul untuk Facebook">
                            @error('og_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @endif
                        </div>

                        <div>
                            <label for="og_image" class="block text-sm font-medium text-gray-700 mb-2">
                                OG Image
                            </label>
                            <input type="file" name="og_image" id="og_image" 
                                   accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('og_image') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                            @error('og_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @else
                                <p class="mt-1 text-sm text-gray-500">Ukuran disarankan: 1200x630px</p>
                            @enderror
                            @if($pageSeo->og_image)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($pageSeo->og_image) }}" alt="Current OG Image" class="w-32 h-20 object-cover rounded border">
                                    <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label for="og_description" class="block text-sm font-medium text-gray-700 mb-2">
                            OG Description
                        </label>
                        <textarea name="og_description" id="og_description" rows="3"
                                  maxlength="500"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('og_description') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                  placeholder="Deskripsi untuk Facebook">{{ old('og_description', $pageSeo->og_description) }}</textarea>
                        @error('og_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Twitter Card Settings -->
            <div class="mt-6 bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Twitter Card</h3>
                    <p class="mt-1 text-sm text-gray-500">Pengaturan untuk tampilan di Twitter</p>
                </div>
                <div class="px-6 py-4 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="twitter_title" class="block text-sm font-medium text-gray-700 mb-2">
                                Twitter Title
                            </label>
                            <input type="text" name="twitter_title" id="twitter_title" 
                                   value="{{ old('twitter_title', $pageSeo->twitter_title) }}"
                                   maxlength="70"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('twitter_title') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                   placeholder="Judul untuk Twitter">
                            @error('twitter_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @endif
                        </div>

                        <div>
                            <label for="twitter_image" class="block text-sm font-medium text-gray-700 mb-2">
                                Twitter Image
                            </label>
                            <input type="file" name="twitter_image" id="twitter_image" 
                                   accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('twitter_image') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                            @error('twitter_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @else
                                <p class="mt-1 text-sm text-gray-500">Ukuran disarankan: 1200x675px</p>
                            @enderror
                            @if($pageSeo->twitter_image)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($pageSeo->twitter_image) }}" alt="Current Twitter Image" class="w-32 h-20 object-cover rounded border">
                                    <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <label for="twitter_description" class="block text-sm font-medium text-gray-700 mb-2">
                            Twitter Description
                        </label>
                        <textarea name="twitter_description" id="twitter_description" rows="3"
                                  maxlength="200"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('twitter_description') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                  placeholder="Deskripsi untuk Twitter">{{ old('twitter_description', $pageSeo->twitter_description) }}</textarea>
                        @error('twitter_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Advanced Settings -->
            <div class="mt-6 bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Pengaturan Lanjutan</h3>
                    <p class="mt-1 text-sm text-gray-500">Schema markup dan pengaturan SEO lanjutan</p>
                </div>
                <div class="px-6 py-4 space-y-6">
                    <div>
                        <label for="schema_markup" class="block text-sm font-medium text-gray-700 mb-2">
                            Schema Markup (JSON-LD)
                        </label>
                        <textarea name="schema_markup" id="schema_markup" rows="6"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('schema_markup') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror font-mono text-sm" 
                                  placeholder='{"@context": "https://schema.org", "@type": "WebPage", "name": "Page Name"}'>{{ old('schema_markup', $pageSeo->schema_markup) }}</textarea>
                        @error('schema_markup')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @else
                            <p class="mt-1 text-sm text-gray-500">Opsional: Structured data JSON-LD untuk halaman ini</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="mt-6 flex items-center space-x-4">
                <button type="submit" 
                        class="inline-flex items-center px-6 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-save mr-2"></i>
                    Update SEO
                </button>
                <a href="{{ route('admin.page-seo.index') }}" 
                   class="inline-flex items-center px-6 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- SEO Preview -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg mb-6">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Preview SEO</h3>
                </div>
                <div class="p-6">
                    <!-- Google Preview -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-700 mb-3">Preview Google</h4>
                        <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                            <div id="google-title" class="text-blue-600 text-lg font-medium hover:underline cursor-pointer">
                                {{ $pageSeo->title ?: 'Meta Title' }}
                            </div>
                            <div id="google-url" class="text-green-600 text-sm">
                                {{ url('/') }}/{{ $pageSeo->page_identifier }}
                            </div>
                            <div id="google-description" class="text-gray-600 text-sm mt-1">
                                {{ $pageSeo->description ?: 'Meta description akan muncul di sini...' }}
                            </div>
                        </div>
                    </div>

                    <!-- Facebook Preview -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-700 mb-3">Preview Facebook</h4>
                        <div class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                            <div id="fb-image" class="h-32 bg-gray-200 flex items-center justify-center text-gray-400 text-sm">
                                @if($pageSeo->og_image)
                                    <img src="{{ Storage::url($pageSeo->og_image) }}" class="w-full h-full object-cover" alt="OG Image">
                                @else
                                    Upload gambar untuk preview
                                @endif
                            </div>
                            <div class="p-3">
                                <div id="fb-title" class="font-medium text-gray-900 text-sm">
                                    {{ $pageSeo->og_title ?: $pageSeo->title ?: 'OG Title' }}
                                </div>
                                <div id="fb-description" class="text-gray-500 text-xs mt-1">
                                    {{ $pageSeo->og_description ?: $pageSeo->description ?: 'OG Description...' }}
                                </div>
                                <div class="text-gray-400 text-xs mt-1">{{ parse_url(url('/'), PHP_URL_HOST) }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Tips -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <h4 class="text-sm font-medium text-blue-800 mb-2">
                            <i class="fas fa-lightbulb mr-1"></i>
                            Tips SEO
                        </h4>
                        <ul class="text-xs text-blue-700 space-y-1">
                            <li>• Title 50-60 karakter</li>
                            <li>• Description 150-160 karakter</li>
                            <li>• Gunakan keyword utama</li>
                            <li>• Buat title yang menarik</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character counters
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');
    const titleCount = document.getElementById('title-count');
    const descriptionCount = document.getElementById('description-count');

    // Preview elements
    const googleTitle = document.getElementById('google-title');
    const googleDescription = document.getElementById('google-description');
    const fbTitle = document.getElementById('fb-title');
    const fbDescription = document.getElementById('fb-description');

    // Update character counters
    titleInput.addEventListener('input', function() {
        const count = this.value.length;
        titleCount.textContent = `${count}/60`;
        titleCount.className = count > 60 ? 'text-sm text-red-400' : 'text-sm text-gray-400';
        
        // Update preview
        googleTitle.textContent = this.value || 'Meta Title';
    });

    descriptionInput.addEventListener('input', function() {
        const count = this.value.length;
        descriptionCount.textContent = `${count}/160`;
        descriptionCount.className = count > 160 ? 'text-sm text-red-400' : 'text-sm text-gray-400';
        
        // Update preview
        googleDescription.textContent = this.value || 'Meta description akan muncul di sini...';
    });

    // OG Title and Description
    const ogTitleInput = document.getElementById('og_title');
    const ogDescriptionInput = document.getElementById('og_description');

    ogTitleInput.addEventListener('input', function() {
        fbTitle.textContent = this.value || titleInput.value || 'OG Title';
    });

    ogDescriptionInput.addEventListener('input', function() {
        fbDescription.textContent = this.value || descriptionInput.value || 'OG Description...';
    });

    // Image preview
    const ogImageInput = document.getElementById('og_image');
    const fbImage = document.getElementById('fb-image');

    ogImageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                fbImage.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover" alt="Preview">`;
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endpush
@endsection
