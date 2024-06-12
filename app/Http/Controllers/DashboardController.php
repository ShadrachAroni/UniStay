<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $role=Auth::user()->role_id;

        if($role=='0'){
            return view ('admin.dashboard');
        }
        elseif($role=='2'){
            return view ('agent.dashboard');
        }
        else{
            return view('dashboard');
        }

    }
}
