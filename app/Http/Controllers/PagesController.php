<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $pagetitle="Dashboard";
        $user=session()->get("userhoten");
       return view('index',compact('pagetitle','user'));
    }
}
