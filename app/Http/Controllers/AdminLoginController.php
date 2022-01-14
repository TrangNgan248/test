<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    
    public function index()
    {
        return view('login');
    }
    
    public function store(Request $request)
    {
       // dd(Auth::attempt(['email' => $request->email, 'password' => $request->password]));
       $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    //dd(Auth::attempt($request->only('username', 'password')));
    if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
        $request->session()->regenerate();

        return redirect()->route('adminhome');
    }

    return back()->withErrors([
        'email' => 'Sai tên đăng nhập hoặc mật khẩu',
    ]);
    }
}
