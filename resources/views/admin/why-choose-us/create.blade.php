@extends('layouts.admin')

@section('title', 'Tambah Item - Mengapa Memilih Kami')

@section('content')
<div class="mb-6">
    <div class="flex items-center space-x-4">
        <a href="{{ route('admin.why-choose-us.index') }}" 
           class="inline-flex items-center px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Tambah Item Baru</h1>
            <p class="mt-1 text-sm text-gray-600">Menambah alasan mengapa klien memilih layanan kami</p>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 rounded-lg p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <i class="fas fa-exclamation-circle text-red-400"></i>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800">Terdapat kesalahan:</h3>
                <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<div class="bg-white shadow-sm border border-gray-200 rounded-lg">
    <form action="{{ route('admin.why-choose-us.store') }}" method="POST" class="p-6 space-y-6">
        @csrf

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                Judul <span class="text-red-500">*</span>
            </label>
            <input type="text" name="title" id="title" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                   value="{{ old('title') }}" 
                   placeholder="Contoh: Kualitas Terjamin"
                   required>
            <p class="mt-1 text-sm text-gray-500">Judul yang menarik untuk menjelaskan keunggulan</p>
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                Deskripsi <span class="text-red-500">*</span>
            </label>
            <textarea name="description" id="description" rows="4"
                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      placeholder="Jelaskan detail mengapa klien harus memilih layanan kami..."
                      required>{{ old('description') }}</textarea>
            <p class="mt-1 text-sm text-gray-500">Penjelasan detail tentang keunggulan ini</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Icon -->
            <div>
                <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">
                    Icon (Font Awesome)
                </label>
                <input type="text" name="icon" id="icon" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       value="{{ old('icon') }}" 
                       placeholder="fas fa-star">
                <p class="mt-1 text-sm text-gray-500">
                    Contoh: fas fa-star, fas fa-shield-alt, fas fa-award
                    <a href="https://fontawesome.com/icons" target="_blank" class="text-blue-600 hover:text-blue-700">Lihat icon</a>
                </p>
                <div class="mt-2 p-3 bg-gray-50 rounded-lg">
                    <div class="text-sm text-gray-600 mb-2">Preview:</div>
                    <div id="iconPreview" class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-star text-blue-600 text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- Color -->
            <div>
                <label for="color" class="block text-sm font-medium text-gray-700 mb-2">
                    Warna Tema <span class="text-red-500">*</span>
                </label>
                <select name="color" id="color" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required>
                    <option value="">Pilih Warna</option>
                    <option value="blue" {{ old('color') == 'blue' ? 'selected' : '' }}>Biru</option>
                    <option value="green" {{ old('color') == 'green' ? 'selected' : '' }}>Hijau</option>
                    <option value="purple" {{ old('color') == 'purple' ? 'selected' : '' }}>Ungu</option>
                    <option value="yellow" {{ old('color') == 'yellow' ? 'selected' : '' }}>Kuning</option>
                    <option value="red" {{ old('color') == 'red' ? 'selected' : '' }}>Merah</option>
                    <option value="indigo" {{ old('color') == 'indigo' ? 'selected' : '' }}>Indigo</option>
                    <option value="pink" {{ old('color') == 'pink' ? 'selected' : '' }}>Pink</option>
                    <option value="gray" {{ old('color') == 'gray' ? 'selected' : '' }}>Abu-abu</option>
                </select>
                <div class="mt-2 p-3 bg-gray-50 rounded-lg">
                    <div class="text-sm text-gray-600 mb-2">Preview:</div>
                    <div id="colorPreview" class="flex flex-wrap gap-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            Biru
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Sort Order -->
            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">
                    Urutan Tampilan
                </label>
                <input type="number" name="sort_order" id="sort_order" min="0"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       value="{{ old('sort_order') }}" 
                       placeholder="0">
                <p class="mt-1 text-sm text-gray-500">Angka kecil akan ditampilkan lebih dahulu. Kosongkan untuk otomatis</p>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <div class="flex items-center">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" id="is_active" value="1" 
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                           {{ old('is_active', '1') ? 'checked' : '' }}>
                    <label for="is_active" class="ml-2 text-sm text-gray-700">
                        Aktif (tampilkan di website)
                    </label>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.why-choose-us.index') }}" 
               class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-150 ease-in-out">
                Batal
            </a>
            <button type="submit" 
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                <i class="fas fa-save mr-2"></i>
                Simpan
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const iconInput = document.getElementById('icon');
    const iconPreview = document.getElementById('iconPreview');
    const colorSelect = document.getElementById('color');
    const colorPreview = document.getElementById('colorPreview');

    // Icon preview
    iconInput.addEventListener('input', function() {
        const iconClass = this.value || 'fas fa-star';
        const color = colorSelect.value || 'blue';
        
        iconPreview.innerHTML = `<i class="${iconClass} text-${color}-600 text-lg"></i>`;
        iconPreview.className = `w-12 h-12 bg-${color}-100 rounded-xl flex items-center justify-center`;
    });

    // Color preview
    colorSelect.addEventListener('change', function() {
        const color = this.value || 'blue';
        const colorNames = {
            'blue': 'Biru',
            'green': 'Hijau', 
            'purple': 'Ungu',
            'yellow': 'Kuning',
            'red': 'Merah',
            'indigo': 'Indigo',
            'pink': 'Pink',
            'gray': 'Abu-abu'
        };
        
        colorPreview.innerHTML = `
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-${color}-100 text-${color}-800">
                ${colorNames[color] || color}
            </span>
        `;
        
        // Update icon preview color
        const iconClass = iconInput.value || 'fas fa-star';
        iconPreview.innerHTML = `<i class="${iconClass} text-${color}-600 text-lg"></i>`;
        iconPreview.className = `w-12 h-12 bg-${color}-100 rounded-xl flex items-center justify-center`;
    });
});
</script>
@endpush
@endsection
