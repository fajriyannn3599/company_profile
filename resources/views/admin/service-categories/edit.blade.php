@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Edit Kategori Layanan</h1>

        <form action="{{ route('admin.service-categories.update', $serviceCategory) }}" method="POST"
            enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Kategori -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                <input type="text" name="name" id="name" value="{{ old('name', $serviceCategory->name) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $serviceCategory->slug) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('slug') border-red-500 @enderror">
                @error('slug')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $serviceCategory->description) }}</textarea>
            </div>

            <!-- Ikon -->
            <div>
                <label for="icon" class="block text-sm font-medium text-gray-700">Ikon (opsional)</label>
                <input type="text" name="icon" id="icon" value="{{ old('icon', $serviceCategory->icon) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('icon') border-red-500 @enderror">
            </div>

            <!-- Gambar -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Gambar Kategori</label>
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

            <!-- Status -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $serviceCategory->is_active) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-700">Aktif</label>
            </div>

            <!-- Featured -->
            <div class="flex items-center">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $serviceCategory->is_featured) ? 'checked' : '' }}
                    class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                <label for="is_featured" class="ml-2 block text-sm text-gray-700">Tampilkan di Halaman Utama</label>
            </div>

            <!-- Urutan -->
            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700">Urutan Tampil</label>
                <input type="number" name="sort_order" id="sort_order"
                    value="{{ old('sort_order', $serviceCategory->sort_order) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <!-- JavaScript Preview Gambar -->
    <script>
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
    </script>
@endsection