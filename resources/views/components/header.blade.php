<header class="header">
  <div class="container">
  <div class="wrapper">
    <div class="nav-left">
      <div class="logo">
     <a   href="{{route('home')}}"><h1 class="title">Teelab</h1></a>
    </div>
     <nav>
        <ul class=" nav-list ">
         <a href="{{route('products.index')}}"><li class="nav-item"> NEW IN</li></a>
         <a href="{{route('products.index')}}"><li class="nav-item">OUR PRODUCTS</li></a>
         <li class="nav-item"> SALE</li>
        </ul>      
    </nav>
    </div>
     <div class="nav-ceter">
         <div class="search-bar">
          <span class="icon">🔍</span>
        <input type="text" placeholder="Search"> 
        </div>
    </div>
    <div class="nav-right">
    <nav>
        <ul class=" nav-list ">
          <li class="nav-item">
    <img class="header-icon" src="{{ Vite::asset('resources/images/qr.png') }}" alt="">
    </li>
    <li class="nav-item">
   @auth
        <a href="{{ route('my-info') }}">
            <img class="header-icon" src="{{ Vite::asset('resources/images/account.png') }}" alt="My account">
        </a>
    @else
        <a href="{{ route('login') }}">
            <img class="header-icon" src="{{ Vite::asset('resources/images/account.png') }}" alt="Login">
        </a>
    @endauth
  </li>
  <li class="nav-item">
    
   <img class="header-icon" src="{{ Vite::asset('resources/images/wishlist.png') }}" alt="">
</li>
<li class="nav-item">  
    <div class="img-cart" id="cart-toggle">
       <div class="cart-count">
        <span class="cart-num">  {{ collect(session('cart', []))->sum('quantity') }}</span>
  </div>
    <img class="header-icon" src="{{ Vite::asset('resources/images/cart.png') }}" alt="">
    </div>    
</li>
        </ul>      
    </nav>
    </div>
    {{-- MInicart --}}
    <!-- MINI CART -->
        <div id="mini-cart" class="mini-cart hidden">
            <div class="mini-cart-header">
        <h4>Giỏ hàng</h4>
         <button id="close-cart" class="close-cart" >✖</button>
         </div>
        <div class="mini-cart-items"></div>
        <div class="mini-cart-total">
        <div class="total-price d-flex justify-content-between">
        <span>Tổng:</span>
        <span class="total-price-value"></span>
        
        </div>
        </div>
        <a href="/checkout" class="btn-checkout">Thanh toán</a>
    </div>
    </div>
    </div>  
    </div>
</div>
</header>
