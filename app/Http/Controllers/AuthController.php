<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\RegistrationCode;

class AuthController extends Controller
{

public function index(Request $request)
{

    if ($request->session()->has('user_id')) {

        $role = $request->session()->get('user_role');

        if ($role === 'admin') {
            return redirect()->route('admin.index');
        } elseif ($role === 'mentor') {
            return redirect()->route('mentor.index');
        } else {
            return redirect()->route('mentee.index');
        }
    }


    return view('auth.login');
}

    public function loginProses(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();



        if($user && Hash::check($request->password, $user->password)){
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_name', $user->name);
            $request->session()->put('user_role', $user->role);

            $request->session()->regenerate();

                $role = $user->role;
                if($role === 'admin'){
                    return redirect()->route('admin.index');
                }elseif($role === 'mentor'){
                    return redirect()->route('mentor.index');
                }else{
                    return redirect()->route('mentee.index');
                }
        }

        return back()->withErrors([
            'login_error'=> 'Email  atau Password Salah'
        ]);

    }

    public function register(){
        return view('auth.register');
    }

    public function registerProses(Request $request)
{
    // 1. Validasi Input Form
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'registration_code' => 'required'
    ], [
        'email.unique' => 'Email ini sudah terdaftar, bang!',
        'password.min' => 'Password minimal 6 karakter, bang!',
        'password.confirmed' => 'Waduh bang, konfirmasi password-mu gak cocok!'
    ]);

    // 2. 🔍 SENSOR DATABASE: Cari apakah token ada di database dan statusnya BELUM DIPAKAI (is_used = 0)
    $tokenData = RegistrationCode::where('code', $request->registration_code)
                                  ->where('is_used', 0)
                                  ->first();

    // Jika token tidak ditemukan atau sudah hangus
    if (!$tokenData) {
        return back()->withErrors([
            'registration_code' => 'Waduh bang, Token Salah atau sudah pernah digunakan oleh orang lain!'
        ])->withInput();
    }

    // 3. 🚀 SENSOR LOLOS: Simpan akun Mentee baru ke database
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'mentee'
    ]);

    // 4. 🔥 HANGUSKAN TOKEN: Ubah status token menjadi sudah dipakai agar tidak bisa dicolong orang lain
    $tokenData->update([
        'is_used' => 1
    ]);

    return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login, bang.');
}

    public function logout(Request $request){
        $request->session()->forget(['user_id', 'user_name', 'user_role']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
