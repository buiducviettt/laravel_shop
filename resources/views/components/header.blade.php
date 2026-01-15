<header class="header">
  <div class="container">
  <div class="wrapper">
    <div class="nav-left">
      <div class="logo">
     <a   href="{{route('home')}}"><h1 class="title">DViet Clothes</h1></a>
    </div>
     <nav>
        <ul class=" nav-list ">
         <li class="nav-item"> NEW IN</li>
         <li class="nav-item">GET THE LOOK</li>
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
    <img class="header-icon" src="{{ Vite::asset('resources/images/cart.png') }}" alt="">
</li>
        </ul>      
    </nav>
    </div>
    </div>  
    </div>
</div>
</header>
