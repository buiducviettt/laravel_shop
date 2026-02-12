@extends('layouts.frontend')
@section('title', 'Tất cả sản phẩm')
@section('content')
<div class="product-page">
<div class="container sec-gap">
    <div class="title-wrapper">
<h1 class="sec-title" >OUR PRODUCTS</h1>
</div>
<div class="slug">
    <a href="{{ route('home') }}">Home</a>
    <span>/</span>
    <span>Products</span>
</div>
<div class="grid-prod prod-list">
    <div class="row">
    @foreach ($products as $product)
    <div class="col-12 col-md-3 gy-5">
        <x-product-card :product="$product" />
        </div>
    @endforeach
    </div>
</div>
</div>
</div>
{{ $products->links() }}
@endsection