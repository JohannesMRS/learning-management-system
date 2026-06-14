<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class = "flex justify-center items-center h-screen font-mono font-bold" autocomplete = "off">
    <div class = "w-4/12 pb-10  flex flex-col shadow-[0px_1px_8px_1px_rgba(0,0,0,0.2)] rounded-2xl">
        <h1 class = "text-2xl text-center  mt-6 mb-6">Form Login</h1>
        <form action="{{ route('loginProses') }}" method = "POST">
            @csrf
            @if ($errors->any())
                <div style="background-color: #fee2e2; color: #dc2626; padding: 10px; border-radius: 8px; margin-bottom: 15px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class = "flex flex-col pl-8 pr-8">
                <label for="email" class = "mb-2">Email</label>
                <input type="text" name = "email" placeholder = "Masukkan email" class = "border border-gray-400 rounded h-10 pl-3">
            </div>
            <div class = "flex flex-col pl-8 pr-8 mt-5">
                <label for="password" class = "mb-2">Password</label>
                <input type="password" name = "password" placeholder = "Masukkan password" class = "border border-gray-400 rounded h-10 pl-3">
            </div>
            <button type = "submit"  class = "w-10/12 h-10 block mx-auto mt-10 bg-amber-400">Login</button>
        </form>

        <p>
            Belum punya akun? <a href="{{ route('register') }}">Daftar Disini</a>
        </p>
    </div>
</body>
</html>
