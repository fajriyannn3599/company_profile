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
                        <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors"
                            style="font-family: 'Poppins', sans-serif;">Home</a>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <a href="{{ route('about') }}" class="hover:text-blue-600 transition-colors"
                            style="font-family: 'Poppins', sans-serif;">Tentang Kami</a>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="text-gray-900 font-medium"
                            style="font-family: 'Poppins', sans-serif;">{{ $team->name }}</span>
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
                                    <div class="w-32 h-32 rounded-full border-4 border-white overflow-hidden bg-white shadow-xl"
                                        style="font-family: 'Poppins', sans-serif;">
                                        @if ($team->photo && file_exists(public_path('storage/' . $team->photo)))
                                            <img src="{{ asset('storage/' . $team->photo) }}" alt="{{ $team->name }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-red-500 to-yellow-600 flex items-center justify-center"
                                                style="font-family: 'Poppins', sans-serif;">
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
                                    <h2 class="text-3xl font-bold mb-2" style="font-family: 'Poppins', sans-serif;">
                                        {{ $team->name }}
                                    </h2>
                                    <p class="text-xl text-red-100 mb-2" style="font-family: 'Poppins', sans-serif;">
                                        {{ $team->position }}
                                    </p>
                                    <div class="flex items-center space-x-4 text-sm text-red-100">
                                        @if ($team->email)
                                            <div class="flex items-center space-x-1"
                                                style="font-family: 'Poppins', sans-serif;">
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
                                            <h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center"
                                                style="font-family: 'Poppins', sans-serif;">
                                                <div
                                                    class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center mr-3">
                                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                Tentang {{ $team->name }}
                                            </h3>
                                            <div class="prose prose-gray max-w-none">
                                                <p class="text-gray-600 leading-relaxed"
                                                    style="font-family: 'Poppins', sans-serif;">{{ $team->bio }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    <!-- Other Team Members -->
                                    @if ($otherTeamMembers && $otherTeamMembers->count() > 0)
                                    <div class="mt-12">
                                        <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">Tim Lainnya</h3>
                                        <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
                                            @foreach ($otherTeamMembers as $member)
                                                <a href="{{ route('team.detail', $member->id) }}" class="group">
                                                    <div
                                                        class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow p-6 text-center">
                                                        <div class="w-16 h-16 mx-auto mb-4 rounded-full overflow-hidden bg-gray-200">
                                                            @if ($member->photo && file_exists(public_path('storage/' . $member->photo)))
                                                                <img src="{{ asset('storage/' . $member->photo) }}"
                                                                    alt="{{ $member->name }}" class="w-full h-full object-cover">
                                                            @else
                                                                <div class="w-full h-full bg-gradient-to-r from-orange-500 to-red-500 flex items-center justify-center rounded-full overflow-hidden">
                                                                    <span class="text-xs font-bold text-white text-center truncate w-full px-1">
                                                                        {{ strtoupper(substr($member->name, 0, 2)) }}
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <h4
                                                            class="font-semibold text-gray-900 group-hover:text-red-600 transition-colors">
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