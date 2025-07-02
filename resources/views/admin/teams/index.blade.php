@extends('layouts.admin')

@section('title', 'Kelola Tim')

@section('content')
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kelola Tim</h1>
            <p class="mt-1 text-sm text-gray-600">Kelola anggota tim dan profil mereka</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('admin.teams.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                <i class="fas fa-plus mr-2"></i>
                Tambah Anggota Tim
            </a>
        </div>
    </div>
</div>
 
<!-- Stats Cards -->
<div class="mb-6 grid grid-cols-1 md:grid-cols-4 gap-4">
    <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
        <div class="p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-blue-600"></i>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-500">Total Anggota</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $teams->total() }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
        <div class="p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check text-green-600"></i>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-500">Aktif</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $teams->where('is_active', true)->count() }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
        <div class="p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-pause text-gray-600"></i>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-500">Nonaktif</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $teams->where('is_active', false)->count() }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-white overflow-hidden shadow-sm border border-gray-200 rounded-lg">
        <div class="p-4">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-camera text-purple-600"></i>
                    </div>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-500">Dengan Foto</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $teams->whereNotNull('photo')->count() }}</p>
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
                        Anggota Tim
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Posisi
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Kontak
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Urutan
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Aksi</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($teams as $team)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($team->photo)
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <img class="h-12 w-12 rounded-full object-cover" 
                                             src="{{ Storage::url($team->photo) }}" 
                                             alt="{{ $team->name }}">
                                    </div>
                                @else
                                    <div class="flex-shrink-0 h-12 w-12 bg-gray-200 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $team->name }}
                                    </div>
                                    @if($team->bio)
                                        <div class="text-sm text-gray-500">
                                            {{ Str::limit($team->bio, 50) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $team->position }}</div>
                        </td>                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                @if($team->email)
                                    <div class="flex items-center mb-1">
                                        <i class="fas fa-envelope text-gray-400 mr-2"></i>
                                        <span class="truncate max-w-32">{{ $team->email }}</span>
                                    </div>
                                @endif
                                @if($team->phone)
                                    <div class="flex items-center mb-1">
                                        <i class="fas fa-phone text-gray-400 mr-2"></i>
                                        <span>{{ $team->phone }}</span>
                                    </div>
                                @endif                                @if($team->social_links)
                                    <div class="flex items-center space-x-2 mt-2">
                                        @if(isset($team->social_links['linkedin']) && $team->social_links['linkedin'])
                                            <a href="{{ $team->social_links['linkedin'] }}" target="_blank" class="text-blue-600 hover:text-blue-700">
                                                <i class="fab fa-linkedin text-sm"></i>
                                            </a>
                                        @endif
                                        @if(isset($team->social_links['twitter']) && $team->social_links['twitter'])
                                            <a href="{{ $team->social_links['twitter'] }}" target="_blank" class="text-blue-400 hover:text-blue-500">
                                                <i class="fab fa-twitter text-sm"></i>
                                            </a>
                                        @endif
                                        @if(isset($team->social_links['instagram']) && $team->social_links['instagram'])
                                            <a href="{{ $team->social_links['instagram'] }}" target="_blank" class="text-pink-600 hover:text-pink-700">
                                                <i class="fab fa-instagram text-sm"></i>
                                            </a>
                                        @endif
                                        @if(isset($team->social_links['facebook']) && $team->social_links['facebook'])
                                            <a href="{{ $team->social_links['facebook'] }}" target="_blank" class="text-blue-700 hover:text-blue-800">
                                                <i class="fab fa-facebook text-sm"></i>
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($team->is_active)
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
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $team->sort_order }}
                        </td>                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('admin.teams.show', $team) }}" 
                                   class="text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out"
                                   title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.teams.edit', $team) }}" 
                                   class="text-blue-400 hover:text-blue-600 transition duration-150 ease-in-out"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" 
                                        class="text-red-400 hover:text-red-600 transition duration-150 ease-in-out focus:outline-none"
                                        title="Hapus"
                                        onclick="openDeleteModal({{ $team->id }}, '{{ $team->name }}', '{{ $team->position }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-users text-gray-300 text-5xl mb-4"></i>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada anggota tim</h3>
                                <p class="text-gray-500 mb-4">Mulai menambahkan anggota tim pertama</p>
                                <a href="{{ route('admin.teams.create') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700">
                                    <i class="fas fa-plus mr-2"></i>
                                    Tambah Anggota Tim
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>    @if($teams->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $teams->links() }}
        </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 text-center mb-2">Hapus Anggota Tim</h3>
            <p class="text-sm text-gray-500 text-center mb-4">
                Apakah Anda yakin ingin menghapus <strong id="deleteMemberName"></strong> dari tim?
            </p>
            <div class="bg-gray-50 p-3 rounded-lg mb-4">
                <p class="text-sm text-gray-600">
                    <strong>Posisi:</strong> <span id="deleteMemberPosition"></span>
                </p>
            </div>
            <p class="text-sm text-red-600 text-center mb-6">
                Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex justify-center space-x-4">
                <button type="button" onclick="closeDeleteModal()" 
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-150 ease-in-out">
                    Batal
                </button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-150 ease-in-out">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function openDeleteModal(id, memberName, memberPosition) {
    document.getElementById('deleteMemberName').textContent = memberName;
    document.getElementById('deleteMemberPosition').textContent = memberPosition;
    document.getElementById('deleteForm').action = `/admin/teams/${id}`;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeDeleteModal();
    }
});
</script>
@endpush
@endsection
