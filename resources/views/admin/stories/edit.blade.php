@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit Sejarah</h2>
            <a href="{{ route('admin.stories.index') }}"
                class="inline-flex items-center text-sm text-blue-600 hover:underline">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Sejarah
            </a>
        </div>

        <form action="{{ route('admin.stories.update', $story->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                <input type="text" name="year" value="{{ old('year', $story->year) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title', $story->title) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    rows="4">{{ old('description', $story->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Gambar (Disarankan 2:3)</label>
                @if ($story->image)
                    <div class="w-32 aspect-[2/3] mb-3">
                        <img src="{{ Storage::url($story->image) }}" alt="Current Image"
                            class="w-full h-full object-cover rounded">
                    </div>
                @else
                    <p class="text-gray-500 text-sm">Tidak ada gambar.</p>
                @endif
                <input type="file" name="image" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="px-6 py-4 space-y-4">
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">
                            Urutan Tampil
                        </label>
                        <input type="number" name="sort_order" id="sort_order" 
                               value="{{ old('sort_order', $story->sort_order) }}"
                               min="0"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('sort_order') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Angka lebih kecil akan tampil terlebih dahulu</p>
                        @error('sort_order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <hr class="border-gray-200">
                    
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $story->is_active) ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-700">Aktifkan anggota tim</span>
                    </label>
                </div>

            <div class="text-right">
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Update</button>
            </div>
        </form>
    </div>
@endsection