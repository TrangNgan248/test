<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\AuthAdminTrait;
    use Illuminate\Contracts\Session\Session;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    session_start();

    class AdminController extends Controller
    {
        //register
        public function index(){
            return view('admin.auth.register');
        }
        public function store(Request $request){
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'password' => 'required|min:6|confirmed',
            ]);

                User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            
            auth()->attempt($request->only('email', 'password'));

            //redirect
            return redirect()->to('home');
        }
        public function AuthLogin(){
            if(!Auth::check()){
                return redirect()->back();
            }
            return redirect()->to('home');
        }
        
        public function LoginAdmin()
        {
            // if (auth()->check()) {
            //     return redirect()->to('home');
            // }
            return view('login');
            // dd(bcrypt('123456789'));
        }
        
        public function postLoginAdmin(Request $request)
        {
           // dd(Auth::attempt(['email' => $request->email, 'password' => $request->password]));
           $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //dd(Auth::attempt($request->only('username', 'password')));
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            $request->session()->regenerate();

            return redirect()->route('admin.home');
        }

        return back()->withErrors([
            'username' => 'Sai tên đăng nhập hoặc mật khẩu',
        ]);
        }
        public function logoutAdmin(){
            $this->AuthLogin();
            Auth::logout();
            return redirect()->to('admin');
        }
    }
?>