<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LMS Mentoring</title>
    @vite('resources/css/app.css')
</head>
<body class=" flex items-center justify-center h-screen font-mono">

    <div class="w-4/12 bg-white  rounded-xl shadow-md  border border-gray-100 pb-10">
        <h1 class="text-2xl font-bold text-center mb-6 p-8 rounded-t-xl tracking-wide bg-linear-to-r from-blue-500 to-purple-500 text-white">Form Register</h1>

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

            <div class = "pl-5 pr-5">
                {{-- <label class="block text-sm font-semibold text-gray-600 mb-1">Nama Lengkap</label> --}}
                <input type="text"
                       name="name"
                       required
                       placeholder="Nama Lengkap"
                       value="{{ old('name') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
            </div>

            <div class = "pl-5 pr-5">
                {{-- <label class="block text-sm font-semibold text-gray-600 mb-1">Email</label> --}}
                <input type="email"
                       name="email"
                       required
                       placeholder="Email"
                       value="{{ old('email') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
            </div>

            <div class = "pl-5 pr-5">
                {{-- <label class="block text-sm font-semibold text-gray-600 mb-1">Password</label> --}}
                <input type="password"
                       name="password"
                       required
                       placeholder="Password"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
            </div>

            <div class = "pl-5 pr-5">
                {{-- <label class="block text-sm font-semibold text-gray-600 mb-1">Konfirmasi Password</label> --}}
                <input type="password"
                    name="password_confirmation"
                    autocomplete = "new-password"
                    required
                    placeholder="Konfirmasi Password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200">
            </div>

            <div class = "pl-5 pr-5">
                {{-- <label class="block text-sm font-semibold text-gray-600 mb-1">Kode Registrasi (Token Admin)</label> --}}
                <input type="text"
                       name="registration_code"
                       required
                       placeholder="Kode Registrasi"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500 transition duration-200 uppercase font-mono tracking-wider">
            </div>


            <button type="submit"
                    class="w-11/12 block mx-auto bg-blue-500 hover:bg-purple-500 duration-200 text-white py-2.5 rounded font-bold transition shadow-sm mt-2 cursor-pointer">
                Register
            </button>
        </form>

        <p class="text-sm text-center text-gray-500 mt-5">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500  font-semibold hover:text-purple-500 hover:underline">Login disini</a>
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
