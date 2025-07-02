@props(['step', 'title', 'description', 'isLast' => false])

<div class="text-center relative">
    <div class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold shadow-lg transform hover:scale-110 transition-all duration-300 hover:bg-blue-700">
        {{ $step }}
    </div>
    
    <h3 class="text-xl font-semibold text-gray-900 mb-4 hover:text-blue-600 transition-colors duration-300">
        {{ $title }}
    </h3>
    
    <p class="text-gray-600 leading-relaxed">{{ $description }}</p>
    
    <!-- Connector line -->
    @if(!$isLast)
        <div class="hidden lg:block absolute top-8 left-full w-full h-0.5 bg-gradient-to-r from-blue-600 via-blue-400 to-gray-200 transform -translate-x-8"></div>
    @endif
</div>
