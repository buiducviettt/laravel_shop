@extends('layouts.frontend')
@section('title', 'Trang chủ')
@section('content')
<div class="homepage">
   <div class="banner">
  <div class="banner-bg">
     <img src="{{ asset('storage/' . data_get($page->content, 'hero.image')) }}" alt="">
    </div>
   <div class="content-banner">
    <h1 class="banner-title">
    {{ data_get($page->content, 'hero.title', '') }}
    </h1>
    <div class="decor-pop star-decor star-1">
        <img src="{{Vite::asset('resources/images/star.png')}}" alt="">
    </div>
      <div class="decor-pop star-decor star-2">
        <img src="{{Vite::asset('resources/images/star.png')}}" alt="">
    </div>
    <div class="sub-title">
  @foreach (data_get($page->content,'hero.subtitle',[]) as $subtitle)
 <span>{{ $subtitle['text'] ?? '' }}</span>    
  @endforeach
    </div>
   </div>
   </div>
   <section class=" sec-gap trending-sec">
    <div class="container">
      <div class="title-wrapper">
    <h1 class="sec-title trending-title">Trending</h1>
    </div>
    <div class="trending-grid">
      {{-- trending-grid --}}
  @foreach ($trendingIds as $index => $id)
    @php
      $collection = $collections[$id] ?? null;
      if (!$collection) continue;
      $cardClass = $layoutMap[$index] ?? 'trend-card';
    @endphp
    <div class="{{ $cardClass }}">
      <div class="overlay"></div>
      <img
        src="{{ asset('storage/' . $collection->image) }}"
        alt="{{ $collection->name }}"
      >
      <span>{{ strtoupper($collection->name) }}</span>
    </div>
  @endforeach
</div> 
    </div>

   </section>
   <!-- Danh mục sản phẩm -->
   <section class="sec-gap shop-cate">
    <div class="container">
    <div class="title-wrapper">
    <h1 class="sec-title shop-cate-title">Shop The Inspo</h1>
    </div>
    <div class="shop-items">
      <div class="swiper shop-cate-swiper">
        <div class="swiper-wrapper"> 
      @foreach( $categories as $item)
<div class="swiper-slide"> 
     <x-shop-item
        image="{{ asset('storage/' . $item->image) }}"
        cta-text="VISIT"
        alt="Shop item"
        link="{{ route('categories.show', $item->slug) }}"
    />
</div>
      @endforeach
    </div> 
    </div>  
    <button class="slider-btn shop-cate-slider prev">◀</button>
      <button class="slider-btn shop-cate-slider next">▶</button>
    </div>
    </div>
   </section>
   <section class=" sec-gap mood-board-sec">
    <div class="container"> 
      <div class="title-wrapper">
    <h1 class="sec-title moodboard-title">MoodBoard</h1>
    </div>
    <div class="moodboard-items">
      <div class="row">
      @foreach(data_get($page->content, 'moodboard', []) as $item)
    <div class="col-12 col-md-3">
        <x-moodboard-item
            image="{{ asset('storage/' . $item['image']) }}"
            title="{{ $item['title'] }}"
        />
    </div>
@endforeach
      </div>
    </div>
    </div>
   </section>
  <section class="sec-gap collection-sec">
    <div class="title-wrapper">
    <h1 class="sec-title collection-title">Collections</h1>
    </div>
    <div class="collection-items">
      <div class="container">
      <div class="row gy-5">
        @foreach($collections as $item)
        <div class="col col-12 col-md-4">
          <button class=collection-btn><span>{{$item->name}}</span></button>
        </div>  
        @endforeach  
       
      </div>
      </div>
    </div>
  </section>
  <section class="curated-pins-sec">
    <div class="container">
    <div class="title-wrapper">
    <h1 class="sec-title curated-pins-title">Curated Pins</h1>
    </div>
    <div class="test">
    </div>
    {{-- tạo cái layout cứng cơ bản --}}
@php
$pinLayoutMap = [
    0 => 'large',              // Pin lớn bên trái
    1 => 'tall featured',      // Cao – cột 3
    2 => 'normal featured',    // Nhỏ – cột 4
    3 => 'tall secondary',     // Cao – cột 4
    4 => 'normal secondary',
    5 => 'normal secondary',
    6 => 'normal secondary',       // Large hàng dưới
    7 => 'large fourth',
    8 => 'tall fourth',
    9 => 'tall fourth',
   
];


@endphp
   <div class="curated-pin-grid">
@foreach($curatedPinIds as $index => $pinId)
    @php
        $pin = $curatedPins[$pinId] ?? null;
        $class = 'curated-pin-card ' . ($pinLayoutMap[$index] ?? 'normal');
    @endphp
    @if($pin)
        <div class="{{ $class }}">
            <img src="{{ asset('storage/' . $pin->image) }}" alt="">
        </div>
    @endif
@endforeach

</div>
    </div>
  </section>
  <section class="sec-gap hottest-buy-sec">
    <div class="container">
      <div class="title-wrapper">
    <h1 class="sec-title hottest-buy-title">Hottest Buy</h1>
    </div>
    <div class="hottest-collection">
      <div class="row">
      @foreach($categories as $index => $item)
    <div class="col-12 col-md-3 gy-5">
       <x-hottest-card
            image="{{ asset('storage/' . $item->image) }}"
            alt="{{ $item->title }}"
            link="{{ route('categories.show', $item->slug) }}"
            class="{{ $loop->even ? 'is-reverse' : '' }}"
            ctaText="VISIT"
        />
    </div>
@endforeach
    </div>
    </div>
  </section>
 <section class="sec-gap about-short">
  <div class="container">
  <div class="title-wrapper">
    <h1 class="sec-title about-short-title">About Us</h1>
  </div>
  <div class="about-bg">
  <div class="about-content">
    <div class="wrapper">
      <div class="content-inner">
        <div class="wrapper">
          <div class="row">
            <div class="col col-md-6">
           <div class="image">
    <img src="{{ asset('storage/' . data_get($page->content, 'about_us.image')) }}" alt="">
</div>
            </div>
             <div class="col col-md-6">
              <div class="text-content">     
                <p class="about-text">
                  {{ data_get($page->content, 'about_us.description') }}
                </p>
              </div>
            </div>
            <div class="cta">
              <a href="{{route('products.index')}}" class="shop-card__cta">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
      </div>
  </div>
 </section>
   </div>
@endsection
