@extends('layouts.admin')

@section('content')
    <div class="max-w-6xl mx-auto mt-10">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800 flex items-center" style="font-family: 'Poppins', sans-serif;">
                <svg class="w-6 h-6 text-red-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 2a4 4 0 014 4v1h2a2 2 0 012 2v1h-2v6a2 2 0 01-2 2h-1v1a2 2 0 11-4 0v-1H9v1a2 2 0 11-4 0v-1H4a2 2 0 01-2-2v-6H0V9a2 2 0 012-2h2V6a4 4 0 014-4h2z" />
                </svg>
                Daftar Gambar Struktur
            </h1>
            <a href="{{ route('admin.structures.create') }}"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md shadow hover:bg-red-700" style="font-family: 'Poppins', sans-serif;">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 010-2h3V6a1 1 0 011-1z" />
                </svg>
                Tambah Gambar
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($images as $image)
                <div class="bg-white rounded-lg shadow p-4 hover:shadow-md transition" style="font-family: 'Poppins', sans-serif;">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}"
                        class="rounded-lg w-full h-48 object-cover mb-4">
                    <div class="flex justify-between items-start" style="font-family: 'Poppins', sans-serif;">
                        <div>
                            <h2 class="text-md font-semibold text-gray-800">{{ $image->title }}</h2>
                            <span class="text-xs text-gray-500">Diunggah: {{ $image->created_at->format('d M Y') }}</span>
                        </div>
                        <form action="{{ route('admin.structures.destroy', $image->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:text-red-700 transition" title="Hapus">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M6 8a1 1 0 011-1h6a1 1 0 011 1v9a2 2 0 01-2 2H8a2 2 0 01-2-2V8zM4 5a2 2 0 012-2h8a2 2 0 012 2v1H4V5z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-10" style="font-family: 'Poppins', sans-serif;">
                    Belum ada gambar yang diunggah.
                </div>
            @endforelse
        </div>
    </div>
@endsection