@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<section class="max-w-2xl mx-auto mt-6 p-6 bg-white rounded-xl shadow-[0px_1px_5px_1px_rgba(0,0,0,0.1)] border border-gray-100">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Edit Detail User</h3>

    <form action="{{ route('admin.users.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT') <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
            <input type="text" name="name" value="{{ old('name', $users->name) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
            <input type="email" name="email" value="{{ old('email', $users->email) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kode Registrasi</label>
            <input type="text" name="registration_code" value="{{ old('registration_code', $users->registration_code) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none">
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru (Kosongkan jika tidak ingin diubah)</label>
            <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:outline-none" placeholder="••••••••">
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.users') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-semibold transition duration-150">
                Batal
            </a>
            <button type="submit" class="px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white rounded-lg text-sm font-semibold transition duration-150 shadow-sm">
                Simpan Perubahan
            </button>
        </div>
    </form>
</section>
@endsection
