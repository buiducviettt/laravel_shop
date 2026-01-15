
@extends('layouts.auth')
@section('title', 'Login Page')
@section('content')
@section('auth-form')

                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <h2 class="title signin-title">SIGN IN</h2>
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input class="{{$errors->has('email') ? 'is-invalid' : ''}}" type="email" value="{{old('email')}}"name = "email" placeholder="Enter your email">
                        @error('email')
                         <span class="error-text">{{ $message }}</span>
                        @enderror
                        </div>
                       <div class="or-input"><span>OR</span></div>
                        <div class="form-group">
                        <label for="phone">Phone</label>
                        <input class="{{$errors->has('phone')?'is-invalid':''}}" name="phone" value="{{old('phone')}}" type="text" placeholder="Enter your number">
                        @error('phone')
                         <span class="error-text">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-input">
                        <input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" name = "password" type="password"  placeholder="Password">
                        @error('password')
                         <span class="error-text">{{ $message }}</span>
                        @enderror
                        <div class="toggle-visibility" id="toggleBtn">
                         <span class="eye"></span class="eye"></span>
                        </div>
                        </div>
                        </div>
                       <a href="{{route('password.request')}}" class='forgot-password'> Forgot Password</a>
                        <div class="cta-sec">                          
                         <x-button ctaText="CONTINUE" type="submit" />                        
                        </div>
                        @if(session('success'))
                            <p style="color:green">{{ session('success') }}</p>
                        @endif
                         <div class="bottom-text">
                            <span>Don't have an account? </span>
                            <a href="{{route('register')}}">Sign Up</a>
                        </div>                      
                    </form>
            
@endsection