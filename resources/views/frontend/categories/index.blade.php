{{-- Danh mục sản phẩm  --}}
@extends('layouts.frontend')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <div class="sec-gap">
        <div class="container">
            <div class="title-wrapper">
                <h1 class="sec-title">{{ $category->name }}</h1>
            </div>
            <div class="grid">  
                <div class="row">                  
                @foreach ($products as $product)
                <div class="col-12 col-md-3 gy-5">
                    <x-product-card :product="$product" />
                    </div>
                @endforeach   
            </div>
            </div>
            {{ $products->links() }}
        </div>
    </div>
@endsection