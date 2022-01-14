<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\KHang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);
        // if(!$request->only('email', 'password')){
        //     return back()->withErrors([
        //         'email' => 'Tài khoản này đã tồn tại'
        //     ]);
        // }
            User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_role' => '1',
        ]);
       // dd( auth()->attempt($request->only('email', 'password')));
      
       auth()->attempt($request->only('email', 'password'));

        //redirect
        return redirect()->route('home');
    }
}
