@props(['testimonial', 'variant' => 'default'])

@php
    use Illuminate\Support\Facades\Storage;
    
    $cardClasses = match($variant) {
        'featured' => 'bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 p-8 border border-gray-100 group transform hover:-translate-y-1',
        'compact' => 'bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 p-6 border border-gray-50 group',
        default => 'bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-8 border border-gray-100 group'
    };
@endphp

<div class="{{ $cardClasses }}">
    <!-- Rating Stars -->
    <div class="flex items-center mb-4">
        @for ($i = 1; $i <= 5; $i++)
            <i class="fas fa-star {{ $i <= ($testimonial->rating ?? 5) ? 'text-yellow-400' : 'text-gray-300' }} mr-1"></i>
        @endfor
    </div>
    
    <!-- Testimonial Text -->
    <blockquote class="text-gray-700 italic mb-6 leading-relaxed">
        <i class="fas fa-quote-left text-blue-600 text-xl mr-2 opacity-50"></i>
        {{ $testimonial->testimonial }}
        <i class="fas fa-quote-right text-blue-600 text-xl ml-2 opacity-50"></i>
    </blockquote>
    
    <!-- Client Information -->
    <div class="flex items-center">
        @if($testimonial->client_photo)
            <div class="relative">
                <img src="{{ Storage::url($testimonial->client_photo) }}" 
                     alt="{{ $testimonial->client_name }}" 
                     class="w-14 h-14 rounded-full mr-4 object-cover border-2 border-blue-100 group-hover:border-blue-200 transition-colors duration-300">
            </div>
        @else
            <div class="w-14 h-14 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full mr-4 flex items-center justify-center border-2 border-blue-100 group-hover:border-blue-200 transition-colors duration-300">
                <i class="fas fa-user text-blue-600 text-lg"></i>
            </div>
        @endif
        
        <div class="flex-1">
            <div class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">
                {{ $testimonial->client_name }}
            </div>
            <div class="text-sm text-gray-600">
                @if($testimonial->client_position)
                    {{ $testimonial->client_position }}
                    @if($testimonial->client_company)
                        <span class="text-blue-600"> • {{ $testimonial->client_company }}</span>
                    @endif
                @elseif($testimonial->client_company)
                    {{ $testimonial->client_company }}
                @endif
            </div>
        </div>
        
        @if($testimonial->is_featured)
            <div class="ml-3">
                <span class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                    <i class="fas fa-star mr-1"></i>
                    Featured
                </span>
            </div>
        @endif
    </div>
</div>

@push('styles')
<style>
/* Custom CSS for testimonial cards if needed */
</style>
@endpush
