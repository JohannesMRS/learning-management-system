<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentee | @yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50">

    <nav class="fixed top-0 left-0 w-full h-16 bg-white/80 backdrop-blur-md border-b border-slate-200/80 z-50">
        <div class="w-full h-full flex justify-between items-center px-4 md:px-12">
            
            <div class="flex items-center gap-2 z-50">
                <div class="w-3 h-3 bg-blue-600 rounded-full animate-pulse"></div>
                <span class="text-xl font-extrabold tracking-tight bg-gradient-to-r from-blue-600 to-blue-800 text-transparent bg-clip-text">
                    Mentoring.
                </span>
            </div>

            <div class="hidden md:flex items-center gap-2">
                <a href="{{ route('mentee.index') }}" 
                   class="nav-link px-4 py-2 text-sm font-medium text-slate-600 rounded-xl hover:text-blue-600 hover:bg-blue-50/50 transition-all duration-200">
                   Home
                </a>
                <a href="{{ route('mentee.module') }}" 
                   class="nav-link px-4 py-2 text-sm font-medium text-slate-600 rounded-xl hover:text-blue-600 hover:bg-blue-50/50 transition-all duration-200">
                   Module
                </a>
            </div>

            <div class="flex items-center gap-3">
                
                <div class="relative">
                    <button id="dropDownButton" class="flex h-10 w-10 justify-center items-center focus:outline-none cursor-pointer rounded-xl bg-blue-50 border border-blue-100 hover:bg-blue-100/70 transition-all duration-200 group">
                        <span class="font-bold text-sm text-blue-600 tracking-wider group-hover:scale-105 transition-transform">
                            {{ Str::of(auth()->user()->name)->headline()->explode(' ')->map(fn($word)=>mb_substr($word, 0, 1))->take(2)->implode('') }}
                        </span>
                    </button>

                    <div id="dropDownMenu" class="hidden absolute right-0 mt-3 w-64 bg-white rounded-2xl shadow-[0_10px_30px_-5px_rgba(0,0,0,0.1)] py-2 z-50 border border-slate-100 origin-top-right transition-all">
                        <div class="px-4 py-3 border-b border-slate-100">
                            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Logged In As</p>
                            <p class="text-sm font-bold text-slate-800 truncate mt-0.5">{{ auth()->user()->name }}</p>
                            
                            <div class="flex flex-wrap gap-1 mt-2">
                                @foreach($users->kelas as $kelas)
                                    <span class="inline-block text-[10px] font-bold bg-slate-100 text-slate-600 px-2 py-0.5 rounded-md">
                                        Kelas {{ $kelas->nama_kelas }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <div class="p-1.5">
                            <form action="{{ route('logout') }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-xl transition-colors text-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <span>Keluar Aplikasi</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <button id="mobileMenuButton" class="flex md:hidden h-10 w-10 justify-center items-center text-slate-600 hover:text-blue-600 hover:bg-slate-100 rounded-xl transition-all focus:outline-none">
                    <svg id="hamburgerIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="closeIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>
        </div>

        <div id="mobileMenu" class="hidden md:hidden absolute top-16 left-0 w-full bg-white border-b border-slate-200 shadow-lg px-6 py-4 flex flex-col gap-2 transition-all duration-300">
            <a href="{{ route('mentee.index') }}" 
               class="nav-link px-4 py-3 text-base font-semibold text-slate-600 rounded-xl hover:text-blue-600 hover:bg-blue-50/50 transition-all">
               Home
            </a>
            <a href="{{ route('mentee.module') }}" 
               class="nav-link px-4 py-3 text-base font-semibold text-slate-600 rounded-xl hover:text-blue-600 hover:bg-blue-50/50 transition-all">
               Module
            </a>
        </div>
    </nav>

    <div class="h-16"></div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // --- 1. Logika Highlight Active Page (Aman untuk Desktop & Mobile) ---
            const navLinks = document.querySelectorAll(".nav-link");
            const currentPage = window.location.pathname;

            navLinks.forEach((link) => {
                const linkPath = new URL(link.href).pathname;

                if (currentPage === linkPath) {
                    link.classList.remove("text-slate-600", "hover:bg-blue-50/50", "hover:text-blue-600");
                    link.classList.add("bg-blue-600", "text-white", "shadow-sm", "shadow-blue-200", "hover:text-white");
                }
            });

            // --- 2. Logika Mobile Menu (Hamburger) ---
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const mobileMenu = document.getElementById('mobileMenu');
            const hamburgerIcon = document.getElementById('hamburgerIcon');
            const closeIcon = document.getElementById('closeIcon');

            mobileMenuButton.addEventListener('click', (e) => {
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden');
                hamburgerIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
                
                // Tutup profile menu jika sedang terbuka saat membuka menu hp
                if(!dropDownMenu.classList.contains('hidden')) {
                    dropDownMenu.classList.add('hidden');
                }
            });

            // --- 3. Logika Profile Dropdown ---
            const dropDownButton = document.getElementById('dropDownButton');
            const dropDownMenu = document.getElementById('dropDownMenu');

            dropDownButton.addEventListener('click', (e) => {
                e.stopPropagation();
                dropDownMenu.classList.toggle('hidden');
                
                // Tutup mobile menu jika sedang terbuka saat klik profile
                if(!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    hamburgerIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                }
            });

            // --- 4. Klik di Luar untuk Menutup Semua Menu Terbuka ---
            window.addEventListener('click', () => {
                if (!dropDownMenu.classList.contains('hidden')) {
                    dropDownMenu.classList.add('hidden');
                }
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    hamburgerIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                }
            });
        });
    </script>

    @yield('content')

</body>
</html>