<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>

<footer class="w-full bg-slate-900 text-slate-200 mt-20 border-t border-slate-800">
    
    <div class="w-11/12 max-w-7xl mx-auto py-12 grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-8 px-4">
        
        <div class="space-y-3">
            <h2 class="text-base font-bold text-white tracking-wider uppercase text-sm">Alamat</h2>
            <p class="text-slate-400 text-sm leading-relaxed pt-1">
                Jalan Almamater No. 1, Kampus USU, Padang Bulan, Kecamatan Medan Baru, Kota Medan, Sumatera Utara 20155.
            </p>
            <div class="pt-2">
                <a target="_blank" href="https://maps.google.com" class="inline-flex items-center gap-1 text-sm font-semibold text-blue-400 hover:text-blue-300 transition-colors group">
                    <span>Lihat di Maps</span>
                    <span class="transform group-hover:translate-x-1 transition-transform">&rarr;</span>
                </a>
            </div>
        </div>

        <div class="space-y-3">
            <h2 class="text-base font-bold text-white tracking-wider uppercase text-sm">Media Sosial</h2>
            
            <ul class="space-y-2.5 text-sm pt-1">
                <li>
                    <a href="#" class="text-slate-400 hover:text-blue-400 flex items-center gap-2 transition-colors group">
                        <span class="w-1.5 h-1.5 bg-slate-600 group-hover:bg-blue-400 rounded-full transition-colors"></span>
                        Instagram
                    </a>
                </li>
                <li>
                    <a href="#" class="text-slate-400 hover:text-blue-400 flex items-center gap-2 transition-colors group">
                        <span class="w-1.5 h-1.5 bg-slate-600 group-hover:bg-blue-400 rounded-full transition-colors"></span>
                        LinkedIn
                    </a>
                </li>
                <li>
                    <a href="#" class="text-slate-400 hover:text-blue-400 flex items-center gap-2 transition-colors group">
                        <span class="w-1.5 h-1.5 bg-slate-600 group-hover:bg-blue-400 rounded-full transition-colors"></span>
                        Twitter
                    </a>
                </li>
                <li>
                    <a href="#" class="text-slate-400 hover:text-blue-400 flex items-center gap-2 transition-colors group">
                        <span class="w-1.5 h-1.5 bg-slate-600 group-hover:bg-blue-400 rounded-full transition-colors"></span>
                        Facebook
                    </a>
                </li>
            </ul>
        </div>

        <div class="space-y-3">
            <h2 class="text-base font-bold text-white tracking-wider uppercase text-sm">Diskusi</h2>
            
            <div class="text-slate-400 text-sm space-y-1 pt-1">
                <p>Punya pertanyaan seputar materi?</p>
                <p>Kami sangat terbuka untuk berdiskusi bersama kamu.</p>
            </div>
            <div class="pt-2">
                <a href="mailto:sibaranijohannes8@gmail.com" class="inline-flex items-center gap-1.5 px-4 py-2 bg-slate-800 border border-slate-700 rounded-xl text-sm font-medium text-blue-400 hover:bg-slate-750 hover:text-blue-300 transition-all shadow-sm">
                    <span>Kirim Pertanyaan</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </a>
            </div>
        </div>

    </div>

    <div class="w-full bg-slate-950/60 border-t border-slate-800/60 py-5 text-center px-4">
        <p class="text-slate-500 text-xs tracking-wide">
            &copy; 2026 <span class="text-slate-400 font-semibold">VeloLearn</span>. All rights reserved.
        </p>
    </div>

</footer>

</body>
</html>