@extends('layouts.navbar')

@section('title', 'Home')

@section('content')

<section class="bg-slate-50 min-h-screen py-12" id="home-container">
    <div class="w-11/12 max-w-7xl mx-auto space-y-12">
        
        <div class="relative bg-white rounded-3xl border border-slate-100 p-8 md:p-12 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.03)] overflow-hidden flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div class="absolute -right-10 -top-10 w-40 h-40 bg-blue-50 rounded-full blur-3xl opacity-60 pointer-events-none"></div>
            <div class="absolute right-20 -bottom-10 w-32 h-32 bg-sky-100 rounded-full blur-2xl opacity-40 pointer-events-none"></div>

            <div class="space-y-3 z-10 max-w-2xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-semibold border border-blue-100">
                    <span class="w-2 h-2 bg-blue-500 rounded-full animate-ping"></span>
                    Akademik Aktif
                </div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-800 tracking-tight leading-tight">
                    Selamat Datang Kembali, <br class="sm:hidden">
                    <span class="bg-gradient-to-r from-blue-600 to-blue-800 text-transparent bg-clip-text">{{ Auth::user()->name }}</span>
                </h1>
                <p class="text-slate-500 text-sm md:text-base font-medium">
                    Pantau progres belajarmu dan lanjutkan materi yang belum diselesaikan hari ini.
                </p>
            </div>

            <div class="z-10 w-full md:w-auto shrink-0">
                <a href="{{ route('mentee.module') }}" class="inline-flex items-center justify-center gap-2 w-full md:w-auto bg-blue-600 text-white text-sm font-semibold px-6 py-3.5 rounded-xl hover:bg-blue-700 active:bg-blue-800 shadow-sm shadow-blue-200/50 transition-all duration-200 group">
                    <span>Mulai Belajar</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.02)] flex items-center gap-4">
                {{-- <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 font-bold">
                    📚
                </div> --}}
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Kelas</p>
                    <p class="text-xl font-bold text-slate-800">{{ $users->kelas->count() }} Terdaftar</p>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.02)] flex items-center gap-4">
                {{-- <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 font-bold">
                    ⚡
                </div> --}}
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Aktivitas Terakhir</p>
                    <p class="text-xl font-bold text-slate-800">
                        {{ $recentModules->first() ? \Carbon\Carbon::parse($recentModules->first()->accessed_at)->diffForHumans() : 'Tidak ada' }}
                    </p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.02)] flex items-center gap-4">
                {{-- <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center text-amber-600 font-bold">
                    🎯
                </div> --}}
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Status Akun</p>
                    <p class="text-xl font-bold text-slate-800">Mentee Aktif</p>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="flex items-center gap-3 pb-2 border-b border-slate-200">
                <div class="w-1.5 h-6 bg-blue-600 rounded-full"></div>
                <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">
                    Lanjutkan Belajar
                </h2>
            </div>

            @if($recentModules->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($recentModules as $history)
                        <div class="group bg-white p-6 rounded-2xl border border-slate-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.03)] hover:shadow-[0_10px_30px_-5px_rgba(37,99,235,0.08)] hover:-translate-y-0.5 transition-all duration-200 flex flex-col justify-between min-h-[160px]">
                            <div>
                                <div class="flex items-start justify-between gap-2 mb-2">
                                    <h3 class="font-bold text-base text-slate-800 group-hover:text-blue-600 transition-colors duration-200 line-clamp-1">
                                        {{ $history->module->nama_module }}
                                    </h3>
                                    <span class="text-[10px] font-bold text-blue-600 bg-blue-50 border border-blue-100 px-2 py-0.5 rounded-md shrink-0">Modul</span>
                                </div>
                                <p class="text-xs text-slate-400 flex items-center gap-1.5 mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0x" />
                                    </svg>
                                    Terakhir diakses {{ $history->accessed_at ? \Carbon\Carbon::parse($history->accessed_at)->diffForHumans() : 'baru saja' }}
                                </p>
                            </div>

                            <a href="{{ route('mentee.detail', $history->id_module) }}"
                               class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-600 hover:text-blue-800 transition group/btn w-fit">
                                <span>Lanjutkan Modul</span>
                                <span class="transform group-hover/btn:translate-x-1 transition-transform">&rarr;</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="flex flex-col items-center justify-center py-16 px-4 bg-white rounded-2xl border-2 border-dashed border-slate-200 text-center">
                    <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-700">Belum Ada Aktivitas Belajar</h3>
                    <p class="text-xs text-slate-400 mt-1 max-w-xs">Ayo jelajahi daftar kelas dan pilih modul pertamamu untuk mulai belajar!</p>
                </div>
            @endif
        </div>

    </div>
</section>

@include('layouts.footer')

@endsection