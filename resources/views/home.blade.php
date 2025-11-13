@extends('layouts.app')

@section('title', 'Home - CV Pribadi')

@section('content')
@php
    $fullName = $biodata?->full_name ?? 'Nama Lengkap';
    $jobTitle = $biodata?->job_title ?? 'Peran Anda';
    $summary = $biodata?->summary ?? 'Tambahkan deskripsi singkat tentang diri Anda melalui basis data.';
    $email = $biodata?->email ?? 'email@contoh.com';
    $phone = $biodata?->phone ?? 'Belum diatur';
    $address = $biodata?->address ?? 'Belum diatur';
    $website = $biodata?->website;
    $linkedin = $biodata?->linkedin;
    $github = $biodata?->github;
    $avatarName = urlencode($fullName);
    $initials = collect(explode(' ', $fullName))->map(fn($word) => strtoupper(substr($word, 0, 1)))->take(2)->join('');
@endphp

<!-- Hero Section with Profile & Contact -->
<div class="relative bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900 dark:from-slate-900 dark:via-slate-800 dark:to-black text-white overflow-hidden">
    <!-- Subtle Grid Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 50px 50px;"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
            <!-- Left: Profile Photo -->
            <div class="lg:col-span-1 flex justify-center fade-in-up">
                <div class="relative">
                    <div class="w-48 h-48 md:w-56 md:h-56 rounded-2xl overflow-hidden shadow-2xl border-4 border-white/10 bg-slate-700 animate-scale-in">
                        @php
                            $profilePhoto = $biodata?->profile_photo;
                            $photoUrl = null;

                            if ($profilePhoto) {
                                if (str_starts_with($profilePhoto, 'http')) {
                                    $photoUrl = $profilePhoto;
                                }
                                elseif (file_exists(storage_path('app/public/' . $profilePhoto))) {
                                    $photoUrl = asset('storage/' . $profilePhoto);
                                }
                                elseif (file_exists(public_path('images/' . $profilePhoto))) {
                                    $photoUrl = asset('images/' . $profilePhoto);
                                }
                                else {
                                    $photoUrl = asset('images/' . $profilePhoto);
                                }
                            }

                            if (!$photoUrl && file_exists(public_path('images/profile.jpg'))) {
                                $photoUrl = asset('images/profile.jpg');
                            } elseif (!$photoUrl && file_exists(public_path('images/profile.png'))) {
                                $photoUrl = asset('images/profile.png');
                            }

                            if (!$photoUrl) {
                                $photoUrl = "https://ui-avatars.com/api/?name={$avatarName}&size=500&background=475569&color=fff&bold=true&font-size=0.33";
                            }
                        @endphp

                        <img src="{{ $photoUrl }}"
                             alt="Foto {{ $fullName }}"
                             class="w-full h-full object-cover"
                             onerror="this.src='https://ui-avatars.com/api/?name={{ $avatarName }}&size=500&background=475569&color=fff&bold=true&font-size=0.33'">
                    </div>
                </div>
            </div>

            <!-- Center & Right: Personal Info -->
            <div class="lg:col-span-2 text-white space-y-6">
                <!-- Name & Title -->
                <div class="border-b border-white/10 pb-6 fade-in-up stagger-1">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-3 tracking-tight">
                        {{ $fullName }}
                    </h1>
                    <p class="text-xl md:text-2xl text-white/90 font-medium">
                        {{ $jobTitle }}
                    </p>
                </div>

                <!-- Summary -->
                <div class="pb-4 fade-in-up stagger-2">
                    <h2 class="text-sm font-semibold text-white/80 uppercase tracking-wider mb-3">Profil Singkat</h2>
                    <p class="text-base text-white/90 leading-relaxed">
                        {!! nl2br(e($summary)) !!}
                    </p>
                </div>

                <!-- Contact Information Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2 fade-in-up stagger-3">
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-white/70 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <p class="text-xs text-white/70 uppercase tracking-wide">Email</p>
                                <p class="text-sm text-white font-medium">{{ $email }}</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-white/70 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <div>
                                <p class="text-xs text-white/70 uppercase tracking-wide">Telepon</p>
                                <p class="text-sm text-white font-medium">{{ $phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-white/70 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div>
                                <p class="text-xs text-white/70 uppercase tracking-wide">Lokasi</p>
                                <p class="text-sm text-white font-medium">{{ $address }}</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-white/70 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                            </svg>
                            <div>
                                <p class="text-xs text-white/70 uppercase tracking-wide">Links</p>
                                <div class="flex flex-wrap gap-2 mt-1">
                                    @if ($linkedin)
                                    <a href="{{ $linkedin }}" class="text-sm text-blue-300 hover:text-blue-200 transition" target="_blank" rel="noopener">LinkedIn</a>
                                    @endif
                                    @if ($github)
                                    <span class="text-white/50">•</span>
                                    <a href="{{ $github }}" class="text-sm text-blue-300 hover:text-blue-200 transition" target="_blank" rel="noopener">GitHub</a>
                                    @endif
                                    @if ($website)
                                    <span class="text-white/50">•</span>
                                    <a href="{{ $website }}" class="text-sm text-blue-300 hover:text-blue-200 transition" target="_blank" rel="noopener">Website</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Education Section -->
<div class="bg-gray-50 dark:bg-gray-900 py-20 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header fade-in-up">
            <h2 class="text-gray-900 dark:text-gray-100">Pendidikan</h2>
            <div class="divider bg-gradient-to-r from-transparent via-indigo-500 dark:via-indigo-400 to-transparent"></div>
            <p class="text-gray-600 dark:text-gray-400">Riwayat pendidikan formal</p>
        </div>

        <div class="space-y-8" data-stagger>
        @forelse ($educations as $education)
        @php
            try {
                $startEdu = $education->start_date ? \Carbon\Carbon::parse($education->start_date)->format('Y') : null;
                $endEdu = $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('Y') : 'Sekarang';
            } catch (\Exception $e) {
                $startEdu = null;
                $endEdu = 'Sekarang';
            }
        @endphp
        <div class="modern-card card-hover fade-in-up bg-white dark:bg-gray-800 border dark:border-gray-700">
            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6">
                <div class="flex items-center space-x-4">
                    <div class="bg-blue-100 dark:bg-blue-900/50 p-4 rounded-xl text-blue-600 dark:text-blue-300 font-semibold text-center min-w-[120px]">
                        @if($startEdu && $endEdu && $endEdu != 'Sekarang')
                        {{ $startEdu }}<span class="text-gray-400 dark:text-gray-500"> &mdash; </span>{{ $endEdu }}
                        @elseif($startEdu)
                        {{ $startEdu }} &mdash; {{ $endEdu }}
                        @else
                        -
                        @endif
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-800 dark:text-gray-100 mb-1">
                            {{ $education->degree ?? $education->field_of_study ?? 'Program Studi' }}
                        </h3>
                        <p class="text-blue-600 dark:text-blue-400 font-semibold text-lg">{{ $education->institution }}</p>
                        @if ($education->field_of_study && $education->degree)
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $education->field_of_study }}</p>
                        @endif
                    </div>
                </div>
                @if($education->grade)
                <div class="text-center md:text-right">
                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-1">IPK/Nilai</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $education->grade }}</p>
                </div>
                @endif
            </div>
            @if($education->description)
            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{!! nl2br(e($education->description)) !!}</p>
            </div>
            @endif
        </div>
        @empty
        <div class="modern-card text-center py-12 fade-in-up bg-white dark:bg-gray-800 border dark:border-gray-700">
            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Belum ada data pendidikan</h3>
            <p class="text-gray-500 dark:text-gray-400">Tambahkan data pendidikan melalui database</p>
        </div>
        @endforelse
        </div>
    </div>
</div>

<!-- Experience Section -->
<div class="bg-white dark:bg-gray-800 py-20 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header fade-in-up">
            <h2 class="text-gray-900 dark:text-gray-100">Pengalaman</h2>
            <div class="divider bg-gradient-to-r from-transparent via-purple-500 dark:via-purple-400 to-transparent"></div>
            <p class="text-gray-600 dark:text-gray-400">Organisasi, magang, dan proyek</p>
        </div>

        <div class="space-y-8" data-stagger>
        @forelse ($experiences as $experience)
        <div class="modern-card card-hover fade-in-up bg-gray-50 dark:bg-gray-700/30 border dark:border-gray-700">
            <div class="flex flex-col md:flex-row md:items-start gap-6">
                <div class="flex items-center space-x-4 w-full md:w-auto">
                    <div class="bg-purple-100 dark:bg-purple-900/50 p-4 rounded-xl text-purple-600 dark:text-purple-300 flex items-center justify-center" style="min-width: 80px; min-height: 80px;">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-gray-100 mb-1">{{ $experience->position }}</h3>
                        <p class="text-purple-600 dark:text-purple-400 font-semibold text-lg">{{ $experience->company }}</p>
                        @if($experience->location)
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">📍 {{ $experience->location }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @if($experience->description)
            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{!! nl2br(e($experience->description)) !!}</p>
            </div>
            @endif
        </div>
        @empty
        <div class="modern-card text-center py-12 fade-in-up bg-gray-50 dark:bg-gray-700/30 border dark:border-gray-700">
            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Belum ada data pengalaman</h3>
            <p class="text-gray-500 dark:text-gray-400">Tambahkan data pengalaman melalui database</p>
        </div>
        @endforelse
        </div>
    </div>
</div>

<!-- Skills Section -->
<div class="bg-gray-50 dark:bg-gray-900 py-20 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header fade-in-up">
            <h2 class="text-gray-900 dark:text-gray-100">Keahlian</h2>
            <div class="divider bg-gradient-to-r from-transparent via-green-500 dark:via-green-400 to-transparent"></div>
            <p class="text-gray-600 dark:text-gray-400">Kompetensi teknis dan tools</p>
        </div>

        @if($skills->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($skills as $skill)
            @php
                // Map skill name to icon slug (lowercase, no spaces)
                $iconName = strtolower(str_replace([' ', '.', '-'], '', $skill->name));
                // Common mappings
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
            <div class="text-center p-6 modern-card card-hover fade-in-up bg-white dark:bg-gray-800 border dark:border-gray-700">
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
            @endforeach
        </div>
        @else
        <div class="modern-card text-center py-12 fade-in-up bg-white dark:bg-gray-800 border dark:border-gray-700">
            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Belum ada data keahlian</h3>
            <p class="text-gray-500 dark:text-gray-400">Tambahkan data keahlian melalui database</p>
        </div>
        @endif
    </div>
</div>

<!-- Soft Skills Section -->
<div class="bg-white dark:bg-gray-800 py-20 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header fade-in-up">
            <h2 class="text-gray-900 dark:text-gray-100">Soft Skills</h2>
            <div class="divider bg-gradient-to-r from-transparent via-slate-700 dark:via-slate-500 to-transparent"></div>
            <p class="text-gray-600 dark:text-gray-400">Kemampuan interpersonal dan profesional</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            <div class="text-center p-6 modern-card card-hover fade-in-up bg-gray-50 dark:bg-gray-700/30 border dark:border-gray-700">
                <div class="w-16 h-16 bg-gradient-to-br from-slate-700 to-slate-600 dark:from-slate-600 dark:to-slate-500 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">Teamwork</p>
            </div>
            <div class="text-center p-6 modern-card card-hover fade-in-up bg-gray-50 dark:bg-gray-700/30 border dark:border-gray-700">
                <div class="w-16 h-16 bg-gradient-to-br from-slate-700 to-slate-600 dark:from-slate-600 dark:to-slate-500 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                </div>
                <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">Communication</p>
            </div>
            <div class="text-center p-6 modern-card card-hover fade-in-up bg-gray-50 dark:bg-gray-700/30 border dark:border-gray-700">
                <div class="w-16 h-16 bg-gradient-to-br from-slate-700 to-slate-600 dark:from-slate-600 dark:to-slate-500 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">Problem Solving</p>
            </div>
            <div class="text-center p-6 modern-card card-hover fade-in-up bg-gray-50 dark:bg-gray-700/30 border dark:border-gray-700">
                <div class="w-16 h-16 bg-gradient-to-br from-slate-700 to-slate-600 dark:from-slate-600 dark:to-slate-500 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">Time Management</p>
            </div>
            <div class="text-center p-6 modern-card card-hover fade-in-up bg-gray-50 dark:bg-gray-700/30 border dark:border-gray-700">
                <div class="w-16 h-16 bg-gradient-to-br from-slate-700 to-slate-600 dark:from-slate-600 dark:to-slate-500 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">Adaptability</p>
            </div>
            <div class="text-center p-6 modern-card card-hover fade-in-up bg-gray-50 dark:bg-gray-700/30 border dark:border-gray-700">
                <div class="w-16 h-16 bg-gradient-to-br from-slate-700 to-slate-600 dark:from-slate-600 dark:to-slate-500 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">Learning Agility</p>
            </div>
        </div>
    </div>
</div>
@endsection
