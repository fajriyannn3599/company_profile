@props(['service', 'variant' => 'default'])

@php
    use Illuminate\Support\Facades\Storage;
    
    $cardClasses = match($variant) {
        'featured' => 'bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 group transform hover:-translate-y-2 overflow-hidden',
        'compact' => 'bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 border border-gray-50 group overflow-hidden',
        default => 'bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 group overflow-hidden'
    };
    
    $iconSize = match($variant) {
        'featured' => 'text-5xl',
        'compact' => 'text-4xl',
        default => 'text-5xl'
    };
    
    $titleSize = match($variant) {
        'featured' => 'text-2xl',
        'compact' => 'text-xl',
        default => 'text-2xl'
    };
@endphp

<div class="{{ $cardClasses }}">
    <!-- Image Section (Full Width) -->
    @if($service->image && file_exists(public_path('storage/' . $service->image)))
        <div class="relative h-56 overflow-hidden">
            <img src="{{ asset('storage/' . $service->image) }}" 
                 alt="{{ $service->title }}" 
                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            
            <!-- Featured Badge -->
            @if($service->is_featured)
                <div class="absolute top-4 left-4">
                    <span class="inline-flex items-center bg-gradient-to-r from-blue-500 to-purple-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        Unggulan
                    </span>
                </div>
            @endif
        </div>
    @elseif($service->icon)
        <!-- Icon Section (when no image) -->
        <div class="relative h-56 bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 flex items-center justify-center">
            <div class="relative">
                <div class="absolute inset-0 bg-blue-200 rounded-full blur-2xl opacity-30 group-hover:opacity-50 transition-opacity duration-300"></div>
                <div class="relative text-blue-600 {{ $iconSize }} group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                    <i class="{{ $service->icon }}"></i>
                </div>
            </div>
            
            <!-- Featured Badge -->
            @if($service->is_featured)
                <div class="absolute top-4 left-4">
                    <span class="inline-flex items-center bg-gradient-to-r from-blue-500 to-purple-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        Unggulan
                    </span>
                </div>
            @endif
        </div>
    @else
        <!-- Default Section (when no image or icon) -->
        <div class="relative h-56 bg-gradient-to-br from-gray-100 via-blue-50 to-indigo-100 flex items-center justify-center">
            <div class="relative">
                <div class="absolute inset-0 bg-blue-200 rounded-full blur-2xl opacity-20 group-hover:opacity-40 transition-opacity duration-300"></div>
                <div class="relative">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-xl group-hover:rotate-12 group-hover:scale-110 transition-all duration-500">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 7.172V5L8 4z"></path>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- Featured Badge -->
            @if($service->is_featured)
                <div class="absolute top-4 left-4">
                    <span class="inline-flex items-center bg-gradient-to-r from-blue-500 to-purple-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        Unggulan
                    </span>
                </div>
            @endif
        </div>
    @endif
    
    <!-- Content Section -->
    <div class="p-8">
        <div class="flex-1">
            <h3 class="{{ $titleSize }} font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors duration-300 line-clamp-2">
                {{ $service->title }}
            </h3>
            
            <p class="text-gray-600 mb-6 leading-relaxed line-clamp-3">
                {{ $service->short_description }}
            </p>
        </div>
        
        <!-- Action Button -->
        <div class="flex items-center justify-between">
            <a href="{{ route('services.show', $service->slug) }}" 
               class="inline-flex items-center bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                @if($variant === 'compact')
                    Selengkapnya
                @else
                    Pelajari Lebih Lanjut
                @endif
                <svg class="w-4 h-4 ml-2 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

@push('styles')
<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endpush
