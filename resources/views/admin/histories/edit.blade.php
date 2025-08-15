{{-- resources/views/admin/histories/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Sejarah Perusahaan</h1>

        <form action="{{ route('admin.histories.update', $history) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold">Tahun</label>
                <input type="text" name="year" value="{{ old('year', $history->year) }}" class="border p-2 w-full" required>
            </div>

            <div>
                <label class="block font-semibold">Judul</label>
                <input type="text" name="title" value="{{ old('title', $history->title) }}" class="border p-2 w-full">
            </div>

            <div>
                <label class="block font-semibold">Deskripsi</label>
                <textarea name="description" class="border p-2 w-full" rows="4"
                    required>{{ old('description', $history->description) }}</textarea>
            </div>

            <div>
                <label class="block font-semibold">Gambar</label>
                @if($history->image)
                    <img src="{{ asset('storage/' . $history->image) }}" class="w-20 h-20 object-cover rounded mb-2">
                @endif
                <input type="file" name="image" class="border p-2 w-full">
            </div>

            <button class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
@endsection