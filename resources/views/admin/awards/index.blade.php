@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Penghargaan</h1>
        <a href="{{ route('admin.awards.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Tambah Penghargaan
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($awards as $award)
            <div class="bg-white rounded-xl shadow-md overflow-hidden p-4 relative">
                <img src="{{ asset('storage/' . $award->image) }}" alt="{{ $award->title }}"
                    class="w-full h-48 object-cover rounded-md mb-4">
                <h2 class="text-lg font-semibold text-gray-800">{{ $award->title }}</h2>
                <p class="text-sm text-gray-600 mb-4">{{ $award->description }}</p>

                <div class="flex space-x-2">
                    <a href="{{ route('admin.awards.edit', $award->id) }}"
                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.awards.destroy', $award->id) }}" method="POST"
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