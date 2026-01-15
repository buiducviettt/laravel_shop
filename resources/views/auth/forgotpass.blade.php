@extends('layouts.auth')
@section('title', 'Forgot Password Page')
@section('auth-form')
<form action="{{route('password.email')}}" method="POST" class="forgot-pass-form">
    @csrf
    <h2 class="title signin-title">RESET PASSWORD</h2>
    <div class="form-group">
        <input type="email"  name="email" placeholder="Email">
    </div>
    <div class="cta-sec">
        <x-button ctaText="CONTINUE" type="submit" />
    </div>
</form>
@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif
@endsection
