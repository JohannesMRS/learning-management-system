<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\RegistrationCode;

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

    public function generate(){
        return view('admin.generate');
    }
}
