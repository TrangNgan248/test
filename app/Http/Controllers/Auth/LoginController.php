<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function store(Request $request){
        //dd('ok');
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //dd(Auth::attempt($request->only('username', 'password')));
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            $request->session()->regenerate();
    
            return redirect()->route('home');
        }
    
        return back()->withErrors([
            'email' => 'Sai tên đăng nhập hoặc mật khẩu',
        ]);
    }
}
