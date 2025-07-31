@props(['icon', 'title', 'description', 'variant' => 'default'])

@php
    $cardClasses = match($variant) {
        'stats' => 'bg-white rounded-xl shadow-lg p-8 text-center group hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1',
        'feature' => 'bg-white rounded-xl shadow-lg p-8 text-center group hover:shadow-xl transition-all duration-300',
        default => 'bg-white rounded-xl shadow-lg p-8 text-center group hover:shadow-xl transition-all duration-300'
    };
    
    $iconContainerClasses = match($variant) {
        'stats' => 'bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold group-hover:bg-orange-700 transition-colors duration-300',
        'feature' => 'bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-orange-200 transition-all duration-300',
        default => 'bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-orange-200 transition-all duration-300'
    };
    
    $titleClasses = match($variant) {
        'stats' => 'text-4xl font-bold text-blue-600 mb-2 group-hover:text-orange-700 transition-colors duration-300',
        'feature' => 'text-xl font-semibold text-gray-900 mb-4 group-hover:text-orange-600 transition-colors duration-300',
        default => 'text-xl font-semibold text-gray-900 mb-4 group-hover:text-orange-600 transition-colors duration-300'
    };
@endphp

<div class="{{ $cardClasses }}">
    <div class="{{ $iconContainerClasses }}">
        @if($variant === 'stats' && is_numeric($icon))
            {{ $icon }}
        @else
            <i class="{{ $icon }} text-yellow-600 text-2xl group-hover:scale-110 transition-transform duration-300"></i>
        @endif
    </div>
    
    <h3 class="{{ $titleClasses }}">{{ $title }}</h3>
    <p class="text-gray-600 leading-relaxed">{{ $description }}</p>
</div>
