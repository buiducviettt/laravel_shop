<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;  
use Illuminate\Http\Request;
//use Auth
use Illuminate\Support\Facades\Auth;
// use Hash
use Illuminate\Support\Facades\Hash;
//use Password 
use Illuminate\Support\Facades\Password;
// user
use App\Models\User;
class AuthController extends Controller
{
   //
  public function showLogin(){
  
            return view('auth.login');
        }

    public function login (Request $request){
        $request->validate(
            [
                'password' => 'required|min:6',
                'phone'=>'nullable|numeric'
            ]
            );
            $email = $request->input('email');
            $phone = $request->input('phone');
            // không nhập gì 
            if(!$email && !$phone){
                return back()->withErrors([   
                    'email'=>'Vui lòng nhập email hoặc số điện thoại để đăng nhập',    
                    'phone'=>'Vui lòng nhập email hoặc số điện thoại để đăng nhập'        
                ]);
            };
            if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return back()->withErrors([
        'email' => 'Email không đúng định dạng'
    ])->withInput();
}
            // nếu nhập cả 2 
            if($email&&$phone){
                return back()->withErrors([
                    'email'=>'Vui lòng chỉ nhập 1 trong 2 trường email hoặc số điện thoại',
                    'phone'=>'Vui lòng chỉ nhập 1 trong 2 trường email hoặc số điện thoại'
                ]);
            };
            // khi user nhập[ email hoac phone ] hệ thống xử lý 
           $credentials = $email
            ? ['email' => $email, 'password' => $request->password]
             : ['phone' => $phone, 'password' => $request->password];
             if(Auth::attempt($credentials)){
                 $request->session()->regenerate();
                 return back()->with('success', 'Đăng nhập thành công');
             }
             return back()->withErrors([
                 'email' => 'Thông tin đăng nhập không đúng',
    'phone' => 'Thông tin đăng nhập không đúng',
             ])
             ->withInput();
    }
    public function showRegister(){
        return view('auth.register');
    }
    public function register(Request $request){
        $request->validate([
   'first_name' => 'required|string|max:50',
    'last_name'  => 'required|string|max:50',
    'email' => 'nullable|email|unique:users',
    'phone' => 'nullable|numeric|unique:users',
    'password' => 'required|confirmed|min:6',
    'agree'      => 'accepted',
        ]);
        if (!$request->email && !$request->phone) {
    return back()->withErrors([
        'email' => 'Phải nhập email hoặc số điện thoại',
        'phone' => 'Phải nhập email hoặc số điện thoại',
    ])->withInput();
}    
        $user= User::create([
             'first_name' => $request->first_name,
    'last_name'  => $request->last_name,
      'email'      => $request->email,
             'phone' => $request->phone,
            'password'=>Hash::make($request->input('password'))
        ]);  
       
   Auth::login($user);
    // xong return user về trang login 
    return back()->with('success', 'Đăng ký thành công');
    }
    public function showForgot(){
        return view('auth.forgot-password');

    }
       // ===== PROFILE =====
    public function showMyInfo()
    {
        return view('auth.profile.profile');
    }
      // ===== LOGOUT =====
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
