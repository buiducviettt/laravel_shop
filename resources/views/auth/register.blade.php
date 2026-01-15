@extends( 'layouts.auth' )
@section ('title', 'Register Page')
@section('auth-form')
  <form method="POST" action="{{route('register')}}">
                        @csrf
                        <h2 class="title signin-title">SIGN UP</h2>
                        <div class="row">           
                        <label for="name">Name</label>
                          <div class="col col-md-6">
                        <div class="form-group">
                        <input class="{{$errors->has('first_name')?'is-invalid':''}}" name="first_name" value="{{old('first_name')}}" type="text" placeholder="First name">
                        @error('first_name')
    <span class="error-text">{{ $message }}</span>
@enderror
                        </div>
                        </div>
                        <div class="col col-md-6">
                        <div class="form-group">
                            <input type="text" name = "last_name"  class="{{$errors->has('last_name')?'is-invalid':''}}" value="{{old('last_name')}}" placeholder="Last name">
                            @error('last_name')
    <span class="error-text">{{ $message }}</span>
@enderror
                        </div>
                        </div>
                         </div>
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input class="{{$errors->has('email') ? 'is-invalid' : ''}}" type="email" value="{{old('email')}}"name = "email" placeholder="Enter your email">
                        @error('email')
                         <span class="error-text">{{ $message }}</span>
                        @enderror
                        </div>
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
                        <input name="password"  class="{{ $errors->has('password') ? 'is-invalid' : '' }}"  type="password"  placeholder="Password">
                        @error('password')
                         <span class="error-text">{{ $message }}</span>
                        @enderror
                        <div class="toggle-visibility" id="toggleBtn">
                         <span class="eye"></span class="eye"></span>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
    <label for="password_confirmation">Confirm Password</label>
    <input
        type="password"
        name="password_confirmation"
        placeholder="Confirm Password"
    >
</div>
                       <a href="" class='forgot-password'> Forgot Password</a>
                       <div class="checkbox">
                            <input name="agree"type="checkbox" value=1> <span>I agree to the platforms <a href=""> Terms of Service</a> and <a href="">Privacy Policy </a></span>
                        </div>
                        <div class="sign-up">
                            <p>Already have an account? <a href="{{route('login')}}">Sign in</a></p>
                        </div>
                        <div class="cta-sec">                          
                         <x-button ctaText="CONTINUE" type="submit" />                        
                        </div> 
                        @if(session('success'))
    <div class="success-box">
        {{ session('success') }}
    </div>
@endif
                    </form>
@endsection