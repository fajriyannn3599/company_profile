@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Testimonial</h1>
            <p class="mt-1 text-sm text-gray-600">Edit testimonial dari {{ $testimonial->client_name }}</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('admin.testimonials.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Form -->
        <div class="lg:col-span-2">
            <!-- Client Information -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi Klien</h3>
                    <p class="mt-1 text-sm text-gray-500">Data klien yang memberikan testimonial</p>
                </div>
                <div class="px-6 py-4 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="client_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Klien <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="client_name" id="client_name" 
                                   value="{{ old('client_name', $testimonial->client_name) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('client_name') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                   placeholder="Masukkan nama klien"
                                   required>
                            @error('client_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="client_position" class="block text-sm font-medium text-gray-700 mb-2">
                                Posisi/Jabatan
                            </label>
                            <input type="text" name="client_position" id="client_position" 
                                   value="{{ old('client_position', $testimonial->client_position) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('client_position') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                   placeholder="Contoh: CEO, Manager, dll">
                            @error('client_position')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="client_company" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Perusahaan
                        </label>
                        <input type="text" name="client_company" id="client_company" 
                               value="{{ old('client_company', $testimonial->client_company) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('client_company') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                               placeholder="Masukkan nama perusahaan">
                        @error('client_company')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="client_photo" class="block text-sm font-medium text-gray-700 mb-2">
                            Foto Klien
                        </label>
                        @if($testimonial->client_photo)
                            <div class="mb-3">
                                <img src="{{ Storage::url($testimonial->client_photo) }}" 
                                     alt="{{ $testimonial->client_name }}" 
                                     class="w-20 h-20 object-cover rounded-full">
                                <p class="text-sm text-gray-500 mt-1">Foto saat ini</p>
                            </div>
                        @endif
                        <input type="file" name="client_photo" id="client_photo" 
                               accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('client_photo') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, GIF. Maksimal 2MB. Kosongkan jika tidak ingin mengubah.</p>
                        @error('client_photo')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Testimonial Content -->
            <div class="mt-6 bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Konten Testimonial</h3>
                    <p class="mt-1 text-sm text-gray-500">Isi testimonial dan rating</p>
                </div>
                <div class="px-6 py-4 space-y-6">
                    <div>
                        <label for="testimonial" class="block text-sm font-medium text-gray-700 mb-2">
                            Testimonial <span class="text-red-500">*</span>
                        </label>
                        <textarea name="testimonial" id="testimonial" rows="5"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('testimonial') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                  placeholder="Masukkan isi testimonial..."
                                  required>{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                        @error('testimonial')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">
                            Rating
                        </label>
                        <select name="rating" id="rating" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('rating') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                            <option value="">Pilih Rating</option>
                            <option value="1" {{ old('rating', $testimonial->rating) == '1' ? 'selected' : '' }}>⭐ 1 - Sangat Buruk</option>
                            <option value="2" {{ old('rating', $testimonial->rating) == '2' ? 'selected' : '' }}>⭐⭐ 2 - Buruk</option>
                            <option value="3" {{ old('rating', $testimonial->rating) == '3' ? 'selected' : '' }}>⭐⭐⭐ 3 - Cukup</option>
                            <option value="4" {{ old('rating', $testimonial->rating) == '4' ? 'selected' : '' }}>⭐⭐⭐⭐ 4 - Baik</option>
                            <option value="5" {{ old('rating', $testimonial->rating) == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐ 5 - Sangat Baik</option>
                        </select>
                        @error('rating')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6 flex items-center space-x-4">
                <button type="submit" 
                        class="inline-flex items-center px-6 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-save mr-2"></i>
                    Update Testimonial
                </button>
                <a href="{{ route('admin.testimonials.index') }}" 
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
                    <h3 class="text-lg font-medium text-gray-900">Pengaturan</h3>
                </div>
                <div class="px-6 py-4 space-y-4">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-700">Aktifkan testimonial</span>
                    </label>
                    
                    <label class="flex items-center">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $testimonial->is_featured) ? 'checked' : '' }}
                               class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-700">Jadikan testimonial unggulan</span>
                    </label>
                </div>
            </div>

            <!-- Info Card -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg mb-6">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Informasi</h3>
                </div>
                <div class="px-6 py-4 space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Dibuat:</span>
                        <span class="text-gray-900">{{ $testimonial->created_at->format('d M Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Diupdate:</span>
                        <span class="text-gray-900">{{ $testimonial->updated_at->format('d M Y H:i') }}</span>
                    </div>
                </div>
            </div>

            <!-- Preview Card -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Preview</h3>
                </div>
                <div class="p-6">
                    <!-- Photo Preview -->
                    <div id="photo-preview-container" class="mb-4 {{ $testimonial->client_photo ? '' : 'hidden' }}">
                        <img id="photo-preview" 
                             src="{{ $testimonial->client_photo ? Storage::url($testimonial->client_photo) : '' }}"
                             class="w-16 h-16 object-cover rounded-full mx-auto">
                    </div>
                    
                    <!-- Live Preview -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto mb-3 flex items-center justify-center {{ $testimonial->client_photo ? 'hidden' : '' }}" id="default-avatar">
                            <i class="fas fa-user text-gray-400 text-xl"></i>
                        </div>
                        <h4 id="preview-name" class="font-semibold text-gray-900 mb-1">{{ $testimonial->client_name }}</h4>
                        <p id="preview-position" class="text-sm text-gray-500 mb-3 {{ ($testimonial->client_position || $testimonial->client_company) ? '' : 'hidden' }}">
                            @if($testimonial->client_position && $testimonial->client_company)
                                {{ $testimonial->client_position }} - {{ $testimonial->client_company }}
                            @elseif($testimonial->client_position)
                                {{ $testimonial->client_position }}
                            @elseif($testimonial->client_company)
                                {{ $testimonial->client_company }}
                            @endif
                        </p>
                        <div id="preview-rating" class="mb-3 {{ $testimonial->rating ? '' : 'hidden' }}">
                            <div class="flex justify-center space-x-1">
                                @if($testimonial->rating)
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $testimonial->rating)
                                            <i class="fas fa-star text-yellow-400"></i>
                                        @else
                                            <i class="far fa-star text-gray-300"></i>
                                        @endif
                                    @endfor
                                @endif
                            </div>
                        </div>
                        <blockquote id="preview-testimonial" class="text-sm text-gray-600 italic border-l-4 border-blue-500 pl-3">
                            "{{ $testimonial->testimonial }}"
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Photo preview
    const photoInput = document.getElementById('client_photo');
    const photoPreviewContainer = document.getElementById('photo-preview-container');
    const photoPreview = document.getElementById('photo-preview');
    const defaultAvatar = document.getElementById('default-avatar');

    photoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                photoPreview.src = e.target.result;
                photoPreviewContainer.classList.remove('hidden');
                defaultAvatar.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    // Live preview updates
    const nameInput = document.getElementById('client_name');
    const positionInput = document.getElementById('client_position');
    const companyInput = document.getElementById('client_company');
    const testimonialInput = document.getElementById('testimonial');
    const ratingInput = document.getElementById('rating');

    const previewName = document.getElementById('preview-name');
    const previewPosition = document.getElementById('preview-position');
    const previewTestimonial = document.getElementById('preview-testimonial');
    const previewRating = document.getElementById('preview-rating');

    nameInput.addEventListener('input', function() {
        previewName.textContent = this.value || 'Nama Klien';
    });

    function updatePosition() {
        const position = positionInput.value;
        const company = companyInput.value;
        
        if (position || company) {
            let positionText = position;
            if (position && company) {
                positionText += ' - ' + company;
            } else if (company) {
                positionText = company;
            }
            previewPosition.textContent = positionText;
            previewPosition.classList.remove('hidden');
        } else {
            previewPosition.classList.add('hidden');
        }
    }

    positionInput.addEventListener('input', updatePosition);
    companyInput.addEventListener('input', updatePosition);

    testimonialInput.addEventListener('input', function() {
        previewTestimonial.textContent = '"' + (this.value || 'Testimonial akan ditampilkan di sini...') + '"';
    });

    ratingInput.addEventListener('change', function() {
        const rating = parseInt(this.value);
        if (rating) {
            let starsHTML = '';
            for (let i = 1; i <= 5; i++) {
                if (i <= rating) {
                    starsHTML += '<i class="fas fa-star text-yellow-400"></i>';
                } else {
                    starsHTML += '<i class="far fa-star text-gray-300"></i>';
                }
            }
            previewRating.querySelector('.flex').innerHTML = starsHTML;
            previewRating.classList.remove('hidden');
        } else {
            previewRating.classList.add('hidden');
        }
    });
});
</script>
@endpush
@endsection
