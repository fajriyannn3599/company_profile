{{-- resources/views/admin/histories/index.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Sejarah Perusahaan</h1>

        <a href="{{ route('admin.histories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
            + Tambah Sejarah
        </a>

        <table class="w-full mt-6 border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 border">Tahun</th>
                    <th class="p-3 border">Judul</th>
                    <th class="p-3 border">Deskripsi</th>
                    <th class="p-3 border">Gambar</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($histories as $history)
                    <tr>
                        <td class="p-3 border">{{ $history->year }}</td>
                        <td class="p-3 border">{{ $history->title }}</td>
                        <td class="p-3 border">{{ Str::limit($history->description, 50) }}</td>
                        <td class="p-3 border">
                            @if($history->image)
                                <img src="{{ asset('storage/' . $history->image) }}" class="w-16 h-16 object-cover rounded">
                            @endif
                        </td>
                        <td class="p-3 border">
                            <a href="{{ route('admin.histories.edit', $history) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                            <form action="{{ route('histories.destroy', $history) }}" method="POST" class="inline"
                                onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection