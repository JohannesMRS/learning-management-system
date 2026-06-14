<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    public function logout(Request $request){
        $request->session()->forget(['user_id', 'user_name', 'user_role']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
