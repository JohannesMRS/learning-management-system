
@extends('layouts.navbar')

@section('title', 'Home')

@section('content')

    <section class="">
        <div class = "w-full h-screen flex flex-col justify-center item-center">
            <h1 class = "text-center text-4xl font-bold">Selamat Datang Kembali <span class = "text-purple-500">{{ Auth::user()->name }}</span></h1>
            <p class = "text-center mt-20 "><a href="{{ route('mentee.module') }}" class = "bg-linear-to-r from-purple-500 to-blue-500 p-2 text-white hover:bg-blue-500">Lanjut Belajar</a></p>
        </div>
    </section>

@endsection

