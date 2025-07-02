@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Artikel</h1>
                <p class="mt-1 text-sm text-gray-600">Perbarui artikel: {{ Str::limit($article->title, 50) }}</p>
            </div>
            <div class="mt-4 sm:mt-0 flex space-x-3">
                <a href="{{ route('admin.articles.show', $article) }}"
                    class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition duration-150 ease-in-out">
                    <i class="fas fa-eye mr-2"></i>
                    Lihat
                </a>
                <a href="{{ route('admin.articles.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Form -->
            <div class="lg:col-span-2">
                <!-- Basic Information -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Artikel</h3>
                        <p class="mt-1 text-sm text-gray-500">Detail utama artikel</p>
                    </div>
                    <div class="px-6 py-4 space-y-6">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Artikel <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Masukkan judul artikel yang menarik" required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">
                                Ringkasan/Excerpt
                            </label>
                            <textarea name="excerpt" id="excerpt" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('excerpt') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Ringkasan singkat yang akan ditampilkan di preview artikel...">{{ old('excerpt', $article->excerpt) }}</textarea>
                            @error('excerpt')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                                Konten Artikel <span class="text-red-500">*</span>
                            </label>
                            <textarea name="content" id="content" rows="12"
                                class="summernote w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('content') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Tulis konten artikel lengkap di sini..." required>{{ old('content', $article->content) }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- SEO Settings -->
                <div class="mt-6 bg-white shadow-sm border border-gray-200 rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Pengaturan SEO</h3>
                        <p class="mt-1 text-sm text-gray-500">Optimasi mesin pencari</p>
                    </div>
                    <div class="px-6 py-4 space-y-6">
                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">
                                Meta Title
                            </label>
                            <input type="text" name="meta_title" id="meta_title"
                                value="{{ old('meta_title', $article->meta_title) }}" maxlength="60"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('meta_title') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Meta title untuk SEO (maksimal 60 karakter)">
                            @error('meta_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">
                                Meta Description
                            </label>
                            <textarea name="meta_description" id="meta_description" rows="3" maxlength="160"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('meta_description') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Meta description untuk SEO (maksimal 160 karakter)">{{ old('meta_description', $article->meta_description) }}</textarea>
                            @error('meta_description')
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
                        Perbarui Artikel
                    </button>
                    <a href="{{ route('admin.articles.index') }}"
                        class="inline-flex items-center px-6 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Kategori & Status -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg mb-6">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Pengaturan Publikasi</h3>
                    </div>
                    <div class="px-6 py-4 space-y-4">                        <div>
                            <label for="article_category_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <select name="article_category_id" id="article_category_id"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('article_category_id') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('article_category_id', $article->article_category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('article_category_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <hr class="border-gray-200">

                        <label class="flex items-center">
                            <input type="checkbox" name="is_published" value="1"
                                {{ old('is_published', $article->is_published) ? 'checked' : '' }}
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-700">Terbitkan artikel</span>
                        </label>
                    </div>
                </div>

                <!-- Current Featured Image -->
                @if ($article->featured_image)
                    <div class="bg-white shadow-sm border border-gray-200 rounded-lg mb-6">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Gambar Saat Ini</h3>
                        </div>
                        <div class="p-6">
                            <img src="{{ Storage::url($article->featured_image) }}" alt="{{ $article->title }}"
                                class="w-full h-48 object-cover rounded-lg">
                        </div>
                    </div>
                @endif

                <!-- Featured Image -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg mb-6">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">
                            {{ $article->featured_image ? 'Ganti Gambar' : 'Gambar Unggulan' }}</h3>
                    </div>
                    <div class="p-6">
                        <div>
                            <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                                Upload Gambar
                            </label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition duration-150 ease-in-out">
                                <div class="space-y-1 text-center">
                                    <i class="fas fa-image text-gray-400 text-3xl"></i>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="featured_image"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>Upload gambar</span>
                                            <input id="featured_image" name="featured_image" type="file"
                                                accept="image/*" class="sr-only">
                                        </label>
                                        <p class="pl-1">atau drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, JPEG hingga 2MB</p>
                                </div>
                            </div>
                            @error('featured_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image Preview -->
                        <div id="image-preview-container" class="hidden mt-4">
                            <img id="image-preview" class="w-full h-48 object-cover rounded-lg">
                        </div>
                    </div>
                </div>

                <!-- Preview Card -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Preview Artikel</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <div class="w-full h-32 bg-gray-200 rounded-lg flex items-center justify-center"
                                id="preview-image">
                                @if ($article->featured_image)
                                    <img src="{{ Storage::url($article->featured_image) }}"
                                        class="w-full h-full object-cover rounded-lg" alt="Preview">
                                @else
                                    <i class="fas fa-image text-gray-400 text-2xl"></i>
                                @endif
                            </div>
                            <h4 id="preview-title" class="font-semibold text-gray-900">{{ $article->title }}</h4>
                            <p id="preview-excerpt" class="text-sm text-gray-600">
                                {{ $article->excerpt ?: 'Excerpt akan muncul di sini...' }}</p>
                            <div class="flex items-center space-x-2 text-xs text-gray-500">
                                <span id="preview-category" class="px-2 py-1 bg-purple-100 text-purple-800 rounded-full">
                                    {{ $article->category->name ?? 'Kategori' }}
                                </span>
                                <span id="preview-status"
                                    class="px-2 py-1 {{ $article->is_published ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }} rounded-full">
                                    {{ $article->is_published ? 'Diterbitkan' : 'Draft' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet" />
<style>
.note-editable ul { list-style-type: disc; margin-left: 1.5em; }
.note-editable ol { list-style-type: decimal; margin-left: 1.5em; }
.note-editable li { margin-bottom: 0.25em; }
.note-editable { line-height: 1.6; }
.note-editable p { margin-bottom: 1em; }
.note-editable h1, .note-editable h2, .note-editable h3 { font-weight: bold; margin: 1em 0 0.5em 0; }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Summernote
    $(function() {
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            placeholder: 'Tulis konten artikel lengkap di sini...'
        });
    });

    // Image preview
                const imageInput = document.getElementById('featured_image');
                const imagePreviewContainer = document.getElementById('image-preview-container');
                const imagePreview = document.getElementById('image-preview');
                const previewImage = document.getElementById('preview-image');

                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreviewContainer.classList.remove('hidden');
                            previewImage.innerHTML =
                                `<img src="${e.target.result}" class="w-full h-full object-cover rounded-lg" alt="Preview">`;
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Live preview updates
                const titleInput = document.getElementById('title');
                const excerptInput = document.getElementById('excerpt');
                const categorySelect = document.getElementById('article_category_id');
                const publishedCheck = document.getElementById('is_published');

                const previewTitle = document.getElementById('preview-title');
                const previewExcerpt = document.getElementById('preview-excerpt');
                const previewCategory = document.getElementById('preview-category');
                const previewStatus = document.getElementById('preview-status');

                titleInput.addEventListener('input', function() {
                    previewTitle.textContent = this.value || '{{ $article->title }}';
                });

                excerptInput.addEventListener('input', function() {
                    previewExcerpt.textContent = this.value || 'Excerpt akan muncul di sini...';
                });

                categorySelect.addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    previewCategory.textContent = selectedOption.text || 'Kategori';
                });

                publishedCheck.addEventListener('change', function() {
                    if (this.checked) {
                        previewStatus.textContent = 'Diterbitkan';
                        previewStatus.className = 'px-2 py-1 bg-green-100 text-green-800 rounded-full';
                    } else {
                        previewStatus.textContent = 'Draft';
                        previewStatus.className = 'px-2 py-1 bg-gray-100 text-gray-800 rounded-full';
                    }
                });
            });
        </script>
    @endpush
@endsection
