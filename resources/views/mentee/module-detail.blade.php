@extends('layouts.navbar') {{-- Sesuaikan dengan nama layout abang --}}

@section('title', $module->nama_module)

@section('content')
<div class="max-w-4xl mx-auto pt-24 px-6 pb-12">
    <a href="{{ route('mentee.module') }}" class="text-blue-600 hover:underline mb-6 block">&larr; Kembali ke daftar modul</a>

    <div class="mb-8">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $module->nama_module }}</h1>
        <div class="h-1 w-20 bg-blue-500 rounded-full"></div>
    </div>

    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Penjelasan Modul</h2>
        <p>{{ $module->deskripsi }}</p>

        <div class="mt-8 p-6 bg-blue-50 rounded-xl border border-blue-100">
            <h3 class="text-blue-800 font-bold mb-2">Tips Belajar:</h3>
            <p class="text-blue-700">Pastikan abang mencoba kodingan di atas langsung di IDE abang agar lebih cepat paham!</p>
        </div>
    </div>
</div>
@endsection
