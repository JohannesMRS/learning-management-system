@extends('layouts.app')

@section('content')
<section class="max-w-2xl mx-auto mt-6 p-6 bg-white rounded-xl shadow border border-gray-100">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Tambah User Baru</h3>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700">Nama</label>
            <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700">Email</label>
            <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700">Password</label>
            <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700">Kode Registrasi</label>
            <input type="text" name="registration_code" class="w-full px-4 py-2 border rounded-lg">
        </div>
        <button type="submit" class="px-5 py-2.5 bg-green-600 text-white rounded-lg font-bold">Simpan User</button>
    </form>
</section>
@endsection
