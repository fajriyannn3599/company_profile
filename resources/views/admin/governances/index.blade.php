@extends('layouts.admin')

@section('title', 'Tata Kelola')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Tata Kelola</h1>
            <a href="{{ route('admin.governances.create') }}"
                class="bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded-md hover:bg-blue-700 transition">
                + Tambah Piagam
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-50 text-gray-600 font-semibold">
                        <tr>
                            <th class="px-6 py-3 text-left">No</th>
                            <th class="px-6 py-3 text-left">Judul</th>
                            <th class="px-6 py-3 text-left">Deskripsi</th>
                            <th class="px-6 py-3 text-left">File</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-gray-700">
                        @forelse ($governances as $index => $governance)
                            <tr class="border-t">
                                <td class="px-6 py-4 text-center">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-medium">{{ $governance->title }}</td>
                                <td class="px-6 py-4">{{ Str::limit($governance->description, 100) }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ $governance->file_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ $governance->file_url }}" download class="text-green-600 hover:text-green-800">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-center space-x-2">
                                    <a href="{{ route('admin.governances.edit', $governance->id) }}"
                                        class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.governances.destroy', $governance->id) }}" method="POST"
                                        class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada piagam.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection