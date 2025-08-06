@extends('layouts.admin')

@section('title', 'Edit Piagam')

@section('content')
    <div class="py-8">
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Edit Piagam</h2>

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.governances.update', $governance->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('title', $governance->title) }}" required>
                </div>

                {{-- Description --}}
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-blue-500 focus:border-blue-500"
                        required>{{ old('description', $governance->description) }}</textarea>
                </div>

                {{-- Upload PDF --}}
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6 mb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Unggah File PDF</h3>
                    <label for="file" class="block text-sm font-medium text-gray-700 mb-2">
                        Upload PDF <span class="text-red-500">*</span>
                    </label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition duration-150 ease-in-out">
                        <div class="space-y-1 text-center">
                            <i class="fas fa-file-pdf text-red-500 text-3xl"></i>
                            <div class="flex text-sm text-gray-600 justify-center">
                                <label for="file"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Pilih file</span>
                                    <input id="file" name="file" type="file" accept="application/pdf" class="sr-only">
                                </label>
                                <p class="pl-1">atau drag & drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PDF maks 2MB</p>
                        </div>
                    </div>
                    @error('file')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    {{-- Preview file saat ini --}}
                    @if ($governance->file_url)
                        <div class="mt-4">
                            <p class="text-sm text-gray-600">File saat ini:</p>
                            <a href="{{ $governance->file_url }}" target="_blank" class="text-blue-600 underline">
                                Lihat File Saat Ini
                            </a>
                        </div>
                    @endif
                </div>

                {{-- Submit --}}
                <div class="flex justify-end">
                    <a href="{{ route('admin.governances.index') }}"
                        class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm px-4 py-2 rounded mr-3">
                        Batal
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-5 py-2 rounded">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection