@extends('layouts.frontend')
@section('content')
<div class="login-page">
    <div class="wrapper">
        <div class="bg"></div>
        <div class="login-form">
            <div class="wrapper">
                @yield('auth-form')
            </div>
        </div>
    </div>
</div>
@endsection
