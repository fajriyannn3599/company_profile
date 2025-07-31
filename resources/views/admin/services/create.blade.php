@extends('layouts.admin')

@section('title', 'Tambah Layanan')

@section('content')
<div class="mb-6">
    <div class="flex items-center">
        <a href="{{ route('admin.services.index') }}" 
           class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out mr-4">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Tambah Layanan</h1>
            <p class="mt-1 text-sm text-gray-600">Buat layanan baru untuk perusahaan</p>
        </div>
    </div>
</div>

<form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Info -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Dasar</h3>
                
                <div class="space-y-4">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Layanan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               value="{{ old('title') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                               placeholder="Masukkan nama layanan">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            Slug <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="slug" 
                               id="slug" 
                               value="{{ old('slug') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                               placeholder="slug-layanan">
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Short Description -->
                    <div>
                        <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Singkat
                        </label>
                        <textarea name="short_description" 
                                  id="short_description" 
                                  rows="2" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('short_description') border-red-500 @enderror"
                                  placeholder="Deskripsi singkat untuk preview">{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Lengkap <span class="text-red-500">*</span>
                        </label>
                        <textarea name="description" 
                                  id="description" 
                                  rows="8" 
                                  class="summernote w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                                  placeholder="Deskripsi lengkap layanan">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- requirement title -->
                    <div>
                        <label for="requirement_title" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Persyaratan
                        </label>
                        <textarea name="requirement_title" 
                                  id="requirement_title" 
                                  rows="2" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('requirement_title') border-red-500 @enderror"
                                  placeholder="Deskripsi singkat untuk preview">{{ old('requirement_title') }}</textarea>
                        @error('requirement_title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Requirement Description -->
                    <div>
                        <label for="requirement_description" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Persyaratan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="requirement_description" 
                                  id="requirement_description" 
                                  rows="8" 
                                  class="summernote w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('requirement_description') border-red-500 @enderror"
                                  placeholder="Deskripsi lengkap layanan">{{ old('requirement_description') }}</textarea>
                        @error('requirement_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Requirement Description_2 -->
                    <div>
                        <label for="requirement_description_2" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Persyaratan 2 <span class="text-red-500">*</span>
                        </label>
                        <textarea name="requirement_description_2" 
                                  id="requirement_description_2" 
                                  rows="8" 
                                  class="summernote w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('requirement_description_2') border-red-500 @enderror"
                                  placeholder="Deskripsi lengkap layanan">{{ old('requirement_description_2') }}</textarea>
                        @error('requirement_description_2')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Requirement Description -->
                    <div>
                        <label for="requirement_description_3" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi Persyaratan 3 <span class="text-red-500">*</span>
                        </label>
                        <textarea name="requirement_description_3" 
                                  id="requirement_description_3" 
                                  rows="8" 
                                  class="summernote w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('requirement_description_3') border-red-500 @enderror"
                                  placeholder="Deskripsi lengkap layanan">{{ old('requirement_description_3') }}</textarea>
                        @error('requirement_description_3')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
                    
            
            <!-- SEO Meta -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">SEO & Meta</h3>
                <div class="space-y-4">
                    <div>
                        <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">
                            Meta Title
                        </label>
                        <input type="text" 
                               name="meta_title" 
                               id="meta_title" 
                               value="{{ old('meta_title') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('meta_title') border-red-500 @enderror"
                               placeholder="Meta title untuk SEO">
                        @error('meta_title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">
                            Meta Description
                        </label>
                        <textarea name="meta_description" 
                                  id="meta_description" 
                                  rows="2" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('meta_description') border-red-500 @enderror"
                                  placeholder="Meta description untuk SEO">{{ old('meta_description') }}</textarea>
                        @error('meta_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Settings -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Pengaturan</h3>
                <div class="space-y-4">                    
                    <!-- Icon -->
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">
                            Icon (FontAwesome)
                        </label>
                        <input type="text" 
                               name="icon" 
                               id="icon" 
                               value="{{ old('icon') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('icon') border-red-500 @enderror"
                               placeholder="fas fa-cog">
                        <small class="text-gray-500">Contoh: fas fa-cog, far fa-star, dll.</small>
                        @error('icon')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Price Range -->
                    <div>
                        <label for="price_range" class="block text-sm font-medium text-gray-700 mb-2">
                            Rentang Harga
                        </label>
                        <input type="text" 
                               name="price_range" 
                               id="price_range" 
                               value="{{ old('price_range') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('price_range') border-red-500 @enderror"
                               placeholder="Mulai dari Rp 5.000.000">
                        <small class="text-gray-500">Contoh: Mulai dari Rp 5.000.000</small>
                        @error('price_range')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Sort Order -->
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">
                            Urutan Tampil
                        </label>
                        <input type="number" 
                               name="sort_order" 
                               id="sort_order" 
                               value="{{ old('sort_order', 0) }}"
                               min="0"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('sort_order') border-red-500 @enderror">
                        @error('sort_order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Status Toggles -->
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="is_featured" 
                                   id="is_featured" 
                                   value="1"
                                   {{ old('is_featured') ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_featured" class="ml-2 block text-sm text-gray-700">
                                Layanan Unggulan
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" 
                                   name="is_active" 
                                   id="is_active" 
                                   value="1"
                                   {{ old('is_active', true) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-700">
                                Aktifkan Layanan
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Image -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Gambar Layanan</h3>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        Upload Gambar
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition duration-150 ease-in-out">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-image text-gray-400 text-3xl"></i>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Upload gambar</span>
                                    <input id="image" 
                                           name="image" 
                                           type="file" 
                                           accept="image/*"
                                           class="sr-only">
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, JPEG hingga 2MB</p>
                        </div>
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- Live Preview -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Live Preview</h3>
                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                    <div class="flex items-start space-x-4">
                        <div id="preview-icon" class="flex-shrink-0 h-12 w-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-cog text-blue-600"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 id="preview-title" class="text-lg font-medium text-gray-900">Nama Layanan</h4>
                            <p id="preview-description" class="text-sm text-gray-600 mt-1">Deskripsi singkat layanan akan muncul di sini...</p>
                            <div class="mt-2">
                                <span id="preview-price" class="text-sm font-medium text-blue-600">Hubungi untuk harga</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kategori & Status -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg mb-6">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Pengaturan Publikasi</h3>
                    </div>
                    <div class="px-6 py-4 space-y-4">                        
                        <div>
                            <label for="service_category_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select name="service_category_id" id="service_category_id"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('service_category_id') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($service_categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('service_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_category_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <hr class="border-gray-200">

                        <!-- <label class="flex items-center">
                            <input type="checkbox" name="is_published" value="1"
                                {{ old('is_published') ? 'checked' : '' }}
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-700">Terbitkan artikel</span>
                        </label> -->
                    </div>
                </div>
            
            <!-- Actions -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <div class="flex flex-col space-y-3">
                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Layanan
                    </button>
                    <a href="{{ route('admin.services.index') }}" 
                       class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function(e) {
        const slug = e.target.value.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9\-]/g, '');
        document.getElementById('slug').value = slug;
        // Update preview
        document.getElementById('preview-title').textContent = e.target.value || 'Nama Layanan';
    });

    // Live preview updates
    document.getElementById('short_description').addEventListener('input', function(e) {
        document.getElementById('preview-description').textContent = e.target.value || 'Deskripsi singkat layanan akan muncul di sini...';
    });

    document.getElementById('icon').addEventListener('input', function(e) {
        const iconElement = document.querySelector('#preview-icon i');
        iconElement.className = e.target.value || 'fas fa-cog';
    });

    document.getElementById('price_range').addEventListener('input', function(e) {
        document.getElementById('preview-price').textContent = e.target.value || 'Hubungi untuk harga';
    });

    // Image preview
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const existingPreview = document.getElementById('image-preview');
                if (existingPreview) {
                    existingPreview.remove();
                }
                
                const preview = document.createElement('div');
                preview.id = 'image-preview';
                preview.className = 'mt-4 p-4 bg-blue-50 rounded-lg border border-blue-200';
                preview.innerHTML = `
                    <p class="text-sm font-medium text-blue-700 mb-2">Preview Gambar:</p>
                    <img src="${e.target.result}" alt="Preview" class="h-32 w-auto rounded-lg border shadow-sm">
                `;
                
                const imageSection = document.querySelector('input[name="image"]').closest('.bg-white');
                imageSection.appendChild(preview);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet" />
<style>
.note-editable ul { list-style-type: disc; margin-left: 1.5em; }
.note-editable ol { list-style-type: decimal; margin-left: 1.5em; }
.note-editable li { margin-bottom: 0.25em; }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script>
    $(function() {
        $('.summernote').summernote({
            height: 250,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>
@endpush
@endsection
