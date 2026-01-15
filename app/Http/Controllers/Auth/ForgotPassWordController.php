<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPassWordController extends Controller
{   
    //get UI 
    public function showForgotForm (){
        return view('auth.forgotpass');

    }
    public function sendResetLink(Request $request){
         
        $request -> validate([
                'email' => 'required|email|exists:users,email',
            ]);
            $status = Password::sendResetLink(
                $request->only('email')
            );
     return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'Đã gửi link reset mật khẩu')
            : back()->withErrors(['email' => 'Không gửi được email']);           
    }
}
