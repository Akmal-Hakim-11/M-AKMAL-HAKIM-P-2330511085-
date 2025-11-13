@extends('layouts.app')

@section('title', 'Pengalaman - CV Pribadi')

@section('content')
@php
    $fullName = $biodata?->full_name ?? 'Saya';
@endphp

<!-- Hero Section -->
<div class="relative hero-gradient-warm-animated text-white py-24 md:py-32 overflow-hidden">
    <!-- Animated Pattern Overlay -->
    <div class="absolute inset-0 hero-pattern-animated opacity-30"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <p class="text-lg font-semibold text-white uppercase tracking-wider mb-4 fade-in-up">Aktivitas & Proyek</p>
        <h1 class="text-5xl md:text-6xl font-display font-bold mb-6 text-white fade-in-up stagger-1">Pengalaman</h1>
        <p class="text-xl text-white/90 max-w-2xl mx-auto fade-in-up stagger-2">Organisasi, magang, dan proyek</p>
    </div>
</div>

<!-- Work Experience Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="section-header fade-in-up">
        <h2 class="text-gray-900 dark:text-gray-100">Riwayat Pengalaman</h2>
        <div class="divider bg-gradient-to-r from-transparent via-purple-500 dark:via-purple-400 to-transparent"></div>
        <p class="text-gray-600 dark:text-gray-400">Organisasi, magang, dan tugas proyek</p>
    </div>

    <div class="space-y-8" data-stagger>
        @forelse ($experiences as $experience)
            <div class="modern-card card-hover overflow-hidden fade-in-up bg-white dark:bg-gray-800 border dark:border-gray-700 transition-colors duration-300">
                <div class="md:flex">
                    <div class="md:w-1/4 bg-gradient-to-br from-purple-600 to-purple-700 dark:from-purple-700 dark:to-purple-800 p-6 text-white">
                        <div class="text-center space-y-3">
                            <div class="bg-white/20 rounded-lg p-6">
                                <svg class="w-16 h-16 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            @if ($experience->is_current)
                                <span class="px-3 py-1 text-xs font-semibold bg-green-500 rounded-full">Sedang Berjalan</span>
                            @endif
                        </div>
                    </div>
                    <div class="md:w-3/4 p-6 space-y-4">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $experience->position }}</h3>
                            <p class="text-purple-600 dark:text-purple-400 font-semibold">{{ $experience->company }}</p>
                            @if ($experience->location)
                                <p class="text-gray-500 dark:text-gray-400 text-sm">{{ $experience->location }}</p>
                            @endif
                        </div>
                        @if ($experience->description)
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{!! nl2br(e($experience->description)) !!}</p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="modern-card text-center py-12 fade-in-up bg-white dark:bg-gray-800 border dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Belum ada data pengalaman</h3>
                <p class="text-gray-500 dark:text-gray-400">Tambahkan pengalaman di basis data untuk menampilkan riwayat pekerjaan dan proyek.</p>
            </div>
        @endforelse
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-purple-600 to-pink-600 dark:from-purple-700 dark:to-pink-700 py-20 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 fade-in-up">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Lihat Halaman Lainnya</h2>
        <p class="text-lg md:text-xl mb-8 text-purple-100 dark:text-purple-200">
            Jelajahi riwayat pendidikan dan keahlian teknis saya
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-8 py-3 bg-white text-purple-600 rounded-xl font-semibold hover:bg-purple-50 transition shadow-lg">
                Kembali ke Home
            </a>
            <a href="{{ route('skills') }}" class="inline-flex items-center justify-center px-8 py-3 bg-white/10 backdrop-blur-sm text-white rounded-xl font-semibold hover:bg-white/20 transition border-2 border-white/30">
                Lihat Keahlian
            </a>
        </div>
    </div>
</div>
@endsection
