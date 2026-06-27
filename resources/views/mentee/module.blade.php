@extends('layouts.navbar')

@section('title', 'Module')

@section('content')

<section class="bg-slate-50 min-h-screen py-16" id="module-container">
    <div class="w-11/12 max-w-7xl mx-auto">
        
        @foreach($users->kelas as $kelas)
            <div class="mb-16 last:mb-0">
                
                <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-200">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-8 bg-blue-600 rounded-full"></div>
                        <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight">
                            {{ $kelas->nama_kelas }}
                        </h2>
                    </div>
                    <span class="text-xs font-semibold px-3 py-1 bg-blue-50 text-blue-600 rounded-full border border-blue-100">
                        {{ $kelas->modules->count() }} Modul
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @forelse($kelas->modules as $module)
                        
                        <div class="group bg-white flex flex-col justify-between rounded-2xl border border-slate-100 shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] hover:shadow-[0_10px_30px_-5px_rgba(37,99,235,0.12)] hover:-translate-y-1 transition-all duration-300 ease-out overflow-hidden">
                            
                            <div>
                                <div class="relative w-full h-44 bg-slate-100 overflow-hidden">
                                    <img src="{{ asset('build/assets/img/'.$module->gambar) }}" 
                                         alt="{{ $module->gambar }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/20 to-transparent"></div>
                                </div>
                                
                                <div class="p-6">
                                    <h3 class="text-lg font-bold text-slate-800 group-hover:text-blue-600 transition-colors duration-200 line-clamp-1">
                                        {{ $module->nama_module }}
                                    </h3>
                                    <p class="mt-2 text-sm text-slate-500 leading-relaxed line-clamp-3">
                                        {{ $module->deskripsi ?? 'Belum ada deskripsi singkat untuk modul ini.' }}
                                    </p>
                                </div>
                            </div>

                            <div class="p-6 pt-0">
                                <a href="#" class="inline-flex items-center justify-center gap-2 w-full bg-blue-600 text-white text-sm font-semibold p-3.5 rounded-xl hover:bg-blue-700 active:bg-blue-800 shadow-sm shadow-blue-200/50 transition-all duration-200">
                                    <span>Lihat Modul</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>

                        </div>

                    @empty
                        <div class="col-span-full flex flex-col items-center justify-center py-16 px-4 bg-white rounded-2xl border-2 border-dashed border-slate-200 text-center">
                            <div class="w-16 h-16 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-700">Belum Ada Modul</h3>
                            <p class="text-sm text-slate-400 mt-1 max-w-sm">Materi untuk kelas ini sedang dipersiapkan oleh mentor. Mohon ditunggu ya!</p>
                        </div>
                    @endforelse
                </div>

            </div>
        @endforeach

    </div>
</section>

@include('layouts.footer')




<script>
    const button = document.getElementById('dropDownButton');
    const menu = document.getElementById('dropDownMenu');

    if (button && menu) {
        button.addEventListener('click', function(event){
            event.stopPropagation();
            menu.classList.toggle('hidden')
        });

        window.addEventListener('click', function(event){
            if (!menu.classList.contains('hidden')) {
                if (!button.contains(event.target) && !menu.contains(event.target)) {
                    menu.classList.add('hidden');
                }
            }
        });
    }
</script>



@endsection