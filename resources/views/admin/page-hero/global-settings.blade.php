@extends('layouts.admin')

@section('title', 'Global Hero Settings')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Global Hero Settings</h1>
                    <p class="text-gray-600 mt-1">Configure default settings for hero sections across all pages</p>
                </div>
                <a href="{{ route('admin.page-hero.index') }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Page Heroes
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.page-hero.update-global-settings') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($heroSettings as $setting)
                        <div class="form-group">
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ ucwords(str_replace(['hero_', '_'], ['', ' '], $setting->key)) }}
                            </label>
                            
                            @if($setting->type === 'textarea')
                                <textarea name="settings[{{ $loop->index }}][value]" 
                                          id="{{ $setting->key }}"
                                          rows="3"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ $setting->value }}</textarea>
                            
                            @elseif($setting->type === 'color')
                                <input type="color" 
                                       name="settings[{{ $loop->index }}][value]" 
                                       id="{{ $setting->key }}"
                                       value="{{ $setting->value }}"
                                       class="w-full h-10 border border-gray-300 rounded-lg">
                            
                            @elseif($setting->type === 'number')
                                <input type="number" 
                                       name="settings[{{ $loop->index }}][value]" 
                                       id="{{ $setting->key }}"
                                       value="{{ $setting->value }}"
                                       min="0" max="100"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            
                            @elseif($setting->type === 'select' && str_contains($setting->key, 'text_color'))
                                <select name="settings[{{ $loop->index }}][value]" 
                                        id="{{ $setting->key }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="white" {{ $setting->value === 'white' ? 'selected' : '' }}>White</option>
                                    <option value="dark" {{ $setting->value === 'dark' ? 'selected' : '' }}>Dark</option>
                                </select>
                            
                            @elseif($setting->type === 'select' && str_contains($setting->key, 'text_alignment'))
                                <select name="settings[{{ $loop->index }}][value]" 
                                        id="{{ $setting->key }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="left" {{ $setting->value === 'left' ? 'selected' : '' }}>Left</option>
                                    <option value="center" {{ $setting->value === 'center' ? 'selected' : '' }}>Center</option>
                                    <option value="right" {{ $setting->value === 'right' ? 'selected' : '' }}>Right</option>
                                </select>
                            
                            @elseif($setting->type === 'select' && str_contains($setting->key, 'height'))
                                <select name="settings[{{ $loop->index }}][value]" 
                                        id="{{ $setting->key }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="small" {{ $setting->value === 'small' ? 'selected' : '' }}>Small (40vh)</option>
                                    <option value="medium" {{ $setting->value === 'medium' ? 'selected' : '' }}>Medium (60vh)</option>
                                    <option value="large" {{ $setting->value === 'large' ? 'selected' : '' }}>Large (80vh)</option>
                                    <option value="fullscreen" {{ $setting->value === 'fullscreen' ? 'selected' : '' }}>Fullscreen (100vh)</option>
                                </select>
                            
                            @elseif($setting->type === 'boolean')
                                <div class="flex items-center">
                                    <input type="hidden" name="settings[{{ $loop->index }}][value]" value="0">
                                    <input type="checkbox" 
                                           name="settings[{{ $loop->index }}][value]" 
                                           id="{{ $setting->key }}"
                                           value="1"
                                           {{ $setting->value ? 'checked' : '' }}
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="{{ $setting->key }}" class="ml-2 text-sm text-gray-700">Enable</label>
                                </div>
                            
                            @else
                                <input type="{{ $setting->type }}" 
                                       name="settings[{{ $loop->index }}][value]" 
                                       id="{{ $setting->key }}"
                                       value="{{ $setting->value }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @endif
                            
                            <input type="hidden" name="settings[{{ $loop->index }}][key]" value="{{ $setting->key }}">
                            
                            @if($setting->key === 'hero_default_overlay_opacity')
                                <small class="text-gray-500 mt-1">Overlay opacity in percentage (0-100)</small>
                            @elseif($setting->key === 'hero_default_overlay_color')
                                <small class="text-gray-500 mt-1">Background overlay color</small>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('admin.page-hero.index') }}" 
                           class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-save mr-2"></i>Update Settings
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
