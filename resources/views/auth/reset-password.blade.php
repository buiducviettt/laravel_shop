@extends('layouts.auth')

@section('title', 'Reset Password')

@section('auth-form')
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">
    <h2 class="title signin-title">RESET PASSWORD</h2>
    <input type="password" name="password" placeholder="Mật khẩu mới" required>
    <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" required>

    <button type="submit">Đổi mật khẩu</button>
</form>
@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif
@if ($errors->any())
    <p style="color:red">{{ $errors->first() }}</p>
@endif

@endsection
