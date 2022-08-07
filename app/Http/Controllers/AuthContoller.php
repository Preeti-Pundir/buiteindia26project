<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthContoller extends Controller
{

    //
    public function login(Request $req)
    {
        # code...
       return view('auth.login');
    }

    public function logincheck(Request $req)
    {
        # code...
        $user=User::where('email',$req->email)->first();
        if(!$user || !Hash::check($req->password,$user->password)){
            return "your not login";
        }

        if($user->masteradmin==true){
            session(['login' => true]);

            $userdata=$user->toArray();
            session()->put("user",$userdata);
            return  redirect(route('adminhome'));
        }else{
            session(['login' => true]);
            $userdata=$user->toArray();
            session()->put("user",$userdata);
            return  redirect(route('storehome'));
        }
    }

    public function logout(Request $req)
    {
        # code...
        $req->session()->forget('login');
        return redirect(route('login'));
    }
}
