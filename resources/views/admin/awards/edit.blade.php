@extends('layouts.admin')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit Penghargaan</h2>
            <a href="{{ route('admin.awards.index') }}"
                class="inline-flex items-center text-sm text-blue-600 hover:underline">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Penghargaan
            </a>
        </div>

        <form action="{{ route('admin.awards.update', $award->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input type="text" name="title" value="{{ old('title', $award->title) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    rows="4">{{ old('description', $award->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Gambar (Disarankan 1:1</label>
                @if ($award->image)
                    <div class="w-32 aspect-square mb-3">
                        <img src="{{ Storage::url($award->image) }}" alt="Current Image"
                            class="w-full h-full object-cover rounded">
                    </div>
                @else
                    <p class="text-gray-500 text-sm">Tidak ada gambar.</p>
                @endif
                <input type="file" name="image" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="text-right">
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Update</button>
            </div>
        </form>
    </div>
@endsection