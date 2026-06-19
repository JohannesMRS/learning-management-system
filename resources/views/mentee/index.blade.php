
@extends('layouts.navbar')

@section('title', 'Home')

@section('content')

    <section class="">
        <div class = "w-full flex flex-col justify-center item-center mt-52">
            <h1 class = "text-center text-4xl font-bold">Selamat Datang Kembali <span class = "text-purple-500">{{ Auth::user()->name }}</span></h1>
            <p class = "text-center mt-20 "><a href="{{ route('mentee.module') }}" class = "bg-purple-500 p-3 text-white text-[18px] hover:bg-blue-500 transition duration-200 rounded">Lanjut Belajar &rarr;</a> </p>
        </div>
        <div class="max-w-6xl mx-auto mt-12 px-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Lanjutkan Belajar</h2>

            @if($recentModules->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($recentModules as $history)
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                            <h3 class="font-bold text-lg text-gray-800">{{ $history->module->nama_module }}</h3>
                            <p class="text-sm text-gray-500 mb-4">
                                Terakhir Di Akses:  {{ $history->accessed_at ? \Carbon\Carbon::parse($history->accessed_at)->diffForHumans() : 'baru saja' }}
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

    <footer class = "bottom-0 left-0 right-0 h-60 bg-[#3c3c3c] text-white mt-10">
        <div class = "flex justify-between p-5 gap-20 ml-7 pt-10">
            <div class = "w-70">
                <h2 class = "font-bold">Alamat</h2>
                <p class = "text-gray-300 text-[14px] mt-2">
                    Jalan Almamater No. 1, Kampus USU, Padang Bulan, Kecamatan Medan Baru, Kota Medan, Sumatera Utara 20155.
                </p>
                <a target = "_blank" href="https://www.google.com/maps/place/Jl.+Almamater+No.1,+Padang+Bulan,+Kec.+Medan+Baru,+Kota+Medan,+Sumatera+Utara+20155/@3.5638678,98.6545508,18z/data=!3m1!4b1!4m6!3m5!1s0x30312fde9d7a440f:0xaec0e9e45b65b8f!8m2!3d3.563754!4d98.6538708!16s%2Fg%2F11g0dh7n7b?entry=ttu&g_ep=EgoyMDI2MDYxNi4wIKXMDSoASAFQAw%3D%3D" class = "text-blue-400 ">
                    Lihat di Maps
                <b>&rarr;</b></a>
            </div>
            <div class = "w-70">
                <h2 class = "font-bold">Media Sosial</h2>
                <ul class = "mt-2 text-[14px]">
                    <li class = "mb-1 transition duration-300 ease-in-out hover:scale-105"><a href="" class = "text-gray-300 hover:text-purple-500 ">Instagram</a></li>
                    <li class = "mb-1 transition duration-300 ease-in-out hover:scale-105"><a href="" class = "text-gray-300 hover:text-purple-500 ">LinkedIn</a></li>
                    <li class = "mb-1 transition duration-300 ease-in-out hover:scale-105"><a href="" class = "text-gray-300 hover:text-purple-500 ">Twitter</a></li>
                    <li class = "mb-1 transition duration-300 ease-in-out hover:scale-105"><a href="" class = "text-gray-300 hover:text-purple-500 ">Facebook</a></li>
                </ul>

            </div>
            <div class = "w-70">
                <h2 class = "font-bold">Diskusi</h2>
                <p class = "text-gray-300 text-[14px] mt-2">Punya pertanyaan?</p>
                <p class = "text-gray-300 text-[14px] mt-2">Kami terbuka untuk berdiskusi</p>
                <a href="mailto:sibaranijohannes8@gmail.com" class = "text-blue-400">Kirim Pertanyaan <b>&rarr;</b></a>
            </div>
        </div>
        <div class = "flex border-t border-t-gray-600 justify-center item-center  bg-purple-500 bottom-0 p-4 left-0">
            <p class = "text-gray-200 text-[13px]">© 2026 VeloLearn. All right reserved</p>
        </div>
    </footer>
@endsection

