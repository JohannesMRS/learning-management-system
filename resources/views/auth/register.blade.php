<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LMS Mentoring</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-xl shadow-md w-96 border border-gray-100">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800 tracking-wide">Form Register</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-200 text-red-600 px-4 py-2 rounded-lg mb-4 text-sm font-medium">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id = "formRegister" action="{{ route('registerProses') }}" method="POST" autocomplete="off" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Nama Lengkap</label>
                <input type="text"
                       name="name"
                       required
                       placeholder="Masukkan nama lengkap"
                       value="{{ old('name') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Email</label>
                <input type="email"
                       name="email"
                       required
                       placeholder="Masukkan email"
                       value="{{ old('email') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Password</label>
                <input type="password"
                       name="password"
                       required
                       placeholder="Minimal 6 karakter"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Konfirmasi Password</label>
                <input type="password"
                    name="password_confirmation"
                    required
                    placeholder="Ulangi password kamu"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Kode Registrasi (Token Admin)</label>
                <input type="text"
                       name="registration_code"
                       required
                       placeholder="Contoh: TOKEN-XYZ"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition duration-200 uppercase font-mono tracking-wider">
            </div>


            <button type="submit"
                    class="w-full bg-amber-500 text-white py-2.5 rounded-lg font-bold hover:bg-amber-600 transition duration-200 shadow-sm mt-2">
                Register
            </button>
        </form>

        <p class="text-sm text-center text-gray-500 mt-5">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-amber-600 font-semibold hover:underline">Login disini</a>
        </p>
    </div>
    <script>
        document.getElementbyId("formRegister").addEventListener('submit', function(e){
            const password = document.getElementByName("password")[0].value;
            const passwordConfirmation = document.getElementByName("password_confirmation")[0].value;

            if(password !== passwordConfirmation){
                e.preventDefault();
                alert("Konfirmasi Password Tidak sama")
            }
        })
    </script>
</body>
</html>
