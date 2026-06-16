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


<section class = "bg-gray-100  mt-10 p-10 pt-8 " id = "module-container">
    @foreach($users->kelas as $kelas)
        <h1 class = "text-2xl font-mono">Kelas {{ $kelas->nama_kelas }}</h1>
        <div class = "flex gap-10 justify-center items-center mt-10" id = "module">
            @foreach($kelas->modules as $module)
                <div class = " bg-white h-96 shadow-[0px_2px_5px_2px_rgba(128,128,128,0.2)] rounded-xl" id= "card-module">
                    <div id="img-module" class = "rounded-t-xl">
                        <img src="{{ asset('build/assets/img/'.$module->gambar) }}" alt="{{ $module->gambar }}" class = "w-80 rounded-t-xl">
                    </div>
                    <div class = "w-80 h-36 p-5 pt-3 font-medium text-gray-600">
                        <h1 class = "text-2xl">{{ $module->nama_module }}</h1>
                        <p class = "mt-1 text-justify">{{ $module->deskripsi }}</p>
                    </div>
                    <a href="#" class = "bg-blue-500 text-white p-2 float-end mr-5 bottom-10 rounded-sm hover:bg-[#225eb9] transition duration-200">Lihat Modul</a>
                </div>
            @endforeach
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
