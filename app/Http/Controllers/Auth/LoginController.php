<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $user = DB::table('users')
                ->where('email', '=', $request->email)
                ->where('password', '=', $request->password)
                ->first();
            if (isset($user)) {
                return redirect()->route('home');
            } else {
                Session::flash('error', 'Sai mật khẩu hoặc email');
                return redirect()->route('login');
            }
        }
        return view('Auth.Login');
    }
}