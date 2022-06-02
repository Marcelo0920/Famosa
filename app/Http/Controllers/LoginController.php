<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        if(Auth::check()){
            return redirect('/home');
        }
        return view('auth.Login');
    }

    public function login(LoginRequest $request){
        $credentials = $request->getCredentials();
        if(!Auth::validate($credentials)){
            return redirect()->to('/login')->withErrors('Email and/or password is incorrect');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return $this->authenticated($request, $user);
    }

    public function Authenticated(Request $request, $user){
        $TipoC = auth()->user()->TipoC;
        $TipoE = auth()->user()->TipoE;
        $TipoA = auth()->user()->TipoA;
        if($TipoC == 1){
            return view('home.index');
        }
        if($TipoE == 1){
            return view('home.indexEmp');
        }
        if($TipoA == 1){
            return view('home.indexAdm');
        }
    }
}
