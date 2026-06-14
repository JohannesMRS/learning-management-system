@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<section class = "w-337.5 bg-gray-50 shadow-[0px_1px_5px_1px_rgba(0,0,0,0.2)]">
    <div class = "flex justify-center gap-10 mt-20">
        <div class = "w-80 h-40 shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)] rounded p-7 ">
            <p class = "mb-2">Total User</p>
            <p class = "text-6xl text-center">5</p>
        </div>
        <div class = "w-80 h-40 shadow-[1px_1px_10px_2px_rgba(0,0,0,0.1)] rounded p-7 ">
            <p class = "mb-2">Total Generate Code</p>
            <p class = "text-6xl text-center">5</p>
        </div>
    </div>

    <table class = "table-auto mx-auto mt-28 w-10/12 mb-2">
        <tr class = "border ">
            <th class = "border border-gray-300 p-2 bg-gray-200">Id</th>
            <th class = "border border-gray-300 p-2 bg-gray-200">Code</th>
            <th class = "border border-gray-300 p-2 bg-gray-200">Status</th>
            <th class = "border border-gray-300 p-2 bg-gray-200">Waktu Dibuat</th>
        </tr>
        @foreach($registrationCodes as $registrationCode)
        <tr>
            <td class = "border border-gray-300 p-2">{{ $registrationCode->id }}</td>
            <td class = "border border-gray-300 p-2">{{ $registrationCode->code }}</td>
            <td class = "border border-gray-300 p-2">{{ $registrationCode->is_used }}</td>
            <td class = "border border-gray-300 p-2">{{ $registrationCode->created_at }}</td>
        </tr>
        @endforeach
    </table>

    <table class = "table-auto mx-auto mt-28 w-10/12">
        <tr class = "border ">
            <th class = "border border-gray-300 p-2 bg-gray-200">Nama</th>
            <th class = "border border-gray-300 p-2 bg-gray-200">Email</th>
            <th class = "border border-gray-300 p-2 bg-gray-200">Password</th>
            <th class = "border border-gray-300 p-2 bg-gray-200">Kode Registrasi</th>
        </tr>
        @foreach($datas as $data)
        <tr>
            <td class = "border border-gray-300 p-2">{{ $data->name }}</td>
            <td class = "border border-gray-300 p-2">{{ $data->email }}</td>
            <td class = "border border-gray-300 p-2">{{ $data->password }}</td>
            <td class = "border border-gray-300 p-2">{{ $data->registration_code }}</td>
        </tr>
        @endforeach
    </table>
</section>

@endsection
