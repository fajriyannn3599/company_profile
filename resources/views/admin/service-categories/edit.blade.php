@extends('layouts.admin')

@section('title', 'Edit Kategori Layanan')

@section('content')
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.services.index') }}"
                class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Kategori Layanan</h1>
                <p class="mt-1 text-sm text-gray-600">Perbarui kategori: {{ $serviceCategory->name }}</p>
            </div>
        </div>
    </div>

    <div class="max-w-2xl">
        <form action="{{ route('admin.service-categories.update', $serviceCategory) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <div class="space-y-4">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Kategori <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name', $serviceCategory->name) }}"
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
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $serviceCategory->slug) }}"
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
                            placeholder="Deskripsi singkat kategori (opsional)">{{ old('description', $serviceCategory->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Icon -->
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">
                            Ikon (opsional)
                        </label>
                        <input type="text" name="icon" id="icon" value="{{ old('icon', $serviceCategory->icon) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('icon') border-red-500 @enderror"
                            placeholder="fas fa-icon">
                        @error('icon')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                            Gambar Kategori
                        </label>
                        <input type="file" name="image" id="image" accept="image/*"
                            class="w-full text-sm text-gray-700 border border-gray-300 rounded-lg @error('image') border-red-500 @enderror">
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <div class="mt-3">
                            <p class="text-sm text-gray-500 mb-1">Preview Gambar:</p>
                            <img id="image-preview"
                                src="{{ $serviceCategory->image ? asset('storage/' . $serviceCategory->image) : '' }}"
                                class="w-32 h-32 object-cover rounded border" alt="Preview Gambar">
                        </div>
                    </div>

                    <!-- Status & Featured -->
                    <div class="flex flex-col sm:flex-row sm:space-x-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $serviceCategory->is_active) ? 'checked' : '' }}
                                class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-700">Aktif</label>
                        </div>
                        <div class="flex items-center mt-2 sm:mt-0">
                            <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $serviceCategory->is_featured) ? 'checked' : '' }}
                                class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                            <label for="is_featured" class="ml-2 block text-sm text-gray-700">Tampilkan di Halaman Utama</label>
                        </div>
                    </div>

                    <!-- Sort Order -->
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">
                            Urutan Tampil
                        </label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $serviceCategory->sort_order) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-4">
                <a href="{{ route('admin.service-categories.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out">
                    <i class="fas fa-times mr-2"></i>
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 border border-transparent rounded-lg text-white hover:bg-blue-700 transition duration-150 ease-in-out">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <script>
        // Preview image logic
        document.getElementById('image').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const preview = document.getElementById('image-preview');
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
            }
        });

        // Auto-generate slug from name
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
