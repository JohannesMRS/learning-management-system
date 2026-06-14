@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<section class="max-w-6xl  p-6 bg-white shadow-[0px_1px_5px_1px_rgba(0,0,0,0.1)] border border-gray-100">

    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-bold text-gray-800 tracking-wide">Users Detail</h3>

        <a href="{{ route('admin.users.create')}}" class="bg-amber-300 hover:bg-amber-400 text-white px-5 py-2.5  text-sm font-semibold transition duration-150 shadow-sm flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Tambah Data
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse border border-gray-200 overflow-hidden">
            <thead class="bg-gray-100 border-b border-gray-200">
                <tr>
                    <th class="border-b border-gray-200 p-4 text-sm font-bold text-gray-700">Nama</th>
                    <th class="border-b border-gray-200 p-4 text-sm font-bold text-gray-700">Email</th>
                    <th class="border-b border-gray-200 p-4 text-sm font-bold text-gray-700">Password</th>
                    <th class="border-b border-gray-200 p-4 text-sm font-bold text-gray-700">Kode Registrasi</th>
                    <th class="border-b border-gray-200 p-4 text-sm font-bold text-gray-700 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 bg-white">
                @foreach($datas as $data)
                <tr class="hover:bg-gray-50 transition duration-150">
                    <td class="p-4 text-sm text-gray-800 font-medium">{{ $data->name }}</td>
                    <td class="p-4 text-sm text-gray-600">{{ $data->email }}</td>
                    <td class="p-4 text-xs text-gray-500 font-mono max-w-xs truncate" title="{{ $data->password }}">
                        {{ $data->password }}
                    </td>
                    <td class="p-4 text-sm font-mono text-gray-700 font-semibold">
                        {{ $data->registration_code ?? '-' }}
                    </td>
                    <td class="p-4 text-sm text-center font-medium">
                        <form action="{{ route('admin.users.destroy', $data->id) }}" method = "POST" onclick="return confirm('Yakin mau hapus {{ $data->name }}?');">
                            @csrf
                            @method('DELETE')
                            <button type = "submit">Delete</button>
                        </form>
                        <span class="text-gray-300">|</span>
                        <a href="{{ route('admin.users.edit', $data->id) }}" class="text-blue-600 hover:text-blue-900 mx-1 transition duration-150">
                            Update
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection
