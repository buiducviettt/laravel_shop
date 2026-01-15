@extends('layouts.frontend')
@section('title', 'Trang chủ')
@section('content')
<div class="homepage">
   <div class="banner">
  <div class="banner-bg">
      <img src="{{ Vite::asset('resources/images/banner.png') }}" alt="Banner">
    </div>
   <div class="content-banner">
    <h1 class="banner-title">ARTIQUE</h1>
    <div class="decor-pop star-decor star-1">
        <img src="{{Vite::asset('resources/images/star.png')}}" alt="">
    </div>
      <div class="decor-pop star-decor star-2">
        <img src="{{Vite::asset('resources/images/star.png')}}" alt="">
    </div>
    <div class="sub-title">
    <span>Browse</span>
    <span>Pin</span>
    <span>Shop</span>
    </div>
   </div>
   </div>
   <section class=" sec-gap trending-sec">
    <div class="container">
      <div class="title-wrapper">
    <h1 class="sec-title trending-title">Trending</h1>
    </div>
    <div class="trending-grid">
      <div class="trend-card tall">
        <img src="{{Vite::asset('resources/images/trend1.png')}}" alt="">
        <span >COTTAGECORE</span>
      </div>
      <div class="trend-card">
     <img src="{{Vite::asset('resources/images/trend1.png')}}" alt="">
      <span>Y2K</span>
    </div>
    <div class="trend-card">
       <img src="{{Vite::asset('resources/images/trend1.png')}}" alt="">
      <span>VINTAGE</span>
    </div>

    <div class="trend-card">
       <img src="{{Vite::asset('resources/images/trend1.png')}}" alt="">
      <span>STREETWARE</span>
    </div>

    <div class="trend-card tall">
       <img src="{{Vite::asset('resources/images/trend1.png')}}" alt="">
      <span>MINIMALISTIC</span>
    </div>

     <div class="trend-card">
     <img src="{{Vite::asset('resources/images/trend1.png')}}" alt="">
      <span>Y2K</span>
    </div>
    <div class="trend-card">
        <img src="{{Vite::asset('resources/images/trend1.png')}}" alt="">
      <span>BOHO</span>
    </div>
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
           <div class="swiper-slide"> 
     <x-shop-item
        image="{{ Vite::asset('resources/images/shopcate1.png') }}"
        cta-text="VISIT"
        alt="Shop item"
        link="/shop"
    />
</div>
<div class="swiper-slide"> 
     <x-shop-item
        image="{{ Vite::asset('resources/images/shopcate1.png') }}"
        cta-text="VISIT"
        alt="Shop item"
        link="/shop"
    />
</div>
<div class="swiper-slide"> 
     <x-shop-item
        image="{{ Vite::asset('resources/images/shopcate1.png') }}"
        cta-text="VISIT"
        alt="Shop item"
        link="/shop"
    />
</div>
<div class="swiper-slide"> 
     <x-shop-item
        image="{{ Vite::asset('resources/images/shopcate1.png') }}"
        cta-text="VISIT"
        alt="Shop item"
        link="/shop"
    />
</div>
<div class="swiper-slide"> 
     <x-shop-item
        image="{{ Vite::asset('resources/images/shopcate1.png') }}"
        cta-text="VISIT"
        alt="Shop item"
        link="/shop"
    />
</div>
<div class="swiper-slide"> 
     <x-shop-item
        image="{{ Vite::asset('resources/images/shopcate1.png') }}"
        cta-text="VISIT"
        alt="Shop item"
        link="/shop"
    />
</div>
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
        <div class="col-12 col-md-3">
          <x-moodboard-item
            image="{{ Vite::asset('resources/images/moodboard1.png') }}"
            alt="Moodboard item"
            title="BEACHY"
          />
        </div>
         <div class="col-12 col-md-3">
          <x-moodboard-item
            image="{{ Vite::asset('resources/images/moodboard1.png') }}"
            alt="Moodboard item"
            title="ACADEMIA"
          />
        </div>
      </div>
    </div>
    </div>
   </section>
  <section class="sec-gap collection-sec">
    <div class="title-wrapper">
    <h1 class="sec-title collection-title">Collection</h1>
    </div>
    <div class="collection-items">
      <div class="container">
      <div class="row gy-5">
        <div class="col col-12 col-md-4">
          <button class=collection-btn><span>DRESSES</span></button>
        </div>
         <div class="col col-12 col-md-4">
          <button class=collection-btn><span>DRESSES</span></button>
        </div>
           <div class="col col-12 col-md-4">
          <button class=collection-btn><span>DRESSES</span></button>
        </div>
         <div class="col col-12 col-md-4">
          <button class=collection-btn><span>DRESSES</span></button>
        </div>
      </div>
      </div>
    </div>
  </section>
  <section class="curated-pins-sec">
    <div class="container">
    <div class="title-wrapper">
    <h1 class="sec-title curated-pins-title">Curated Pins</h1>
    </div>
   <div class="curated-pin-grid">
  <!-- big ngang -->
  <div class="curated-pin-card large">
    <img src="{{ Vite::asset('resources/images/pin1.png') }}" alt="">
  </div>

  <!-- cao -->
  <div class="curated-pin-card tall featured ">
    <img src="{{ Vite::asset('resources/images/trend1.png') }}" alt="">
  </div>
<!-- Bình thường -->
  <div class="curated-pin-card normal featured ">
    <img src="{{ Vite::asset('resources/images/trend1.png') }}" alt="">
  </div>
  <!-- row2 -->
   <div class="curated-pin-card tall secondary ">
    <img src="{{ Vite::asset('resources/images/trend1.png') }}" alt="">
  </div>
  <div class="curated-pin-card normal secondary ">
    <img src="{{ Vite::asset('resources/images/trend1.png') }}" alt="">
  </div>
  <div class="curated-pin-card normal secondary ">
    <img src="{{ Vite::asset('resources/images/trend1.png') }}" alt="">
  </div>
  <div class="curated-pin-card normal secondary ">
    <img src="{{ Vite::asset('resources/images/trend1.png') }}" alt="">
  </div>
   <div class="curated-pin-card normal secondary ">
    <img src="{{ Vite::asset('resources/images/curated1.png') }}" alt="">
  </div>
  <div class="curated-pin-card normal secondary ">
    <img src="{{ Vite::asset('resources/images/curated1.png') }}" alt="">
  </div>
  <div class="curated-pin-card large fourth  ">
    <img src="{{ Vite::asset('resources/images/curated1.png') }}" alt="">
  </div>  
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
        <div class="col-12 col-md-3">
          <x-hottest-card
            image="{{ Vite::asset('resources/images/curated1.png') }}"
            alt="Hottest buy item"
            link="#"
            ctaText="VISIT"
          />
        </div>
         <div class="col-12 col-md-3">
          <x-hottest-card
            image="{{ Vite::asset('resources/images/curated1.png') }}"
            alt="Hottest buy item"
            link="#"
            class="is-reverse"
            ctaText="VISIT"
          />
        </div>
         <div class="col-12 col-md-3">
          <x-hottest-card
            image="{{ Vite::asset('resources/images/curated1.png') }}"
            alt="Hottest buy item"
            link="#"
           
            ctaText="VISIT"
          />
        </div>
         <div class="col-12 col-md-3">
          <x-hottest-card
            image="{{ Vite::asset('resources/images/curated1.png') }}"
            alt="Hottest buy item"
            link="#"
            class="is-reverse"
            ctaText="VISIT"
          />
        </div>
      </div>
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
                <img src="{{ Vite::asset('resources/images/trend1.png') }}" alt="">
              </div>
            </div>
             <div class="col col-md-6">
              <div class="text-content">     
                <p class="about-text">
                  Inspo.com is a fashion haven for those who seek to bring their Pinterest boards to life. Our platform seamlessly connects your style inspirations with real-world fashion, allowing you to effortlessly discover and shop for the exact clothing items you love. Whether you're looking for that perfect outfit you pinned months ago or seeking new, trendy pieces, Inspo.com is your go-to destination. Join us and explore a world where your fashion dreams become a reality.</p>
            </div>
            <div class="cta">
              <a href="#" class="shop-card__cta">Shop Now</a>
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
