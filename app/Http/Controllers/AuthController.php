<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create(){
        return view('auth/signup');
    }

    public function signup(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6',
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        $token = $user -> createToken('myAppToken');
        $response = [
            'user'=>$user,
            'token'=>$token
        ];
        return response()->json($response, 201);
        // return redirect()->route('login');
    }

    public function login(){
        // return view('auth.login');
    }

    public function customLogin(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);

        $credentials = [
            'email'=>request('email'),
            'password'=>request('password'),
        ];

        if(!Auth::attempt($credentials)){
            // $request->session()->regenerate();
            // return redirect('/');
            return response('Bad login', 401);
        }
    $user = User::where('email', request('email'))->first();
        $token = $user -> createToken('myAppToken');
        $response = [
            'user'=>$user,
            'token'=>$token
        ];
        return response()->json($response, 201);

        // return back()->withErrors([
        //     'email'=>'Предоставленных данных недостаточно для подтверждения пользователя'
        // ]);
    }

    public function logout(Request $request){
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // return redirect('/');
        return response(['Message'=>'Log out'], 201);
    }
}
