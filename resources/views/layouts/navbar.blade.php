<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mente | @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="flex fixed bg-white w-full h-16 justify-between p-5 pl-15 pr-10 items-center shadow-[2px_0px_5px_2px_rgba(128,128,128,0.2)]" id = "navbar-mentee">
    <div class = "text-xl font-bold font-mono bg-linear-to-r from-blue-500 to-purple-500 text-transparent bg-clip-text">
        Mentoring
    </div>
    <div class="flex gap-10">
        <a href="{{ route('mentee.index') }}" class = "nav-link">Home</a>
        <a href="{{ route('mentee.module') }}" class = "nav-link">Module</a>
    </div>

    <!-- Bungkus Tombol dan Menu di dalam satu div 'relative' -->
    <div class="relative">
        <button id="dropDownButton" class="flex flex-col h-10 w-10 justify-center items-center focus:outline-none cursor-pointer rounded-full bg-gray-200 hover:bg-gray-400 transition duration-200 font-mono">
            <span class="font-semibold text-xl text-gray-800">{{ Str::of(auth()->user()->name)->headline()->explode(' ')->map(fn($word)=>mb_substr($word, 0, 1))->take(2)->implode('') }}</span>

        </button>

        <!-- Menu Dropdown (Posisinya absolute agar melayang) -->
        <div id="dropDownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-100">
            <span class="text-sm text-gray-500 ml-4">{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="block w-full">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition-colors">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

@yield('content')

<script src = "{{ asset('js/script.js') }}"></script>
</body>
</html>
