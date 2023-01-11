<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }

        //
        function register(Request $req)
        {
            $user= User::where(['email'=>$req->email])->first();
            if($user)
            {
                return redirect('/login');
            }
            else{
                $newUser= new User;
                $newUser->name=$req->name;
                $newUser->email=$req->email;
                $newUser->password=Hash::make($req->password);
                $newUser->save();

                $req->session()->put('user',$newUser);
                return redirect('/');
            }
        }
}
