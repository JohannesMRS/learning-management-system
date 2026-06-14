<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\RegistrationCode;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $datas = Admin::oldest()->paginate(3);
        $registrationCodes = RegistrationCode::oldest()->paginate(3);
        return view('admin.index', compact('datas', 'registrationCodes'));
    }

    public function users(){
        $datas = Admin::oldest()->paginate(10);
        return view('admin.users', compact('datas'));
    }

    public function usersEdit($id){
        $users = User::findOrFail($id);
        return view('admin.user_edit', compact('users'));
    }

    public function usersUpdate(Request $request, $id){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'registration_ode' => 'nullable | string | max:50',
        ]);

        $users = User::findOrFail($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->registration_code = $request->registration_code;

        if($request->filled('password')){
            $users ->password = bcrypt($request ->password);
        }

        $users->save();
        return redirect()->route('admin.users');
    }

    public function usersDestroy($id){
        $user = Admin::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }


    public function generate(){
        return view('admin.generate');
    }
}
