@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        <!-- Tombol Kembali -->
        <a href="{{ route('admin.stories.index') }}"
            class="inline-flex items-center text-sm text-gray-600 hover:text-blue-600 mb-6">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Sejarah
        </a>

        <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Sejarah</h2>

        <form action="{{ route('admin.stories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Input Tahun -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                <input type="text" name="year"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>

            <!-- Input Judul -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input type="text" name="title"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>

            <!-- Input Deskripsi -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    rows="4"></textarea>
            </div>

            <!-- Upload Gambar dengan Rasio 1:1 -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar (Disarankan 2:3)</label>
                <div
                    class="aspect-w-1 aspect-h-1 bg-gray-100 rounded border border-dashed border-gray-300 flex items-center justify-center overflow-hidden relative">
                    <img id="imagePreview" src="#" alt="Preview" class="hidden w-full h-full object-cover" />
                    <span id="imagePlaceholder" class="text-gray-400">Belum ada gambar</span>
                </div>
                <input type="file" name="image" id="imageInput"
                    class="mt-2 w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    accept="image/*">
            </div>

            <!-- Urutan Tampil -->
            <div class="px-6 py-4 space-y-4">
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">
                        Urutan Tampil
                    </label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('sort_order') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                    <p class="mt-1 text-sm text-gray-500">Angka lebih kecil akan tampil terlebih dahulu</p>
                    @error('sort_order')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <hr class="border-gray-200">

                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <span class="ml-2 text-sm text-gray-700">Aktifkan anggota tim</span>
                </label>
            </div>

            <!-- Tombol Simpan -->
            <div class="text-right">
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan</button>
            </div>
        </form>
    </div>

    <!-- Tambahkan Script Preview -->
    <script>
        document.getElementById('imageInput').addEventListener('change', function (e) {
            const file = e.target.files[0];
            const preview = document.getElementById('imagePreview');
            const placeholder = document.getElementById('imagePlaceholder');

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
        });
    </script>
@endsection