@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        <!-- Tombol Kembali -->
        <a href="{{ route('admin.awards.index') }}"
            class="inline-flex items-center text-sm text-gray-600 hover:text-blue-600 mb-6">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Penghargaan
        </a>

        <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Penghargaan</h2>

        <form action="{{ route('admin.awards.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

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
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar (Disarankan 1:1)</label>
                <div
                    class="aspect-w-1 aspect-h-1 bg-gray-100 rounded border border-dashed border-gray-300 flex items-center justify-center overflow-hidden relative">
                    <img id="imagePreview" src="#" alt="Preview" class="hidden w-full h-full object-cover" />
                    <span id="imagePlaceholder" class="text-gray-400">Belum ada gambar</span>
                </div>
                <input type="file" name="image" id="imageInput"
                    class="mt-2 w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    accept="image/*">
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