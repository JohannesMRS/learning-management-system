
@extends('layouts.navbar')

@section('title', 'Home')

@section('content')

    <section class="">
        <div class = "w-full flex flex-col justify-center item-center mt-52">
            <h1 class = "text-center text-4xl font-bold">Selamat Datang Kembali <span class = "text-purple-500">{{ Auth::user()->name }}</span></h1>
            <p class = "text-center mt-20 "><a href="{{ route('mentee.module') }}" class = "bg-linear-to-r from-purple-500 to-blue-500 p-2 text-white hover:bg-blue-500">Lanjut Belajar</a></p>
        </div>
        <div class="max-w-6xl mx-auto mt-12 px-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Lanjutkan Belajar</h2>

            @if($recentModules->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($recentModules as $history)
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                            <h3 class="font-bold text-lg text-gray-800">{{ $history->module->nama_module }}</h3>
                            <p class="text-sm text-gray-500 mb-4">
                                Diakses {{ $history->accessed_at ? \Carbon\Carbon::parse($history->accessed_at)->diffForHumans() : 'baru saja' }}
                            </p>
                            <a href="{{ route('mentee.detail', $history->id_module) }}"
                            class="text-blue-600 font-semibold hover:text-blue-800 transition">
                            Lanjutkan &rarr;
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-10 border-2 border-dashed border-gray-200 rounded-2xl">
                    <p class="text-gray-500">Belum ada aktivitas belajar. Ayo mulai buka modul!</p>
                </div>
            @endif
        </div>

    </section>

@endsection

