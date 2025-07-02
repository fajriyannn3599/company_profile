@extends('layouts.admin')

@section('title', 'Detail Setting')

@section('content')
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('admin.settings.index') }}"
                class="text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detail Setting</h1>
                <p class="mt-1 text-sm text-gray-600">Informasi lengkap setting {{ $setting->key }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Setting Details -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Setting</h3>
                        <div class="flex items-center space-x-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                {{ ucfirst($setting->type) }}
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ ucfirst($setting->group) }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="px-6 py-4">
                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Key Setting</dt>
                            <dd class="mt-1 text-sm text-gray-900 font-mono bg-gray-50 px-2 py-1 rounded">{{ $setting->key }}</dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Tipe Data</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    <i class="fas fa-{{ $setting->type === 'image' ? 'image' : ($setting->type === 'file' ? 'file' : ($setting->type === 'boolean' ? 'toggle-on' : ($setting->type === 'number' ? 'hashtag' : ($setting->type === 'email' ? 'envelope' : ($setting->type === 'url' ? 'link' : ($setting->type === 'textarea' ? 'align-left' : 'font')))))) }} mr-1"></i>
                                    {{ ucfirst($setting->type) }}
                                </span>
                            </dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Grup Setting</dt>
                            <dd class="mt-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-layer-group mr-1"></i>
                                    {{ ucfirst($setting->group) }}
                                </span>
                            </dd>
                        </div>
                        
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Dibuat</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $setting->created_at->format('d M Y H:i') }}</dd>
                        </div>
                        
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Value</dt>
                            <dd class="mt-1">
                                @if($setting->type === 'image' && $setting->value)
                                    <div class="mt-2">
                                        <img src="{{ Storage::url($setting->value) }}" alt="{{ $setting->key }}" 
                                            class="max-w-xs h-auto rounded-lg border border-gray-200">
                                    </div>
                                @elseif($setting->type === 'file' && $setting->value)
                                    <div class="mt-2">
                                        <a href="{{ Storage::url($setting->value) }}" target="_blank" 
                                            class="inline-flex items-center px-3 py-2 bg-blue-100 text-blue-800 rounded-lg hover:bg-blue-200 transition duration-150 ease-in-out">
                                            <i class="fas fa-download mr-2"></i>
                                            Download File
                                        </a>
                                    </div>
                                @elseif($setting->type === 'boolean')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $setting->value == '1' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        <i class="fas fa-{{ $setting->value == '1' ? 'check' : 'times' }} mr-2"></i>
                                        {{ $setting->value == '1' ? 'True' : 'False' }}
                                    </span>
                                @elseif($setting->type === 'url')
                                    <a href="{{ $setting->value }}" target="_blank" 
                                        class="text-blue-600 hover:text-blue-800 hover:underline">
                                        {{ $setting->value }}
                                        <i class="fas fa-external-link-alt ml-1 text-xs"></i>
                                    </a>
                                @elseif($setting->type === 'email')
                                    <a href="mailto:{{ $setting->value }}" 
                                        class="text-blue-600 hover:text-blue-800 hover:underline">
                                        {{ $setting->value }}
                                        <i class="fas fa-envelope ml-1 text-xs"></i>
                                    </a>
                                @elseif($setting->type === 'textarea')
                                    <div class="bg-gray-50 rounded-lg p-3 text-sm text-gray-900 whitespace-pre-wrap">{{ $setting->value }}</div>
                                @else
                                    <div class="text-sm text-gray-900">{{ $setting->value }}</div>
                                @endif
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">            <!-- Actions -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Aksi</h3>
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('admin.settings.edit', $setting) }}"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Value
                    </a>
                    <a href="{{ route('admin.settings.index') }}"
                        class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out text-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Setting Info -->
            <div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Sistem</h3>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-500">ID:</span>
                        <span class="text-gray-900 font-mono">{{ $setting->id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Dibuat:</span>
                        <span class="text-gray-900">{{ $setting->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Diperbarui:</span>
                        <span class="text-gray-900">{{ $setting->updated_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>            </div>
        </div>
    </div>
@endsection
