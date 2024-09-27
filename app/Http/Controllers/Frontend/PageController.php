<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function login(Request $request){
        return view('pages.login-page');
    }

    function register(Request $request){
        return view('pages.register-page');
    }

    function dashboard(Request $request){
        $email =  JWTToken::decodeJWT($request->cookie('token'));
        $user = User::where('email', $email)->first();
        if ($user->isAdmin()){
            return view('pages.adminDashboard-page');
        }else{
            return view('pages.dashboard-page');
        }
    }

}
