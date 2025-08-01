@extends('layouts.admin')

@section('title', 'Edit Kategori Artikel')

@section('content')
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.articles.index') }}"
                class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Kategori Artikel</h1>
                <p class="mt-1 text-sm text-gray-600">Perbarui kategori: {{ $articleCategory->name }}</p>
            </div>
        </div>
    </div>

    <div class="max-w-2xl">
        <form action="{{ route('admin.article-categories.update', $articleCategory) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <div class="space-y-4">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Kategori <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name', $articleCategory->name) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror"
                            placeholder="Masukkan nama kategori">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            Slug
                        </label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $articleCategory->slug) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror"
                            placeholder="kategori-slug">
                        <p class="mt-1 text-xs text-gray-500">
                            Jika kosong, slug akan dibuat otomatis dari nama kategori
                        </p>
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi
                        </label>
                        <textarea name="description" id="description" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                            placeholder="Deskripsi singkat kategori (opsional)">{{ old('description', $articleCategory->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Category Stats -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-blue-900 mb-3">Statistik Kategori</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <dt class="text-sm font-medium text-blue-700">Jumlah Artikel</dt>
                        <dd class="text-2xl font-bold text-blue-900">{{ $articleCategory->articles()->count() }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-blue-700">Dibuat</dt>
                        <dd class="text-sm text-blue-900">{{ $articleCategory->created_at->format('d M Y H:i') }}</dd>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-4">
                <a href="{{ route('admin.article-categories.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 border border-transparent rounded-lg text-white hover:bg-blue-700 transition duration-150 ease-in-out">
                    <i class="fas fa-save mr-2"></i>
                    Perbarui Kategori
                </button>
            </div>
        </form>
    </div>

    <script>
        // Auto-generate slug from name (only if slug is empty)
        document.getElementById('name').addEventListener('input', function (e) {
            const slugField = document.getElementById('slug');
            if (!slugField.value) {
                const name = e.target.value;
                const slug = name.toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-')
                    .trim('-');

                slugField.value = slug;
            }
        });
    </script>
@endsection