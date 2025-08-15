@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Sejarah</h1>
        <a href="{{ route('admin.stories.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Tambah Sejarah
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($stories as $story)
            <div class="bg-white rounded-xl shadow-md overflow-hidden p-4 relative">
                <img src="{{ asset('storage/' . $story->image) }}" alt="{{ $story->title }}"
                    class="w-full h-48 object-cover rounded-md mb-4">
                <h1 class="text-lg font-bold text-black-800">{{ $story->year }}</h1>
                <h2 class="text-lg text-gray-800">{{ $story->title }}</h2>
                <p class="text-sm text-gray-600 mb-4">{{ $story->description }}</p>

                <div class="flex space-x-2">
                    <a href="{{ route('admin.stories.edit', $story->id) }}"
                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.stories.destroy', $story->id) }}" method="POST"
                        onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada penghargaan yang ditambahkan.</p>
        @endforelse
    </div>
@endsection