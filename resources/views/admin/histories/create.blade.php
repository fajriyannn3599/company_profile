{{-- resources/views/admin/histories/create.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Tambah Sejarah Perusahaan</h1>

        <form action="{{ route('admin.histories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block font-semibold">Tahun</label>
                <input type="text" name="year" class="border p-2 w-full" required>
            </div>

            <div>
                <label class="block font-semibold">Judul</label>
                <input type="text" name="title" class="border p-2 w-full">
            </div>

            <div>
                <label class="block font-semibold">Deskripsi</label>
                <textarea name="description" class="border p-2 w-full" rows="4" required></textarea>
            </div>

            <div>
                <label class="block font-semibold">Gambar</label>
                <input type="file" name="image" class="border p-2 w-full">
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
@endsection