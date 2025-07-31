@props(['number', 'label', 'icon' => null])

<div class="bg-white rounded-xl shadow-lg p-8 text-center group hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
    @if($icon)
        <div class="text-blue-600 text-4xl mb-4 group-hover:scale-110 transition-transform duration-300">
            <i class="{{ $icon }}"></i>
        </div>
    @endif
    
    <div class="text-4xl font-bold text-yellow-600 mb-2 group-hover:text-blue-700 transition-colors duration-300">
        {{ $number }}
    </div>
    
    <p class="text-gray-600 font-medium">{{ $label }}</p>
</div>
