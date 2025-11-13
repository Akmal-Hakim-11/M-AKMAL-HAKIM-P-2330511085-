@extends('layouts.app')

@section('title', 'Keahlian - CV Pribadi')

@section('content')
@php
    $fullName = $biodata?->full_name ?? 'Saya';
@endphp

<!-- Hero Section -->
<div class="relative hero-gradient-cool-animated text-white py-24 md:py-32 overflow-hidden">
    <!-- Animated Pattern Overlay -->
    <div class="absolute inset-0 hero-pattern-animated opacity-30"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <p class="text-lg font-semibold text-white uppercase tracking-wider mb-4 fade-in-up">Kemampuan Teknis</p>
        <h1 class="text-5xl md:text-6xl font-display font-bold mb-6 text-white fade-in-up stagger-1">Keahlian & Skills</h1>
        <p class="text-xl text-white/90 max-w-2xl mx-auto fade-in-up stagger-2">Teknologi dan tools yang dikuasai</p>
    </div>
</div>

<!-- Skills Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="section-header fade-in-up">
        <h2 class="text-gray-900 dark:text-gray-100">Daftar Keahlian</h2>
        <div class="divider bg-gradient-to-r from-transparent via-green-500 dark:via-green-400 to-transparent"></div>
        <p class="text-gray-600 dark:text-gray-400">Kompetensi teknis dan tools yang dikuasai</p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($skills as $skill)
        @php
            // Map skill name to icon slug
            $iconName = strtolower(str_replace([' ', '.', '-'], '', $skill->name));
            $iconMap = [
                'javascript' => 'javascript',
                'typescript' => 'typescript',
                'php' => 'php',
                'python' => 'python',
                'java' => 'java',
                'laravel' => 'laravel',
                'react' => 'react',
                'vue' => 'vuedotjs',
                'vuejs' => 'vuedotjs',
                'angular' => 'angular',
                'nodejs' => 'nodedotjs',
                'nextjs' => 'nextdotjs',
                'tailwind' => 'tailwindcss',
                'tailwindcss' => 'tailwindcss',
                'bootstrap' => 'bootstrap',
                'mysql' => 'mysql',
                'postgresql' => 'postgresql',
                'mongodb' => 'mongodb',
                'redis' => 'redis',
                'git' => 'git',
                'github' => 'github',
                'docker' => 'docker',
                'figma' => 'figma',
                'html' => 'html5',
                'html5' => 'html5',
                'css' => 'css3',
                'css3' => 'css3',
                'sass' => 'sass',
                'jquery' => 'jquery',
            ];
            $icon = $iconMap[$iconName] ?? $iconName;
        @endphp
        <div class="text-center p-6 modern-card card-hover fade-in-up bg-white dark:bg-gray-800 border dark:border-gray-700 transition-colors duration-300">
            <div class="w-16 h-16 bg-white dark:bg-white rounded-xl flex items-center justify-center mx-auto mb-4 p-3 shadow-sm">
                <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/{{ $icon }}.svg" 
                     alt="{{ $skill->name }}" 
                     class="w-full h-full object-contain"
                     onerror="this.onerror=null; this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22%236366f1%22><path d=%22M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4%22/></svg>';">
            </div>
            <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $skill->name }}</p>
            @if($skill->category)
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $skill->category }}</p>
            @endif
        </div>
        @empty
        <div class="col-span-2 md:col-span-3 lg:col-span-4 modern-card text-center py-12 fade-in-up bg-white dark:bg-gray-800 border dark:border-gray-700">
            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Belum ada data keahlian</h3>
            <p class="text-gray-500 dark:text-gray-400">Tambahkan data keahlian melalui database</p>
        </div>
        @endforelse
    </div>
</div>

<!-- CTA Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
    <div class="bg-gradient-to-r from-green-600 to-teal-600 dark:from-green-700 dark:to-teal-700 rounded-3xl p-8 md:p-12 text-center text-white fade-in-up shadow-xl">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Lihat Halaman Lainnya</h2>
        <p class="text-lg md:text-xl mb-8 text-green-100 dark:text-green-200">
            Jelajahi riwayat pendidikan dan pengalaman kerja saya
        </p>
        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-8 py-3 bg-white text-green-600 rounded-xl font-semibold hover:bg-green-50 transition shadow-lg">
                Kembali ke Home
            </a>
            <a href="{{ route('education') }}" class="inline-flex items-center justify-center px-8 py-3 bg-white/10 backdrop-blur-sm text-white rounded-xl font-semibold hover:bg-white/20 transition border-2 border-white/30">
                Lihat Pendidikan
            </a>
        </div>
    </div>
</div>
@endsection

