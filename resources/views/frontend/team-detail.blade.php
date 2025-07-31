@extends('layouts.frontend')

@section('title', 'Detail Tim - ' . $team->name)

@section('meta')
    <meta name="description" content="Profil lengkap {{ $team->name }}, {{ $team->position }} di {{ config('app.name') }}">
    <meta name="keywords" content="{{ $team->name }}, {{ $team->position }}, tim, karyawan">
@endsection

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <!-- Header Section with Breadcrumb -->
        <div class="bg-white/80 backdrop-blur-sm border-b border-gray-200">
            <div class="container px-6 py-8">
                <div class="max-w-4xl mx-auto ">
                    <nav class="flex items-center space-x-2 text-sm text-gray-600">
                        <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors" style="font-family: 'Poppins', sans-serif;">Home</a>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <a href="{{ route('about') }}" class="hover:text-blue-600 transition-colors" style="font-family: 'Poppins', sans-serif;">Tentang Kami</a>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="text-gray-900 font-medium" style="font-family: 'Poppins', sans-serif;">{{ $team->name }}</span>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-6 py-12">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                    <!-- Hero Section -->
                    <div class="relative h-64 bg-gradient-to-r from-red-600 via-yellow-600 to-orange-600">
                        <div class="absolute inset-0 bg-black/20"></div>
                        <div class="absolute bottom-6 left-6 right-6">
                            <div class="flex items-end space-x-6">
                                <!-- Profile Photo -->
                                <div class="relative">
                                    <div
                                        class="w-32 h-32 rounded-full border-4 border-white overflow-hidden bg-white shadow-xl" style="font-family: 'Poppins', sans-serif;">
                                        @if ($team->photo && file_exists(public_path('storage/' . $team->photo)))
                                            <img src="{{ asset('storage/' . $team->photo) }}" alt="{{ $team->name }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <div
                                                class="w-full h-full bg-gradient-to-br from-red-500 to-yellow-600 flex items-center justify-center" style="font-family: 'Poppins', sans-serif;">
                                                <span class="text-3xl font-bold text-white">
                                                    {{ strtoupper(substr($team->name, 0, 2)) }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    @if ($team->is_active)
                                        <div
                                            class="absolute -bottom-1 -right-1 w-8 h-8 bg-green-500 border-4 border-white rounded-full flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <!-- Basic Info -->
                                <div class="flex-1 text-white">
                                    <h2 class="text-3xl font-bold mb-2" style="font-family: 'Poppins', sans-serif;">{{ $team->name }}</h2>
                                    <p class="text-xl text-red-100 mb-2" style="font-family: 'Poppins', sans-serif;">{{ $team->position }}</p>
                                    <div class="flex items-center space-x-4 text-sm text-red-100">
                                        @if ($team->email)
                                            <div class="flex items-center space-x-1" style="font-family: 'Poppins', sans-serif;">
                                                <!--<svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <span>{{ $team->email }}</span>-->
                                            </div>
                                        @endif
                                        @if ($team->phone)
                                            <div class="flex items-center space-x-1">
                                                <!--<svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                    </path>
                                                </svg>
                                                <span>{{ $team->phone }}</span>-->
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="p-8">
                        <div class="grid md:grid-cols-3 gap-8">
                            <!-- Bio Section -->
                            <div class="md:col-span-2">
                                <div class="space-y-6">
                                    @if ($team->bio)
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center" style="font-family: 'Poppins', sans-serif;">
                                                <div
                                                    class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                Tentang {{ $team->name }}
                                            </h3>
                                            <div class="prose prose-gray max-w-none">
                                                <p class="text-gray-600 leading-relaxed" style="font-family: 'Poppins', sans-serif;">{{ $team->bio }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Contact Information -->
                                    <!--<div>
                                        <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                            <div
                                                class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                            Informasi Kontak
                                        </h3>
                                        <div class="space-y-3">
                                            @if ($team->email)
                                                <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                                    <div
                                                        class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-blue-600" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm text-gray-500">Email</p>
                                                        <a href="mailto:{{ $team->email }}"
                                                            class="text-blue-600 hover:text-blue-700 font-medium">{{ $team->email }}</a>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($team->phone)
                                                <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                                    <div
                                                        class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-green-600" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm text-gray-500">Telepon</p>
                                                        <a href="tel:{{ $team->phone }}"
                                                            class="text-green-600 hover:text-green-700 font-medium">{{ $team->phone }}</a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>-->
                                    <!-- Social Links -->
                                    <!--@if (
                                        $team->social_links &&
                                            (is_array($team->social_links)
                                                ? count($team->social_links) > 0
                                                : count(json_decode($team->social_links, true)) > 0))
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                                                <div
                                                    class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                                    <svg class="w-4 h-4 text-purple-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                                        </path>
                                                    </svg>
                                                </div>
                                                Media Sosial
                                            </h3>
                                            <div class="flex flex-wrap gap-3">
                                                @foreach (is_array($team->social_links) ? $team->social_links : json_decode($team->social_links, true) as $platform => $url)
                                                    @if ($url)
                                                        <a href="{{ $url }}" target="_blank"
                                                            class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                                                            @if ($platform == 'linkedin')
                                                                <svg class="w-4 h-4 mr-2" fill="currentColor"
                                                                    viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd"
                                                                        d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                            @elseif($platform == 'twitter')
                                                                <svg class="w-4 h-4 mr-2" fill="currentColor"
                                                                    viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84">
                                                                    </path>
                                                                </svg>
                                                            @elseif($platform == 'instagram')
                                                                <svg class="w-4 h-4 mr-2" fill="currentColor"
                                                                    viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm4.8 10c0 2.652-2.148 4.8-4.8 4.8S5.2 12.652 5.2 10 7.348 5.2 10 5.2s4.8 2.148 4.8 4.8zM10 7a3 3 0 100 6 3 3 0 000-6zm5.2-3.2a1.2 1.2 0 11-2.4 0 1.2 1.2 0 012.4 0z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                            @elseif($platform == 'facebook')
                                                                <svg class="w-4 h-4 mr-2" fill="currentColor"
                                                                    viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd"
                                                                        d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                            @else
                                                                <svg class="w-4 h-4 mr-2" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                                                                    </path>
                                                                </svg>
                                                            @endif
                                                            {{ ucfirst($platform) }}
                                                        </a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>-->

                            <!-- Sidebar -->
                            <!--<div class="space-y-6">-->
                                <!-- Status Card -->
                                <!--<div class="bg-gray-50 rounded-xl p-6">
                                    <h4 class="font-semibold text-gray-900 mb-4">Status</h4>
                                    <div class="space-y-3">
                                        <div class="flex items-center justify-between">
                                            <span class="text-gray-600">Status Aktif</span>
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $team->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $team->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                            </span>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <span class="text-gray-600">Urutan</span>
                                            <span
                                                class="text-gray-900 font-medium">#{{ $team->sort_order ?? 'N/A' }}</span>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <span class="text-gray-600">Bergabung</span>
                                            <span
                                                class="text-gray-900 font-medium">{{ $team->created_at ? $team->created_at->format('M Y') : 'N/A' }}</span>
                                        </div>
                                    </div>
                                </div>-->

                                <!-- Quick Actions -->
                                <!--<div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-6">
                                    <h4 class="font-semibold text-gray-900 mb-4">Kontak Cepat</h4>
                                    <div class="space-y-3">
                                        @if ($team->email)
                                            <a href="mailto:{{ $team->email }}"
                                                class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                Kirim Email
                                            </a>
                                        @endif
                                        @if ($team->phone)
                                            <a href="tel:{{ $team->phone }}"
                                                class="w-full inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                    </path>
                                                </svg>
                                                Telepon
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Other Team Members -->
                @if ($otherTeamMembers && $otherTeamMembers->count() > 0)
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center" style="font-family: 'Poppins', sans-serif;">Tim Lainnya</h3>
                        <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($otherTeamMembers as $member)
                                <a href="{{ route('team.detail', $member->id) }}" class="group" style="font-family: 'Poppins', sans-serif;">
                                    <div
                                        class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow p-6 text-center">
                                        <div class="w-16 h-16 mx-auto mb-4 rounded-full overflow-hidden bg-gray-200">
                                            @if ($member->photo && file_exists(public_path('storage/' . $member->photo)))
                                                <img src="{{ asset('storage/' . $member->photo) }}"
                                                    alt="{{ $member->name }}" class="w-full h-full object-cover">
                                            @else
                                                <div
                                                    class="w-full h-full bg-gradient-to-br from-red-500 to-yellow-600 flex items-center justify-center">
                                                    <span class="text-sm font-bold text-white">
                                                        {{ strtoupper(substr($member->name, 0, 2)) }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                        <h4
                                            class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">
                                            {{ $member->name }}</h4>
                                        <p class="text-sm text-gray-600">{{ $member->position }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .prose p {
            margin-bottom: 1rem;
            line-height: 1.7;
        }
    </style>
@endpush
