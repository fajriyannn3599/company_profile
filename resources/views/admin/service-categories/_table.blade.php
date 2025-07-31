<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kategori Layanan</h1>
            <p class="mt-1 text-sm text-gray-600">Kelola kategori untuk mengorganisir layanan</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('admin.service-categories.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                <i class="fas fa-plus mr-2"></i>
                Tambah Kategori
            </a>
        </div>
    </div>
</div>

<div class="bg-white shadow-sm border border-gray-200 rounded-lg">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Layanan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dibuat</th>
                    <th class="px-6 py-3 relative"><span class="sr-only">Aksi</span></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($service_categories as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="Gambar {{ $category->name }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <div class="w-16 h-16 flex items-center justify-center bg-gray-100 text-gray-400 rounded">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $category->name }}</div>
                            @if($category->description)
                                <div class="text-sm text-gray-500">{{ Str::limit($category->description, 80) }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-900 font-mono bg-gray-100 px-2 py-1 rounded">
                                {{ $category->slug }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $category->services_count }} layanan
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $category->created_at->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('admin.service-categories.edit', $category) }}" 
                                   class="text-blue-400 hover:text-blue-600 transition duration-150 ease-in-out">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.service-categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-400 hover:text-red-600 transition duration-150 ease-in-out"
                                            {{ $category->services_count > 0 ? 'disabled title=Kategori memiliki layanan' : '' }}>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-folder-open text-gray-300 text-5xl mb-4"></i>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada kategori</h3>
                                <p class="text-gray-500 mb-4">Mulai membuat kategori untuk mengorganisir layanan</p>
                                <a href="{{ route('admin.service-categories.create') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700">
                                    <i class="fas fa-plus mr-2"></i>
                                    Tambah Kategori
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($service_categories->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $service_categories->links() }}
        </div>
    @endif
</div>
