@extends('layouts.admin')

@section('title', 'Tambah Laporan Keuangan')

@section('content')
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.financial-reports.index') }}"
                class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tambah Laporan Keuangan</h1>
                <p class="mt-1 text-sm text-gray-600">Unggah laporan keuangan dalam format PDF</p>
            </div>
        </div>
    </div>

    <div class="max-w-2xl">
        <form action="{{ route('admin.financial-reports.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf

            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <div class="space-y-4">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Laporan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('title') border-red-500 @enderror"
                            placeholder="Masukkan judul laporan">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi
                        </label>
                        <textarea name="description" id="description" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror"
                            placeholder="Deskripsi singkat laporan (opsional)">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Upload PDF -->
                    <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Unggah File PDF</h3>
                        <div>
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
                                            <span id="file-label-text">Pilih file</span>
                                            <input id="file" name="file" type="file" accept="application/pdf"
                                                class="sr-only" onchange="showFileName(event)">
                                        </label>
                                        <p class="pl-1">atau drag & drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PDF maks 2MB</p>
                                    <p id="file-name" class="text-sm text-gray-700 font-medium mt-2 hidden"></p>
                                </div>
                            </div>
                            @error('file')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <!-- Tombol Aksi -->
                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('admin.financial-reports.index') }}"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out">
                            <i class="fas fa-times mr-2"></i>
                            Batal
                        </a>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 border border-transparent rounded-lg text-white hover:bg-blue-700 transition duration-150 ease-in-out">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Laporan
                        </button>
                    </div>
        </form>
    </div>
@endsection

<script>
    function showFileName(event) {
        const input = event.target;
        const fileNameDisplay = document.getElementById('file-name');
        const fileLabel = document.getElementById('file-label-text');

        if (input.files.length > 0) {
            const fileName = input.files[0].name;
            fileNameDisplay.textContent = "File dipilih: " + fileName;
            fileNameDisplay.classList.remove('hidden');
            fileLabel.textContent = "Ganti file";
        } else {
            fileNameDisplay.textContent = "";
            fileNameDisplay.classList.add('hidden');
            fileLabel.textContent = "Pilih file";
        }
    }
</script>