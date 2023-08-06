<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Session;

class RegisterController extends Controller
{
    //
    public function register(Request $request){
        if ($request->isMethod('POST')) {
            $user = User::create($request->except('_token'));
                
            // dd($user);
            if($user->id){
                Session::flash('success','thêm mới thành công ');
                return redirect()->route('home');
            }
        }
        return view('Auth.Register');
        
    }
}
