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
        return view('mentee.index', compact('users'));
    }

    public function module(){
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $users = Auth::user()->load('kelas.modules');
        return view('mentee.module', compact('users'));
    }

    public function activity($id){
        UserActivity::updateOrCreate(
            ['id_user' => Auth::id(), 'id_module'=>$id],
            ['accessed_at' => now()]
        );
    }

    // menambahkan method activity

}
