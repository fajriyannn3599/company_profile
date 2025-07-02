@extends('layouts.admin')

@section('title', 'Tambah Page Hero')

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Tambah Page Hero</h1>
            <p class="mt-1 text-sm text-gray-600">Buat hero section baru untuk halaman website</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('admin.page-hero.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<form action="{{ route('admin.page-hero.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Form -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Hero</h3>
                    <p class="mt-1 text-sm text-gray-500">Lengkapi informasi dasar hero section</p>
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
                                    <option value="{{ $key }}" {{ old('page_identifier') == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('page_identifier')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="height" class="block text-sm font-medium text-gray-700 mb-2">
                                Tinggi Hero <span class="text-red-500">*</span>
                            </label>
                            <select name="height" id="height" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('height') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                    required>
                                <option value="">Pilih Tinggi</option>
                                <option value="small" {{ old('height') == 'small' ? 'selected' : '' }}>Small (40% viewport)</option>
                                <option value="medium" {{ old('height') == 'medium' ? 'selected' : '' }}>Medium (60% viewport)</option>
                                <option value="large" {{ old('height', 'large') == 'large' ? 'selected' : '' }}>Large (80% viewport)</option>
                                <option value="fullscreen" {{ old('height') == 'fullscreen' ? 'selected' : '' }}>Fullscreen</option>
                            </select>
                            @error('height')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" 
                               value="{{ old('title') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                               placeholder="Masukkan judul hero"
                               required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">
                            Subjudul
                        </label>
                        <textarea name="subtitle" id="subtitle" rows="3"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('subtitle') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                  placeholder="Masukkan subjudul (opsional)">{{ old('subtitle') }}</textarea>
                        @error('subtitle')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="background_image" class="block text-sm font-medium text-gray-700 mb-2">
                            Background Image
                        </label>
                        <input type="file" name="background_image" id="background_image" 
                               accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('background_image') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, GIF. Maksimal 5MB.</p>
                        @error('background_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Style Settings -->
            <div class="mt-6 bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Pengaturan Tampilan</h3>
                    <p class="mt-1 text-sm text-gray-500">Sesuaikan tampilan hero section</p>
                </div>
                <div class="px-6 py-4 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="background_overlay_color" class="block text-sm font-medium text-gray-700 mb-2">
                                Warna Overlay <span class="text-red-500">*</span>
                            </label>
                            <input type="color" name="background_overlay_color" id="background_overlay_color" 
                                   value="{{ old('background_overlay_color', '#000000') }}"
                                   class="h-10 w-full border border-gray-300 rounded-lg @error('background_overlay_color') border-red-300 @enderror">
                            @error('background_overlay_color')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="background_overlay_opacity" class="block text-sm font-medium text-gray-700 mb-2">
                                Opacity Overlay <span class="text-red-500">*</span>
                            </label>
                            <input type="range" name="background_overlay_opacity" id="background_overlay_opacity" 
                                   min="0" max="100" value="{{ old('background_overlay_opacity', 50) }}"
                                   class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer slider"
                                   oninput="document.getElementById('opacity-value').textContent = this.value">
                            <div class="flex justify-between text-xs text-gray-500 mt-1">
                                <span>0%</span>
                                <span id="opacity-value">{{ old('background_overlay_opacity', 50) }}%</span>
                                <span>100%</span>
                            </div>
                            @error('background_overlay_opacity')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="text_color" class="block text-sm font-medium text-gray-700 mb-2">
                                Warna Teks <span class="text-red-500">*</span>
                            </label>
                            <select name="text_color" id="text_color" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('text_color') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                    required>
                                <option value="">Pilih Warna Teks</option>
                                <option value="white" {{ old('text_color', 'white') == 'white' ? 'selected' : '' }}>Putih</option>
                                <option value="dark" {{ old('text_color') == 'dark' ? 'selected' : '' }}>Gelap</option>
                            </select>
                            @error('text_color')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="text_alignment" class="block text-sm font-medium text-gray-700 mb-2">
                                Perataan Teks <span class="text-red-500">*</span>
                            </label>
                            <select name="text_alignment" id="text_alignment" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('text_alignment') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                    required>
                                <option value="">Pilih Perataan</option>
                                <option value="left" {{ old('text_alignment') == 'left' ? 'selected' : '' }}>Kiri</option>
                                <option value="center" {{ old('text_alignment', 'center') == 'center' ? 'selected' : '' }}>Tengah</option>
                                <option value="right" {{ old('text_alignment') == 'right' ? 'selected' : '' }}>Kanan</option>
                            </select>
                            @error('text_alignment')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Settings -->
            <div class="mt-6 bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Call to Action</h3>
                    <p class="mt-1 text-sm text-gray-500">Tambahkan tombol aksi (opsional)</p>
                </div>
                <div class="px-6 py-4 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="cta_primary_text" class="block text-sm font-medium text-gray-700 mb-2">
                                Teks CTA Utama
                            </label>
                            <input type="text" name="cta_primary_text" id="cta_primary_text" 
                                   value="{{ old('cta_primary_text') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('cta_primary_text') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                   placeholder="Contoh: Mulai Sekarang">
                            @error('cta_primary_text')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="cta_primary_url" class="block text-sm font-medium text-gray-700 mb-2">
                                URL CTA Utama
                            </label>
                            <input type="url" name="cta_primary_url" id="cta_primary_url" 
                                   value="{{ old('cta_primary_url') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('cta_primary_url') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                   placeholder="https://example.com">
                            @error('cta_primary_url')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="cta_secondary_text" class="block text-sm font-medium text-gray-700 mb-2">
                                Teks CTA Sekunder
                            </label>
                            <input type="text" name="cta_secondary_text" id="cta_secondary_text" 
                                   value="{{ old('cta_secondary_text') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('cta_secondary_text') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                   placeholder="Contoh: Pelajari Lebih Lanjut">
                            @error('cta_secondary_text')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="cta_secondary_url" class="block text-sm font-medium text-gray-700 mb-2">
                                URL CTA Sekunder
                            </label>
                            <input type="url" name="cta_secondary_url" id="cta_secondary_url" 
                                   value="{{ old('cta_secondary_url') }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('cta_secondary_url') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                   placeholder="https://example.com">
                            @error('cta_secondary_url')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex items-center space-x-4">
                <button type="submit" 
                        class="inline-flex items-center px-6 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Hero
                </button>
                <a href="{{ route('admin.page-hero.index') }}" 
                   class="inline-flex items-center px-6 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Status -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg mb-6">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Status</h3>
                </div>
                <div class="px-6 py-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-700">Aktifkan hero section</span>
                    </label>
                </div>
            </div>

            <!-- Preview Card -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Preview</h3>
                </div>
                <div class="p-6">
                    <!-- Image Preview -->
                    <div id="image-preview-container" class="hidden mb-4">
                        <img id="image-preview" class="w-full h-32 object-cover rounded-lg">
                    </div>
                    
                    <!-- Live Preview -->
                    <div id="hero-preview" class="relative h-32 bg-gray-100 rounded-lg overflow-hidden">
                        <div id="preview-overlay" class="absolute inset-0 bg-black bg-opacity-50"></div>
                        <div id="preview-content" class="absolute inset-0 flex items-center justify-center">
                            <div id="preview-text" class="text-center text-white px-3">
                                <h4 id="preview-title" class="text-lg font-semibold mb-1">Judul Hero</h4>
                                <p id="preview-subtitle" class="text-sm opacity-90 hidden">Subjudul hero</p>
                                <div id="preview-ctas" class="mt-2 space-x-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image preview
    const imageInput = document.getElementById('background_image');
    const imagePreviewContainer = document.getElementById('image-preview-container');
    const imagePreview = document.getElementById('image-preview');
    const heroPreview = document.getElementById('hero-preview');

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreviewContainer.classList.remove('hidden');
                heroPreview.style.backgroundImage = `url(${e.target.result})`;
                heroPreview.style.backgroundSize = 'cover';
                heroPreview.style.backgroundPosition = 'center';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreviewContainer.classList.add('hidden');
            heroPreview.style.backgroundImage = '';
        }
    });

    // Live preview updates
    const titleInput = document.getElementById('title');
    const subtitleInput = document.getElementById('subtitle');
    const overlayColorInput = document.getElementById('background_overlay_color');
    const overlayOpacityInput = document.getElementById('background_overlay_opacity');
    const textColorInput = document.getElementById('text_color');
    const textAlignmentInput = document.getElementById('text_alignment');
    const ctaPrimaryInput = document.getElementById('cta_primary_text');
    const ctaSecondaryInput = document.getElementById('cta_secondary_text');

    const previewTitle = document.getElementById('preview-title');
    const previewSubtitle = document.getElementById('preview-subtitle');
    const previewOverlay = document.getElementById('preview-overlay');
    const previewContent = document.getElementById('preview-content');
    const previewText = document.getElementById('preview-text');
    const previewCtas = document.getElementById('preview-ctas');

    titleInput.addEventListener('input', function() {
        previewTitle.textContent = this.value || 'Judul Hero';
    });

    subtitleInput.addEventListener('input', function() {
        if (this.value) {
            previewSubtitle.textContent = this.value;
            previewSubtitle.classList.remove('hidden');
        } else {
            previewSubtitle.classList.add('hidden');
        }
    });

    overlayColorInput.addEventListener('input', function() {
        previewOverlay.style.backgroundColor = this.value;
    });

    overlayOpacityInput.addEventListener('input', function() {
        previewOverlay.style.opacity = this.value / 100;
    });

    textColorInput.addEventListener('change', function() {
        previewText.style.color = this.value === 'dark' ? '#1f2937' : '#ffffff';
    });

    textAlignmentInput.addEventListener('change', function() {
        previewContent.className = `absolute inset-0 flex items-center ${
            this.value === 'left' ? 'justify-start pl-6' : 
            this.value === 'right' ? 'justify-end pr-6' : 
            'justify-center'
        }`;
        previewText.className = `text-${this.value === 'center' ? 'center' : this.value} text-white px-3`;
    });

    function updateCTAs() {
        previewCtas.innerHTML = '';
        
        if (ctaPrimaryInput.value) {
            const primaryBtn = document.createElement('span');
            primaryBtn.className = 'inline-block px-3 py-1 bg-blue-600 text-white text-xs rounded';
            primaryBtn.textContent = ctaPrimaryInput.value;
            previewCtas.appendChild(primaryBtn);
        }
        
        if (ctaSecondaryInput.value) {
            const secondaryBtn = document.createElement('span');
            secondaryBtn.className = 'inline-block px-3 py-1 bg-gray-600 text-white text-xs rounded ml-2';
            secondaryBtn.textContent = ctaSecondaryInput.value;
            previewCtas.appendChild(secondaryBtn);
        }
    }

    ctaPrimaryInput.addEventListener('input', updateCTAs);
    ctaSecondaryInput.addEventListener('input', updateCTAs);
});
</script>
@endpush
@endsection
