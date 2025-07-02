@extends('layouts.admin')

@section('title', 'Edit Setting')

@section('content')
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.settings.index') }}"
                class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Setting</h1>
                <p class="mt-1 text-sm text-gray-600">Perbarui value setting {{ $setting->key }} (key, type, dan group tidak dapat diubah)</p>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.settings.update', $setting) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Info -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Setting</h3>
                    <div class="space-y-4">
                        <!-- Key (Read Only) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Key Setting
                            </label>
                            <input type="text" value="{{ $setting->key }}" disabled
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-500 cursor-not-allowed">
                            <small class="text-gray-500">Key setting tidak dapat diubah</small>
                        </div>

                        <!-- Type (Read Only) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Tipe Data
                            </label>
                            <input type="text" value="{{ ucfirst($setting->type) }}" disabled
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-500 cursor-not-allowed">
                            <small class="text-gray-500">Tipe data tidak dapat diubah</small>
                        </div>

                        <!-- Group (Read Only) -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Grup Setting
                            </label>
                            <input type="text" value="{{ ucfirst($setting->group) }}" disabled
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-500 cursor-not-allowed">
                            <small class="text-gray-500">Grup setting tidak dapat diubah</small>
                        </div>

                        <!-- Value -->
                        <div id="value-field">
                            <label for="value" class="block text-sm font-medium text-gray-700 mb-2">
                                Value <span class="text-red-500">*</span>
                            </label>
                            @switch($setting->type)
                                @case('textarea')
                                    <textarea name="value" id="value-textarea" rows="4" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('value') border-red-500 @enderror" 
                                        placeholder="Masukkan nilai setting">{{ old('value', $setting->value) }}</textarea>
                                    @break
                                @case('boolean')
                                    <div class="flex items-center">
                                        <input type="checkbox" name="value" id="value-boolean" value="1" 
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" 
                                            {{ old('value', $setting->value) == '1' ? 'checked' : '' }}>
                                        <label for="value-boolean" class="ml-2 block text-sm text-gray-700">Aktifkan</label>
                                    </div>
                                    @break
                                @case('number')
                                    <input type="number" name="value" id="value-number" value="{{ old('value', $setting->value) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('value') border-red-500 @enderror" 
                                        placeholder="0">
                                    @break
                                @case('email')
                                    <input type="email" name="value" id="value-email" value="{{ old('value', $setting->value) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('value') border-red-500 @enderror" 
                                        placeholder="example@domain.com">
                                    @break
                                @case('url')
                                    <input type="url" name="value" id="value-url" value="{{ old('value', $setting->value) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('value') border-red-500 @enderror" 
                                        placeholder="https://example.com">
                                    @break
                                @case('image')
                                    <input type="file" name="value" id="value-image" accept="image/*"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('value') border-red-500 @enderror">
                                    @if($setting->value)
                                        <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                                            <p class="text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini:</p>
                                            <img src="{{ Storage::url($setting->value) }}" alt="{{ $setting->key }}" class="h-32 w-auto rounded-lg border shadow-sm">
                                            <p class="text-xs text-gray-500 mt-1">Upload gambar baru untuk mengganti</p>
                                        </div>
                                    @endif
                                    @break
                                @case('file')
                                    <input type="file" name="value" id="value-file"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('value') border-red-500 @enderror">
                                    @if($setting->value)
                                        <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                                            <p class="text-sm font-medium text-gray-700 mb-2">File Saat Ini:</p>
                                            <a href="{{ Storage::url($setting->value) }}" target="_blank" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                                <i class="fas fa-download mr-2"></i>
                                                {{ basename($setting->value) }}
                                            </a>
                                            <p class="text-xs text-gray-500 mt-1">Upload file baru untuk mengganti</p>
                                        </div>
                                    @endif
                                    @break                                @default
                                    <input type="text" name="value" id="value-text" value="{{ old('value', $setting->value) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('value') border-red-500 @enderror" 
                                        placeholder="Masukkan nilai setting">
                            @endswitch
                            @error('value')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Live Preview -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Live Preview</h3>
                    <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                        <div class="space-y-2">
                            <div class="text-sm font-medium text-gray-700">Key:</div>
                            <div class="text-gray-900 font-mono bg-white px-2 py-1 rounded border">{{ $setting->key }}</div>
                            
                            <div class="text-sm font-medium text-gray-700">Type:</div>
                            <div class="text-gray-600">{{ ucfirst($setting->type) }}</div>
                              <div class="text-sm font-medium text-gray-700">Group:</div>
                            <div class="text-blue-600">{{ ucfirst($setting->group) }}</div>
                            
                            <div class="text-sm font-medium text-gray-700">Current Value:</div>
                            <div id="preview-value" class="text-gray-900 max-w-full break-words">
                                @if($setting->type === 'image' && $setting->value)
                                    <img src="{{ Storage::url($setting->value) }}" alt="{{ $setting->key }}" class="h-16 w-auto rounded border">
                                @elseif($setting->type === 'boolean')
                                    <span class="{{ $setting->value == '1' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $setting->value == '1' ? 'True' : 'False' }}
                                    </span>
                                @elseif($setting->type === 'file' && $setting->value)
                                    {{ basename($setting->value) }}
                                @else
                                    {{ Str::limit($setting->value, 100) }}
                                @endif
                            </div>
                        </div>
                    </div>                </div>

                <!-- Actions -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                    <div class="flex flex-col space-y-3">
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                            <i class="fas fa-save mr-2"></i>
                            Update Value
                        </button>
                        <a href="{{ route('admin.settings.index') }}"
                            class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                            <i class="fas fa-times mr-2"></i>
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const valueInput = document.querySelector('#value-field input, #value-field textarea, #value-field select');
                const previewValue = document.getElementById('preview-value');

                if (valueInput && previewValue) {
                    function updatePreview() {
                        const type = '{{ $setting->type }}';
                        
                        if (type === 'boolean') {
                            const isChecked = valueInput.checked;
                            previewValue.innerHTML = isChecked ? 
                                '<span class="text-green-600">True</span>' : 
                                '<span class="text-red-600">False</span>';
                        } else if (type === 'image' || type === 'file') {
                            if (valueInput.files && valueInput.files[0]) {
                                previewValue.textContent = valueInput.files[0].name;
                            }
                        } else {
                            previewValue.textContent = valueInput.value || '{{ $setting->value }}';
                        }
                    }

                    valueInput.addEventListener('input', updatePreview);
                    valueInput.addEventListener('change', updatePreview);
                }
            });
        </script>
    @endpush
@endsection
