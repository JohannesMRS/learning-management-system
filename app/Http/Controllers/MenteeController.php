<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modules;
use Illuminate\Support\Facades\Auth;
use App\Models\UserActivity;

class MenteeController extends Controller
{
    public function index(){
        if(!Auth::check()){
            return redirect()->route('login');
        }


        $users = Auth::user()->load('kelas.modules');

        $recentModules = UserActivity::where('id_user', $users->id)->with('module')->orderBy('accessed_at', 'desc')->limit(3)->get();
        return view('mentee.index', compact('users', 'recentModules'));
    }

    public function module(){
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $users = Auth::user()->load('kelas.modules');
        return view('mentee.module', compact('users'));
    }

    public function activity($id_module){
        UserActivity::updateOrCreate(
            ['id_user' => Auth::id(), 'id_module'=>$id_module],
            ['accessed_at' => now()]
        );

        $module = Modules::findOrFail($id_module);

        return view('mentee.module', compact('module'));

    }

    // menambahkan method activity

}
