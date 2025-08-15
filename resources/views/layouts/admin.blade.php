<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: false }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - {{ config('app.name') }}</title>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Custom Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }

        .sidebar-gradient {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%);
        }

        .nav-item-active {
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.1) 0%, rgba(147, 197, 253, 0.1) 100%);
            border-right: 3px solid #3b82f6;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .content-container {
            max-width: 72rem;
            /* 6xl */
        }

        /* Custom Scrollbar */
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: transparent;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* Mobile adjustments */
        @media (max-width: 768px) {
            .sidebar-mobile-spacing {
                padding-top: env(safe-area-inset-top, 0);
            }
        }

        /* Smooth transitions for mobile */
        @media (max-width: 1024px) {
            .sidebar-overlay {
                backdrop-filter: blur(4px);
            }
        }

        /* Navigation item hover effects */
        .nav-item {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-item:hover {
            transform: translateX(2px);
        }

        /* Mobile optimization for touch */
        @media (max-width: 1024px) {
            .nav-item {
                min-height: 48px;
                /* Better touch targets */
            }
        }
    </style>

    @stack('styles')
</head>

<body class="bg-gradient-to-br from-gray-50 to-blue-50 font-sans antialiased"> <!-- Sidebar -->
    <div class="fixed inset-y-0 left-0 z-50 w-72 sm:w-80 lg:w-72 sidebar-gradient shadow-2xl transform transition-transform duration-300 ease-in-out lg:translate-x-0 flex flex-col"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" x-cloak>

        <!-- Sidebar Header - Fixed -->
        <div class="flex items-center justify-between h-20 px-6 border-b border-blue-500/20 flex-shrink-0">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                    <i class="fas fa-shield-alt text-white text-xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-white">Admin Panel</h1>
                    <p class="text-blue-100 text-sm">Management System</p>
                </div>
            </div>
            <button @click="sidebarOpen = false" class="lg:hidden text-white/80 hover:text-white transition-colors">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>

        <!-- Navigation Menu - Scrollable -->
        <nav
            class="flex-1 overflow-y-auto scrollbar-thin scrollbar-thumb-white/20 scrollbar-track-transparent mt-8 px-4 pb-4">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
                class="nav-item flex items-center px-4 py-3 mb-2 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'nav-item-active bg-white/15' : '' }}">
                <div
                    class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                    <i class="fas fa-tachometer-alt text-white"></i>
                </div>
                <span class="ml-3 font-medium">Dashboard</span>
            </a>

            <!-- Content Management -->
            <div class="mt-8">
                <h3 class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider mb-4">Manajemen Konten</h3>
                <div class="space-y-2">
                    <a href="{{ route('admin.services.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.services.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-cogs text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Layanan</span>
                    </a>
                    <a href="{{ route('admin.financial-reports.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.financial-reports.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-folder-open text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Laporan Keuangan</span>
                    </a>
                    <a href="{{ route('admin.articles.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.articles.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-newspaper text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Artikel</span>
                    </a> <a href="{{ route('admin.teams.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.teams.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-users text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Tim</span>
                    </a>
                    </a> <a href="{{ route('admin.awards.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.awards.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-award text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Penghargaan</span>
                    </a>
                    <a href="{{ route('admin.governances.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.governances.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-star text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Piagam Audit</span>
                    </a>
                    <a href="{{ route('admin.nisbah.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.nisbah.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-box text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Nisbah Bagi Hasil</span>
                    </a>
                    
                    <a href="{{ route('admin.structures.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.structures.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-quote-right text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Struktur Karyawan (Gambar)</span>
                    </a>
                    <a href="{{ route('admin.stories.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.stories.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-quote-right text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Sejarah Perusahaan</span>
                    </a>
                </div>
            </div>

            <!-- SEO & Design -->
            <div class="mt-8">
                <h3 class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider mb-4">SEO & Desain</h3>
                <div class="space-y-2">
                    <a href="{{ route('admin.page-seo.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.page-seo.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-search text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">SEO Halaman</span>
                    </a>
                    <a href="{{ route('admin.page-hero.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.page-hero.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-image text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Hero Section</span>
                    </a>
                </div>
            </div> <!-- Career Management -->
            <!-- <div class="mt-8">
                <h3 class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider mb-4">Manajemen Karir</h3>
                <div class="space-y-2">
                    <a href="{{ route('admin.jobs.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.jobs.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-briefcase text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Lowongan Pekerjaan</span>
                    </a>
                    <a href="{{ route('admin.job-applications.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.job-applications.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-user-tie text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Lamaran Kerja</span>
                    </a>
                </div>
            </div> -->

            <!-- Communications -->
            <div class="mt-8">
                <h3 class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider mb-4">Komunikasi</h3>
                <div class="space-y-2">
                    <a href="{{ route('admin.messages.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.messages.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Pesan</span>
                    </a>
                </div>
            </div>

            <!-- Settings -->
            <div class="mt-8">
                <h3 class="px-4 text-xs font-semibold text-blue-200 uppercase tracking-wider mb-4">Pengaturan</h3>
                <div class="space-y-2">
                    <a href="{{ route('admin.settings.index') }}"
                        class="nav-item flex items-center px-4 py-3 text-white/90 rounded-xl hover:bg-white/10 transition-all duration-200 group {{ request()->routeIs('admin.settings.*') ? 'nav-item-active bg-white/15' : '' }}">
                        <div
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-cog text-white"></i>
                        </div>
                        <span class="ml-3 font-medium">Pengaturan Umum</span>
                    </a>
                </div>
            </div>
        </nav>

        <!-- Sidebar Footer - Fixed at bottom -->
        <div class="border-t border-blue-500/20 px-4 py-4 flex-shrink-0">
            <div class="flex items-center space-x-3 text-white/70 text-sm">
                <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user text-white/80 text-xs"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-medium text-white/90 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-blue-200 truncate">Administrator</p>
                </div>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="p-2 rounded-lg hover:bg-white/10 transition-colors" title="Logout">
                    <i class="fas fa-sign-out-alt text-white/70 hover:text-white"></i>
                </button>
            </div>

            <!-- Hidden logout form -->
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div><!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-black bg-opacity-50 backdrop-blur-sm lg:hidden sidebar-overlay"
        x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-72">
        <!-- Top Navigation -->
        <header class="glass-effect shadow-lg border-b border-white/20 sticky top-0 z-30">
            <div class="flex items-center justify-between h-20 px-8">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true"
                        class="lg:hidden text-gray-600 hover:text-gray-800 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="ml-4 lg:ml-0">
                        <h2 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                        <p class="text-sm text-gray-600 mt-1">
                            @yield('page-description', 'Selamat datang di panel administrasi')</p>
                    </div>
                </div> <!-- User Menu -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center space-x-3 text-gray-700 hover:text-gray-900 focus:outline-none p-2 rounded-xl hover:bg-gray-100 transition-colors">
                        @if(Auth::user()->avatar)
                            <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}"
                                class="w-10 h-10 rounded-xl object-cover shadow-lg">
                        @else
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center text-white text-sm font-bold shadow-lg">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        @endif
                        <div class="hidden md:block text-left">
                            <div class="font-semibold text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-gray-500">Administrator</div>
                        </div>
                        <i class="fas fa-chevron-down text-sm text-gray-500"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-200 py-2 z-50"
                        x-cloak>
                        <div class="px-4 py-3 border-b border-gray-200">
                            <p class="text-sm text-gray-500">Signed in as</p>
                            <p class="text-sm font-semibold text-gray-900 truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="py-1">
                            <a href="{{ route('admin.profile.show') }}"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <i class="fas fa-user-circle mr-3 text-gray-400"></i>
                                Profile
                            </a>
                            <a href="{{ route('home') }}" target="_blank"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <i class="fas fa-external-link-alt mr-3 text-gray-400"></i>
                                Lihat Website
                            </a>
                        </div>
                        <div class="border-t border-gray-200 py-1">
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    <i class="fas fa-sign-out-alt mr-3"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-8">
            <div class="content-container mx-auto">
                <!-- Flash Messages -->
                @if (session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-lg shadow-sm">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-green-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-lg shadow-sm">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-lg shadow-sm">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-400"></i>
                            </div>
                            <div class="ml-3">
                                <ul class="list-disc list-inside text-sm text-red-700">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>

</html>