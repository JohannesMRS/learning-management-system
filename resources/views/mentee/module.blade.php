@extends('layouts.navbar')

@section('title', 'Module')

@section('content')

{{-- @foreach($users->kelas as $kelas)
        <h2>{{ $kelas->nama_kelas }}</h2>
        @foreach($kelas->modules as $module)
            <div>
                {{ $module->nama_module }}
            </div>
        @endforeach
@endforeach --}}


<section class = "bg-white w-11/12 mx-auto mt-10 p-10 pt-8 " id = "module-container">
    @foreach($users->kelas as $kelas)
        <div class = "flex gap-10 justify-center items-center mt-10" id = "module">
            @forelse($kelas->modules as $module)
                <div class = " bg-white h-96 shadow-[0px_2px_5px_2px_rgba(128,128,128,0.2)] rounded-2xl border border-gray-100" id= "card-module">
                    <div id="img-module" class = "rounded-t-2xl">
                        <img src="{{ asset('build/assets/img/'.$module->gambar) }}" alt="{{ $module->gambar }}" class = "w-80 rounded-t-xl">
                    </div>
                    <div class = "w-80 h-36 p-5 pt-3 font-medium text-gray-500 border-b border-b-gray-200">
                        <h1 class = "text-2xl ">{{ $module->nama_module }}</h1>
                        <p class = "mt-1 text-justify text-gray-400">{{ $module->deskripsi }}</p>
                    </div>
                    <a href="#" class = "bg-blue-500 w-11/12 text-white block p-2 mx-auto text-center mt-2 bottom-10 rounded-xl hover:bg-[#225eb9] transition duration-200">Lihat Modul</a>
                </div>
            @empty
                    <div class = "flex flex-col mt-8">
                        <img src="{{ asset('build/assets/img/empty.jpg') }}" alt="empty" class= "w-105 bg-red-500">
                        <p class = "text-gray-500 text-center text-2xl mt-8">Belum ada Modul</p>
                    </div>

            @endforelse
        </div>
    @endforeach
</section>

    <script>
        const button = document.getElementById('dropDownButton');
        const menu = document.getElementById('dropDownMenu');

        button.addEventListener('click', function(event){
            event.stopPropagation();
            menu.classList.toggle('hidden')
        })

        window.addEventListener('click', function(event){
            if (!menu.classList.contains('hidden')) {
                if (!button.contains(event.target) && !menu.contains(event.target)) {
                    menu.classList.add('hidden');
                }
            }
        })
    </script>

@endsection
