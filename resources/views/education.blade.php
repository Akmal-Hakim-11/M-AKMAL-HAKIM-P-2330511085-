@extends('layouts.app')

@section('title', 'Pendidikan - CV Pribadi')

@section('content')
@php
    $fullName = $biodata?->full_name ?? 'Saya';
@endphp

<!-- Hero Section -->
<div class="relative hero-gradient-animated text-white py-24 md:py-32 overflow-hidden">
    <!-- Animated Pattern Overlay -->
    <div class="absolute inset-0 hero-pattern-animated opacity-30"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <p class="text-lg font-semibold text-white uppercase tracking-wider mb-4 fade-in-up">Perjalanan Akademik</p>
        <h1 class="text-5xl md:text-6xl font-display font-bold mb-6 text-white fade-in-up stagger-1">Riwayat Pendidikan</h1>
        <p class="text-xl text-white/90 max-w-2xl mx-auto fade-in-up stagger-2">Jejak pendidikan formal dan pencapaian akademik</p>
    </div>
</div>

<!-- Education Timeline -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="section-header fade-in-up">
        <h2 class="text-gray-900 dark:text-gray-100">Timeline Pendidikan</h2>
        <div class="divider bg-gradient-to-r from-transparent via-indigo-500 dark:via-indigo-400 to-transparent"></div>
        <p class="text-gray-600 dark:text-gray-400">Riwayat pendidikan formal</p>
    </div>

    <div class="space-y-8" data-stagger>
        @forelse ($educations as $education)
            <div class="modern-card card-hover fade-in-up bg-white dark:bg-gray-800 border dark:border-gray-700 transition-colors duration-300">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-100 dark:bg-blue-900/50 p-4 rounded-xl text-blue-600 dark:text-blue-300 font-semibold">
                            {{ $education->start_year ?? '?' }}<span class="text-gray-400 dark:text-gray-500"> &mdash; </span>{{ $education->end_year ?? 'Sekarang' }}
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-1">
                                {{ $education->degree ?? $education->field_of_study ?? 'Program Studi' }}
                            </h3>
                            <p class="text-blue-600 dark:text-blue-400 font-semibold">{{ $education->institution }}</p>
                            @if ($education->field_of_study)
                                <p class="text-sm text-gray-500 dark:text-gray-400">Fokus: {{ $education->field_of_study }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @if ($education->description)
                    <p class="text-gray-700 dark:text-gray-300 mt-4 leading-relaxed">{!! nl2br(e($education->description)) !!}</p>
                @endif
            </div>
        @empty
            <div class="modern-card text-center py-12 fade-in-up bg-white dark:bg-gray-800 border dark:border-gray-700">
                <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Belum ada data pendidikan</h3>
                <p class="text-gray-500 dark:text-gray-400">Tambahkan data melalui seeder atau form manajemen untuk menampilkan timeline pendidikan.</p>
            </div>
        @endforelse
    </div>
</div>

<!-- CTA Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-700 dark:to-purple-700 rounded-3xl p-8 md:p-12 text-center text-white fade-in-up shadow-xl">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Lihat Halaman Lainnya</h2>
        <p class="text-lg md:text-xl mb-8 text-indigo-100 dark:text-indigo-200">
            Jelajahi pengalaman kerja dan keahlian teknis saya
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-8 py-3 bg-white text-indigo-600 rounded-xl font-semibold hover:bg-indigo-50 transition shadow-lg">
                Kembali ke Home
            </a>
            <a href="{{ route('experience') }}" class="inline-flex items-center justify-center px-8 py-3 bg-white/10 backdrop-blur-sm text-white rounded-xl font-semibold hover:bg-white/20 transition border-2 border-white/30">
                Lihat Pengalaman
            </a>
        </div>
    </div>
</div>
@endsection

