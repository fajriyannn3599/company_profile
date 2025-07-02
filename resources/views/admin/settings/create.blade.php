@extends('layouts.admin')

@section('title', 'Tambah Setting')

@section('content')
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.settings.index') }}"
                class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Tambah Setting</h1>
                <p class="mt-1 text-sm text-gray-600">Buat setting baru untuk website</p>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Info -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Setting</h3>
                    <div class="space-y-4">
                        <!-- Key -->
                        <div>
                            <label for="key" class="block text-sm font-medium text-gray-700 mb-2">
                                Key Setting <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="key" id="key" value="{{ old('key') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('key') border-red-500 @enderror"
                                placeholder="company_name" required>
                            <small class="text-gray-500">Gunakan format snake_case. Contoh: company_name, site_logo</small>
                            @error('key')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Type -->
                        <div>
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                                Tipe Data <span class="text-red-500">*</span>
                            </label>
                            <select name="type" id="type" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('type') border-red-500 @enderror">
                                <option value="">Pilih Tipe</option>
                                <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>Text</option>
                                <option value="textarea" {{ old('type') == 'textarea' ? 'selected' : '' }}>Textarea</option>
                                <option value="boolean" {{ old('type') == 'boolean' ? 'selected' : '' }}>Boolean (True/False)</option>
                                <option value="number" {{ old('type') == 'number' ? 'selected' : '' }}>Number</option>
                                <option value="email" {{ old('type') == 'email' ? 'selected' : '' }}>Email</option>
                                <option value="url" {{ old('type') == 'url' ? 'selected' : '' }}>URL</option>
                                <option value="image" {{ old('type') == 'image' ? 'selected' : '' }}>Image</option>
                                <option value="file" {{ old('type') == 'file' ? 'selected' : '' }}>File</option>
                            </select>
                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Value -->
                        <div id="value-field">
                            <label for="value" class="block text-sm font-medium text-gray-700 mb-2">
                                Value <span class="text-red-500">*</span>
                            </label>
                            <!-- Default text input -->
                            <input type="text" name="value" id="value-text" value="{{ old('value') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('value') border-red-500 @enderror"
                                placeholder="Masukkan nilai setting">
                            @error('value')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Group -->
                        <div>
                            <label for="group" class="block text-sm font-medium text-gray-700 mb-2">
                                Grup Setting <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="group" id="group" value="{{ old('group', 'general') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('group') border-red-500 @enderror"
                                placeholder="general" required>
                            <small class="text-gray-500">Contoh: general, company, social_media, contact</small>
                            @error('group')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Live Preview -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Live Preview</h3>
                    <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                        <div class="space-y-2">
                            <div class="text-sm font-medium text-gray-700">Key:</div>
                            <div id="preview-key" class="text-gray-900 font-mono bg-white px-2 py-1 rounded border">-</div>
                            
                            <div class="text-sm font-medium text-gray-700">Type:</div>
                            <div id="preview-type" class="text-gray-600">-</div>
                            
                            <div class="text-sm font-medium text-gray-700">Group:</div>
                            <div id="preview-group" class="text-blue-600">-</div>
                            
                            <div class="text-sm font-medium text-gray-700">Value:</div>
                            <div id="preview-value" class="text-gray-900 max-w-full break-words">-</div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                    <div class="flex flex-col space-y-3">
                        <button type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Setting
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
                const typeSelect = document.getElementById('type');
                const valueField = document.getElementById('value-field');
                const keyInput = document.getElementById('key');
                const groupInput = document.getElementById('group');

                // Live preview elements
                const previewKey = document.getElementById('preview-key');
                const previewType = document.getElementById('preview-type');
                const previewGroup = document.getElementById('preview-group');
                const previewValue = document.getElementById('preview-value');

                // Update preview
                function updatePreview() {
                    previewKey.textContent = keyInput.value || '-';
                    previewType.textContent = typeSelect.options[typeSelect.selectedIndex].text || '-';
                    previewGroup.textContent = groupInput.value || '-';
                    
                    const currentInput = valueField.querySelector('input, textarea, select');
                    if (currentInput) {
                        if (typeSelect.value === 'boolean') {
                            previewValue.innerHTML = currentInput.checked ? 
                                '<span class="text-green-600">True</span>' : 
                                '<span class="text-red-600">False</span>';
                        } else if (typeSelect.value === 'image' || typeSelect.value === 'file') {
                            previewValue.textContent = currentInput.files && currentInput.files[0] ? 
                                currentInput.files[0].name : '-';
                        } else {
                            previewValue.textContent = currentInput.value || '-';
                        }
                    }
                }

                // Event listeners for preview
                keyInput.addEventListener('input', updatePreview);
                groupInput.addEventListener('input', updatePreview);
                typeSelect.addEventListener('change', updatePreview);

                // Change input field based on type
                typeSelect.addEventListener('change', function() {
                    const type = this.value;
                    let inputHtml = '';

                    switch(type) {
                        case 'textarea':
                            inputHtml = `<textarea name="value" id="value-textarea" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Masukkan nilai setting">${'{{ old('value') }}'}</textarea>`;
                            break;
                        case 'boolean':
                            inputHtml = `<div class="flex items-center">
                                <input type="checkbox" name="value" id="value-boolean" value="1" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" ${old('value') ? 'checked' : ''}>
                                <label for="value-boolean" class="ml-2 block text-sm text-gray-700">Aktifkan</label>
                            </div>`;
                            break;
                        case 'number':
                            inputHtml = `<input type="number" name="value" id="value-number" value="${'{{ old('value') }}'}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="0">`;
                            break;
                        case 'email':
                            inputHtml = `<input type="email" name="value" id="value-email" value="${'{{ old('value') }}'}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="example@domain.com">`;
                            break;
                        case 'url':
                            inputHtml = `<input type="url" name="value" id="value-url" value="${'{{ old('value') }}'}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="https://example.com">`;
                            break;
                        case 'image':
                            inputHtml = `<input type="file" name="value" id="value-image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">`;
                            break;
                        case 'file':
                            inputHtml = `<input type="file" name="value" id="value-file" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">`;
                            break;
                        default:
                            inputHtml = `<input type="text" name="value" id="value-text" value="${'{{ old('value') }}'}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Masukkan nilai setting">`;
                    }

                    const label = valueField.querySelector('label');
                    const error = valueField.querySelector('.text-red-600');
                    valueField.innerHTML = '';
                    valueField.appendChild(label);
                    valueField.insertAdjacentHTML('beforeend', inputHtml);
                    if (error) valueField.appendChild(error);

                    // Add event listener to new input for preview
                    const newInput = valueField.querySelector('input, textarea, select');
                    if (newInput) {
                        newInput.addEventListener('input', updatePreview);
                        newInput.addEventListener('change', updatePreview);
                    }

                    updatePreview();
                });

                // Initial preview update
                updatePreview();
            });
        </script>
    @endpush
@endsection
