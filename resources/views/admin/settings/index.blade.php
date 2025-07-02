@extends('layouts.admin')

@section('title', 'Kelola Setting')

@section('content')    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Kelola Setting</h1>
                <p class="mt-1 text-sm text-gray-600">Kelola pengaturan dan konfigurasi website (hanya edit value)</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <div class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-lg font-medium text-sm text-gray-600">
                    <i class="fas fa-lock mr-2"></i>
                    Setting Fixed
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 bg-blue-500 rounded-md">
                            <i class="fas fa-cogs text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Setting</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $settings->total() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 bg-green-500 rounded-md">
                            <i class="fas fa-layer-group text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Grup Setting</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $groups->count() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 bg-yellow-500 rounded-md">
                            <i class="fas fa-file-image text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">File/Gambar</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $settings->whereIn('type', ['image', 'file'])->count() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 bg-purple-500 rounded-md">
                            <i class="fas fa-calendar text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Bulan Ini</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $settings->where('created_at', '>=', now()->startOfMonth())->count() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Key Setting
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Value
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Grup
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Dibuat
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Aksi</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($settings as $setting)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                        @switch($setting->type)
                                            @case('image')
                                                <i class="fas fa-image text-green-600"></i>
                                                @break
                                            @case('file')
                                                <i class="fas fa-file text-blue-600"></i>
                                                @break
                                            @case('boolean')
                                                <i class="fas fa-toggle-on text-purple-600"></i>
                                                @break
                                            @case('number')
                                                <i class="fas fa-hashtag text-orange-600"></i>
                                                @break
                                            @case('email')
                                                <i class="fas fa-envelope text-red-600"></i>
                                                @break
                                            @case('url')
                                                <i class="fas fa-link text-cyan-600"></i>
                                                @break
                                            @case('textarea')
                                                <i class="fas fa-align-left text-indigo-600"></i>
                                                @break
                                            @default
                                                <i class="fas fa-font text-gray-600"></i>
                                        @endswitch
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $setting->key }}</div>
                                        <div class="text-sm text-gray-500">{{ ucfirst($setting->type) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($setting->type === 'image' && $setting->value)
                                    <img src="{{ Storage::url($setting->value) }}" alt="{{ $setting->key }}" class="h-10 w-10 rounded-lg object-cover">
                                @elseif($setting->type === 'boolean')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $setting->value == '1' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        <i class="fas fa-{{ $setting->value == '1' ? 'check' : 'times' }} mr-1"></i>
                                        {{ $setting->value == '1' ? 'True' : 'False' }}
                                    </span>
                                @elseif($setting->type === 'file' && $setting->value)
                                    <a href="{{ Storage::url($setting->value) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-download mr-1"></i>
                                        Download
                                    </a>
                                @else
                                    <div class="text-sm text-gray-900 max-w-xs truncate">{{ Str::limit($setting->value, 50) }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    {{ ucfirst($setting->type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ ucfirst($setting->group) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $setting->created_at->format('d M Y') }}
                            </td>                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.settings.show', $setting) }}"
                                        class="inline-flex items-center px-3 py-1 bg-gray-100 border border-transparent rounded-md font-medium text-xs text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                                        <i class="fas fa-eye mr-1"></i>
                                        Lihat
                                    </a>
                                    <a href="{{ route('admin.settings.edit', $setting) }}"
                                        class="inline-flex items-center px-3 py-1 bg-blue-100 border border-transparent rounded-md font-medium text-xs text-blue-700 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                        <i class="fas fa-edit mr-1"></i>
                                        Edit Value
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-cogs text-gray-300 text-5xl mb-4"></i>
                                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada setting</h3>
                                    <p class="text-gray-500 mb-4">Setting akan dimuat dari seeder</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($settings->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $settings->links() }}
            </div>
        @endif    </div>
@endsection
