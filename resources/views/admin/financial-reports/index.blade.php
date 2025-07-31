@extends('layouts.admin') {{-- Ganti jika layout-mu bernama lain --}}

@section('title', 'Laporan Keuangan')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Laporan Keuangan</h1>
            <a href="{{ route('admin.financial-reports.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Laporan
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Judul</th>
                        <th class="px-4 py-2 border">Deskripsi</th>
                        <th class="px-4 py-2 border">File</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($financialReports as $index => $report)
                        <tr class="border-t">
                            <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $report->title }}</td>
                            <td class="px-4 py-2 border">{{ Str::limit($report->description, 100) }}</td>
                            <td class="px-4 py-2 border text-blue-600 underline">
                                <a href="{{ $report->file_url }}" target="_blank">Lihat</a> |
                                <a href="{{ $report->file_url }}" download>Download</a>
                            </td>
                            <td class="px-4 py-2 border text-center">
                                <a href="{{ route('admin.financial-reports.edit', $report->id) }}"
                                    class="text-yellow-600 hover:underline">Edit</a> |
                                <form action="{{ route('admin.financial-reports.destroy', $report->id) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">Belum ada laporan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection