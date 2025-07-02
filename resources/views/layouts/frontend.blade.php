<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
      @stack('seo')
    
    <!-- Default SEO if not overridden -->
    @if(!isset($pageIdentifier))
        <title>@yield('title', setting('site_name', 'Company Profile'))</title>
        <meta name="description" content="@yield('meta_description', setting('meta_description', 'Professional company profile website'))">
        
        <!-- SEO -->
        <meta property="og:title" content="@yield('title', setting('site_name', 'Company Profile'))">
        <meta property="og:description" content="@yield('meta_description', setting('meta_description', 'Professional company profile website'))">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    @endif
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/'.setting('favicon', '/favicon.ico')) }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

      <!-- Styles -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    
    <!-- Custom Styles for Enhanced UI -->
    <style>
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        
        /* Animation classes */
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .animate-fade-in-scale {
            animation: fadeInScale 0.6s ease-out;
        }
        
        .animate-slide-in-left {
            animation: slideInLeft 0.6s ease-out;
        }
        
        .animate-slide-in-right {
            animation: slideInRight 0.6s ease-out;
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Glass effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        
        /* Hover scale effect */
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-scale:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        /* Button ripple effect */
        .btn-ripple {
            position: relative;
            overflow: hidden;
        }
        
        .btn-ripple::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transition: width 0.6s, height 0.6s;
            transform: translate(-50%, -50%);
        }
        
        .btn-ripple:hover::before {
            width: 300px;
            height: 300px;
        }
        
        /* Smooth transitions */
        * {
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
        }
        
        /* Loading states */
        .loading-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }
        
        @keyframes loading {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }
        
        /* Image lazy loading */
        img {
            transition: opacity 0.3s ease;
        }
        
        img[loading="lazy"] {
            opacity: 0;
        }
        
        img[loading="lazy"].loaded {
            opacity: 1;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-white text-gray-900 antialiased">
    <!-- Header -->
    <header class="fixed top-0 w-full bg-white/95 backdrop-blur-sm border-b border-gray-100 z-50">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center">
                        @if(setting('logo'))
                            <img src="{{ asset('storage/'.setting('logo')) }}" alt="{{ setting('site_name') }}" class="h-8 w-auto">
                        @else
                            <span class="text-2xl font-bold text-blue-600">{{ setting('site_name', 'Company') }}</span>
                        @endif
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('about') ? 'text-blue-600' : '' }}">
                        Tentang Kami
                    </a>                    <a href="{{ route('services.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('services*') ? 'text-blue-600' : '' }}">
                        Layanan
                    </a>
                    <a href="{{ route('projects.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('projects*') ? 'text-blue-600' : '' }}">
                        Portofolio
                    </a>
                    <a href="{{ route('articles.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('articles*') ? 'text-blue-600' : '' }}">
                        Artikel
                    </a>
                    <a href="{{ route('careers.index') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('careers*') ? 'text-blue-600' : '' }}">
                        Karier
                    </a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('contact') ? 'text-blue-600' : '' }}">
                        Kontak
                    </a>
                </div>
                
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="mobile-menu-button text-gray-700 hover:text-blue-600 focus:outline-none focus:text-blue-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Navigation -->
            <div class="mobile-menu hidden md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 border-t border-gray-100">
                    <a href="{{ route('home') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('about') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium {{ request()->routeIs('about') ? 'text-blue-600' : '' }}">
                        Tentang Kami
                    </a>                    <a href="{{ route('services.index') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium {{ request()->routeIs('services*') ? 'text-blue-600' : '' }}">
                        Layanan
                    </a>
                    <a href="{{ route('projects.index') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium {{ request()->routeIs('projects*') ? 'text-blue-600' : '' }}">
                        Portofolio
                    </a>
                    <a href="{{ route('articles.index') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium {{ request()->routeIs('articles*') ? 'text-blue-600' : '' }}">
                        Artikel
                    </a>
                    <a href="{{ route('careers.index') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium {{ request()->routeIs('careers*') ? 'text-blue-600' : '' }}">
                        Karier
                    </a>
                    <a href="{{ route('contact') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium {{ request()->routeIs('contact') ? 'text-blue-600' : '' }}">
                        Kontak
                    </a>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="md:col-span-2">
                    <div class="flex items-center mb-4">
                        @if(setting('logo'))
                            <img src="{{ asset('storage/'.setting('logo')) }}" alt="{{ setting('site_name') }}" class="h-8 w-auto">
                        @else
                            <span class="text-2xl font-bold text-white">{{ setting('site_name', 'Company') }}</span>
                        @endif
                    </div>
                    <p class="text-gray-300 mb-4 max-w-md">
                        {{ setting('footer_description', 'Professional company providing excellent services and solutions for your business needs.') }}
                    </p>
                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        @if(setting('facebook_url'))
                            <a href="{{ setting('facebook_url') }}" class="text-gray-300 hover:text-white transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if(setting('twitter_url'))
                            <a href="{{ setting('twitter_url') }}" class="text-gray-300 hover:text-white transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if(setting('linkedin_url'))
                            <a href="{{ setting('linkedin_url') }}" class="text-gray-300 hover:text-white transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        @endif
                        @if(setting('instagram_url'))
                            <a href="{{ setting('instagram_url') }}" class="text-gray-300 hover:text-white transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="{{ route('services.index') }}" class="text-gray-300 hover:text-white transition-colors">Layanan</a></li>
                        <li><a href="{{ route('projects.index') }}" class="text-gray-300 hover:text-white transition-colors">Portofolio</a></li>
                        <li><a href="{{ route('careers.index') }}" class="text-gray-300 hover:text-white transition-colors">Karier</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <ul class="space-y-2">
                        @if(setting('contact_address'))
                            <li class="text-gray-300">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                {{ setting('contact_address') }}
                            </li>
                        @endif
                        @if(setting('contact_phone'))
                            <li class="text-gray-300">
                                <i class="fas fa-phone mr-2"></i>
                                {{ setting('contact_phone') }}
                            </li>
                        @endif
                        @if(setting('contact_email'))
                            <li class="text-gray-300">
                                <i class="fas fa-envelope mr-2"></i>
                                {{ setting('contact_email') }}
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 mt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-300 text-sm">
                        © {{ date('Y') }} {{ setting('site_name', 'Company Profile') }}. All rights reserved.
                    </p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-gray-300 hover:text-white text-sm transition-colors">Privacy Policy</a>
                        <a href="#" class="text-gray-300 hover:text-white text-sm transition-colors">Terms & Conditions</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    @stack('scripts')
    
    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>
