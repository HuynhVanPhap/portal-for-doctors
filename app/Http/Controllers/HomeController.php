<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect() {
        if (Auth::id()) {
            switch ((int) Auth::user()->usertype) {
                case 0 : return view('user.home'); break;
                case 1 : return view('admin.home'); break;
                default : return view('dashboard'); break;
            }
        } else {
            return redirect()->back();
        }
    }
}
