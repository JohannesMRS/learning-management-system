<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modules;

class MenteeController extends Controller
{
    public function index(){
        $datas = Modules::all();
        return view('mentee.index', compact('datas'));
    }

}
