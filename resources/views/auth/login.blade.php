<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class = "flex justify-center items-center h-screen font-mono" autocomplete = "off">
    <div class = "w-4/12 pb-10  flex flex-col shadow-[0px_1px_8px_1px_rgba(0,0,0,0.2)] rounded-2xl">
        <h1 class = "bg-linear-to-r from-blue-500 to-purple-500  p-8  text-center  rounded-t-2xl mb-6 font-bold text-white text-[30px]">Form Login</h1>
        <form action="{{ route('loginProses') }}" method = "POST">
            @csrf
            @if ($errors->any())
                <div  class = "bg-[#fee2e2] text-[#dc2626] p-2.5 rounded-lg mb-3.75 ml-3.75 mr-3.75 text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class = "flex flex-col pl-8 pr-8">
                <label for="email" class = "mb-2 text-gray-600">Email</label>
                <input type="text" autocomplete = "off" name = "email" placeholder = "Masukkan email" class = "border border-gray-400 text-gray-600 rounded h-10 pl-3 focus:blue-500 focus:ring-3 focus:ring-blue-200 focus:outline-none">
            </div>
            <div class = "flex flex-col pl-8 pr-8 mt-5">
                <label for="password" class = "mb-2 text-gray-600">Password</label>
                <input type="password" autocomplete = "new-password" name = "password" placeholder = "Masukkan password" class = "border border-gray-400 text-gray-600 rounded h-10 pl-3 focus:border-blue-500 focus:ring-3 focus:ring-blue-200 focus:outline-none">
            </div>
            <button type = "submit"  class = "w-10/12 h-10 block mx-auto mt-10 bg-blue-500 cursor-pointer text-white rounded hover:bg-purple-500 duration-100">Login</button>
        </form>

        <p class = "text-center mt-10">
            Belum punya akun? <a href="{{ route('register') }}" class = "text-blue-500 hover:text-purple-500 focus:text-purple-500 duration-200 hover:underline">Daftar Disini</a>
        </p>
    </div>
</body>
</html>
