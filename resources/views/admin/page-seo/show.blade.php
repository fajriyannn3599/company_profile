@extends('layouts.admin')

@section('title', 'Detail SEO Halaman')

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail SEO Halaman</h1>
            <p class="mt-1 text-sm text-gray-600">Pengaturan SEO untuk halaman {{ ucfirst($pageSeo->page_identifier) }}</p>
        </div>
        <div class="mt-4 sm:mt-0 flex space-x-3">
            <a href="{{ route('admin.page-seo.edit', $pageSeo) }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                <i class="fas fa-edit mr-2"></i>
                Edit SEO
            </a>
            <a href="{{ route('admin.page-seo.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-150 ease-in-out">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Basic Information -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Informasi Dasar SEO</h3>
            </div>
            <div class="px-6 py-4">
                <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Halaman</dt>
                        <dd class="mt-1">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                {{ ucfirst($pageSeo->page_identifier) }}
                            </span>
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                        <dd class="mt-1">
                            @if($pageSeo->is_active)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-1"></i>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    <i class="fas fa-times mr-1"></i>
                                    Nonaktif
                                </span>
                            @endif
                        </dd>
                    </div>

                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">Meta Title</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $pageSeo->title ?: 'Tidak ada title' }}
                            @if($pageSeo->title)
                                <span class="ml-2 text-xs text-gray-400">({{ strlen($pageSeo->title) }} karakter)</span>
                            @endif
                        </dd>
                    </div>

                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">Meta Description</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $pageSeo->description ?: 'Tidak ada description' }}
                            @if($pageSeo->description)
                                <span class="ml-2 text-xs text-gray-400">({{ strlen($pageSeo->description) }} karakter)</span>
                            @endif
                        </dd>
                    </div>

                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500">Keywords</dt>
                        <dd class="mt-1">
                            @if($pageSeo->keywords)
                                <div class="flex flex-wrap gap-1">
                                    @foreach(explode(',', $pageSeo->keywords) as $keyword)
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-800">
                                            {{ trim($keyword) }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <span class="text-sm text-gray-400">Tidak ada keywords</span>
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Open Graph Settings -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Open Graph (Facebook)</h3>
            </div>
            <div class="px-6 py-4">
                <dl class="grid grid-cols-1 gap-6">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">OG Title</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $pageSeo->og_title ?: 'Tidak diatur' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">OG Description</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $pageSeo->og_description ?: 'Tidak diatur' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">OG Image</dt>
                        <dd class="mt-1">
                            @if($pageSeo->og_image)
                                <img src="{{ Storage::url($pageSeo->og_image) }}" alt="OG Image" class="w-64 h-32 object-cover rounded-lg border">
                            @else
                                <span class="text-sm text-gray-400">Tidak ada gambar</span>
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Twitter Card Settings -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Twitter Card</h3>
            </div>
            <div class="px-6 py-4">
                <dl class="grid grid-cols-1 gap-6">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Twitter Title</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $pageSeo->twitter_title ?: 'Tidak diatur' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Twitter Description</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $pageSeo->twitter_description ?: 'Tidak diatur' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Twitter Image</dt>
                        <dd class="mt-1">
                            @if($pageSeo->twitter_image)
                                <img src="{{ Storage::url($pageSeo->twitter_image) }}" alt="Twitter Image" class="w-64 h-32 object-cover rounded-lg border">
                            @else
                                <span class="text-sm text-gray-400">Tidak ada gambar</span>
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Schema Markup -->
        @if($pageSeo->schema_markup)
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Schema Markup</h3>
            </div>
            <div class="px-6 py-4">
                <pre class="bg-gray-50 rounded-lg p-4 text-sm text-gray-800 overflow-x-auto"><code>{{ $pageSeo->schema_markup }}</code></pre>
            </div>
        </div>
        @endif

        <!-- Timestamps -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Informasi Waktu</h3>
            </div>
            <div class="px-6 py-4">
                <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Dibuat</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $pageSeo->created_at->format('d M Y H:i') }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Terakhir Diupdate</dt>
                        <dd class="mt-1 text-sm text-gray-900">
                            {{ $pageSeo->updated_at->format('d M Y H:i') }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="lg:col-span-1 space-y-6">
        <!-- SEO Preview -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Preview SEO</h3>
            </div>
            <div class="p-6 space-y-6">
                <!-- Google Preview -->
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-3">Preview Google</h4>
                    <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                        <div class="text-blue-600 text-lg font-medium hover:underline cursor-pointer">
                            {{ $pageSeo->title ?: 'Meta Title' }}
                        </div>
                        <div class="text-green-600 text-sm">
                            {{ url('/') }}/{{ $pageSeo->page_identifier }}
                        </div>
                        <div class="text-gray-600 text-sm mt-1">
                            {{ $pageSeo->description ?: 'Meta description tidak tersedia' }}
                        </div>
                    </div>
                </div>

                <!-- Facebook Preview -->
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-3">Preview Facebook</h4>
                    <div class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                        <div class="h-32 bg-gray-200 flex items-center justify-center text-gray-400 text-sm">
                            @if($pageSeo->og_image)
                                <img src="{{ Storage::url($pageSeo->og_image) }}" class="w-full h-full object-cover" alt="OG Image">
                            @else
                                <i class="fas fa-image text-2xl"></i>
                            @endif
                        </div>
                        <div class="p-3">
                            <div class="font-medium text-gray-900 text-sm">
                                {{ $pageSeo->og_title ?: $pageSeo->title ?: 'OG Title' }}
                            </div>
                            <div class="text-gray-500 text-xs mt-1">
                                {{ Str::limit($pageSeo->og_description ?: $pageSeo->description ?: 'OG Description tidak tersedia', 100) }}
                            </div>
                            <div class="text-gray-400 text-xs mt-1">{{ parse_url(url('/'), PHP_URL_HOST) }}</div>
                        </div>
                    </div>
                </div>

                <!-- Twitter Preview -->
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-3">Preview Twitter</h4>
                    <div class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                        <div class="h-32 bg-gray-200 flex items-center justify-center text-gray-400 text-sm">
                            @if($pageSeo->twitter_image)
                                <img src="{{ Storage::url($pageSeo->twitter_image) }}" class="w-full h-full object-cover" alt="Twitter Image">
                            @else
                                <i class="fab fa-twitter text-2xl"></i>
                            @endif
                        </div>
                        <div class="p-3">
                            <div class="font-medium text-gray-900 text-sm">
                                {{ $pageSeo->twitter_title ?: $pageSeo->title ?: 'Twitter Title' }}
                            </div>
                            <div class="text-gray-500 text-xs mt-1">
                                {{ Str::limit($pageSeo->twitter_description ?: $pageSeo->description ?: 'Twitter description tidak tersedia', 100) }}
                            </div>
                            <div class="text-gray-400 text-xs mt-1">{{ parse_url(url('/'), PHP_URL_HOST) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Score Card -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Skor SEO</h3>
            </div>
            <div class="p-6">
                @php
                    $score = 0;
                    $total = 0;
                    $checks = [
                        ['condition' => !empty($pageSeo->title), 'label' => 'Meta Title', 'points' => 20],
                        ['condition' => !empty($pageSeo->description), 'label' => 'Meta Description', 'points' => 20],
                        ['condition' => !empty($pageSeo->keywords), 'label' => 'Keywords', 'points' => 15],
                        ['condition' => !empty($pageSeo->og_title), 'label' => 'OG Title', 'points' => 15],
                        ['condition' => !empty($pageSeo->og_description), 'label' => 'OG Description', 'points' => 15],
                        ['condition' => !empty($pageSeo->og_image), 'label' => 'OG Image', 'points' => 15]
                    ];
                    
                    foreach($checks as $check) {
                        $total += $check['points'];
                        if($check['condition']) {
                            $score += $check['points'];
                        }
                    }
                    
                    $percentage = $total > 0 ? round(($score / $total) * 100) : 0;
                @endphp

                <div class="text-center mb-4">
                    <div class="text-3xl font-bold {{ $percentage >= 80 ? 'text-green-600' : ($percentage >= 60 ? 'text-yellow-600' : 'text-red-600') }}">
                        {{ $percentage }}%
                    </div>
                    <div class="text-sm text-gray-500">Skor SEO</div>
                </div>

                <div class="space-y-2">
                    @foreach($checks as $check)
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-700">{{ $check['label'] }}</span>
                            @if($check['condition'])
                                <i class="fas fa-check-circle text-green-500"></i>
                            @else
                                <i class="fas fa-times-circle text-red-500"></i>
                            @endif
                        </div>
                    @endforeach
                </div>

                @if($percentage < 80)
                    <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <div class="text-sm text-yellow-800">
                            <strong>Saran:</strong> Lengkapi semua field SEO untuk meningkatkan skor.
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white shadow-sm border border-gray-200 rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Aksi Cepat</h3>
            </div>
            <div class="p-6 space-y-3">
                <a href="{{ route('admin.page-seo.edit', $pageSeo) }}" 
                   class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <i class="fas fa-edit mr-2"></i>
                    Edit SEO
                </a>
                
                <button type="button" 
                        onclick="openDeleteModal({{ $pageSeo->id }}, '{{ $pageSeo->title }}', '{{ $pageSeo->page_identifier }}')"
                        class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                    <i class="fas fa-trash mr-2"></i>
                    Hapus SEO
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeDeleteModal()"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div class="sm:flex sm:items-start">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Hapus Pengaturan SEO
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500" id="deleteMessage">
                            Apakah Anda yakin ingin menghapus pengaturan SEO ini?
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm transition duration-150 ease-in-out">
                        Ya, Hapus
                    </button>
                </form>
                <button type="button" onclick="closeDeleteModal()" class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm transition duration-150 ease-in-out">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function openDeleteModal(id, title, page) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');
    const message = document.getElementById('deleteMessage');
    
    form.action = `/admin/page-seo/${id}`;
    message.textContent = `Apakah Anda yakin ingin menghapus pengaturan SEO untuk halaman "${page}"?`;
    
    modal.classList.remove('hidden');
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.add('hidden');
}

// Close modal with ESC key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeDeleteModal();
    }
});
</script>
@endpush
@endsection
