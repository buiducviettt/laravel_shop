<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ResetPassWordController extends Controller
{  public function showResetForm(Request $request, $token)
    {
      return view('auth.reset-password', [
        'token' => $token,
        'email' => $request->email, // 👈 CỰC KỲ QUAN TRỌNG
    ]);
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect('/login')->with('success', 'Đổi mật khẩu thành công')
            : back()->withErrors(['email' => 'Token không hợp lệ']);
    }
    //
}
