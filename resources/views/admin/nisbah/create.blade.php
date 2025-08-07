@extends('layouts.admin')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto mt-8">
        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
            <svg class="w-6 h-6 text-red-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 2a4 4 0 014 4v1h2a2 2 0 012 2v1h-2v6a2 2 0 01-2 2h-1v1a2 2 0 11-4 0v-1H9v1a2 2 0 11-4 0v-1H4a2 2 0 01-2-2v-6H0V9a2 2 0 012-2h2V6a4 4 0 014-4h2z" />
            </svg>
            Upload Gambar Nisbah
        </h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.nisbah.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="title" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Upload Gambar</label>
                <input type="file" name="image" accept="image/*" required class="mt-1 block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0
                              file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100" />
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md shadow hover:bg-red-700">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M3 3a2 2 0 012-2h3a2 2 0 012 2v1H3V3zM3 6h8a2 2 0 012 2v9a2 2 0 01-2 2H3a2 2 0 01-2-2V8a2 2 0 012-2zm14-1h-3V3a2 2 0 00-2-2h-1v2a2 2 0 002 2h3v1z" />
                    </svg>
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection