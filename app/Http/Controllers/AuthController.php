<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //user login and release token
    public function login(Request $request){

        $user=User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                return response()->json([
                   'user'=>$user,
                   'token'=>$user->createToken(time())->plainTextToken
                ]);
            }
        }else{
            return response()->json([
                'user'=>null,
                'token'=>null
            ]);
        }
    }
    //Register
    public function register(Request $request){
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->passsword)
        ];
        User::create($data);
        $user=User::where('email',$request->email)->first();
        if($user){
            return response()->json([
                'user'=>$user,
                'token'=>$user->createToken(time())->plainTextToken
            ]);
        }
    }
    //category
    public function category(){
        return 'Code Lab Auth Test';
    }
}
