@extends('layouts.frontend')
@section('content')
<div class="my-info-page">
    <div class="container">
        <div class="wrapper">
            <!-- SIDEBAR -->
            <aside class="sidebar">
                <div class="sidebar-header">
                    <div class="cta-btn-list">
                        <a href="{{ route('my-info') }}">
                            <button class="btn tab-btn {{ request()->routeIs('my-info.profile') ? 'active' : '' }}">
                                MY PROFILE
                            </button>
                        </a>
                        <a href="{{ route('my-info.address') }}">
                            <button class="btn tab-btn {{ request()->routeIs('my-info.address') ? 'active' : '' }}">
                                ADDRESS
                            </button>
                        </a>

                        <button class="btn tab-btn">ORDERS</button>
                        <button class="btn tab-btn">COUPONS</button>
                        <button class="btn tab-btn">MEMBERSHIP</button>
                    </div>
                </div>
                <div class="sidebar-footer">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="logout-btn" type="submit">Logout</button>
                    </form>
                </div>
            </aside>
            <!-- CONTENT -->
            <section class="content">
                     <div class="profile-header">
            <h2>Hi! {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h2>
          </div>
                @yield('my_info_content')
            </section>
        </div>
    </div>
</div>
@endsection
