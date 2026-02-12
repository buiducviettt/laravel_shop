@extends('layouts.frontend')
@section('title', 'Trending')
@section('content')
<div class="sec-gap trending-page">
    <div class="container">
    <section class=" sec-gap list-collections">
        <div class="title-wrapper">
        <h1 class="sec-title">OUR TRENDING</h1>
        </div>
        <div class="collection-items">
    @foreach($categories as $item)
    <div class="trend-card">
        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">
        <span>{{ $item->name }}</span>
    </div>
@endforeach
        </div>
    </section>
  <section class="gallery-masonry">
    @foreach($trendings as $item)
        <div class="gallery-card is-{{ $item->type }}">
           <img src="{{ asset('storage/' . $item->image )}}" alt="{{ $item->name }}">
        </div>
    @endforeach
</section>
</div>
</div>
@endsection