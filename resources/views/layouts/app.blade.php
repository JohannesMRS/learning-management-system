<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <main class = "flex justify-between">
        <aside class = "bg-gray-200 flex flex-col w-80 h-screen shadow-[0px_1px_5px_1px_rgba(0,0,0,0.2)]">
            <div class = "text-2xl font-mono font-bold h-40 flex justify-center items-center bg-amber-300">
                Hello Johannes
            </div>
            <div class = " mt-10 p-4">
                <a href="{{ route('admin.index') }}" class = "p-3 pl-5 block text-xl hover:bg-amber-200 font-mono font-bold">Dashboard</a>
                <a href="{{ route('admin.users') }}" class = "p-3 pl-5 block text-xl mt-2 hover:bg-amber-200 font-mono font-bold">User</a>
                <a href="{{ route('admin.generate') }}" class = "p-3 pl-5 block text-xl mt-2 hover:bg-amber-200 font-mono font-bold">Generate Code</a>
            </div>
        </aside>

        @yield('content')
    </main>
</body>
</html>
