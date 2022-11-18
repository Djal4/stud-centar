<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function logIn(Request $request)
    {
        if(Auth::check()){
            return response('',400);
        }else{
            if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
                $user=User::find(Auth::id());
                $token=$user->createToken('token')->plainTextToken;
                $user->remember_token=$token;
                $user->save();
                return response()->json([
                    "token"=>$token
                ]);
            }else{
                return response('',400);
            }
        }
    }

    public function LogOut(Request $request)
    {
        $user=User::find(Auth::id());
        $user->tokens()->delete();
        $user->remember_token=NULL;
        $user->save();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
    }
}
