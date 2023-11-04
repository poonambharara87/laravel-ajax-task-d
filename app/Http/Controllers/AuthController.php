<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
     
         
            $user = User::where('email', '=', $request->email)->where('role_type', '=', '1')->first();
            
            if($user && $request->password == $user->password){
                Auth::login($user);
                if(Auth::check())
                {
                    return view('auth.dashboard');
                }
            }else{
                return response()->json(['error', 'Invalid Credentials']);
            }
        }
}
