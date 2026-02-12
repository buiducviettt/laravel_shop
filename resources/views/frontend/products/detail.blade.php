{{-- Chi tiết sản phẩm --}}
@extends('layouts.frontend')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<div class="product-detail-page">
    <div class="sec-gap">
        <div class="container">
            {{-- Slug động --}}
         <div class="slug">
    <a href="{{ route('home') }}">Home</a>
    <span>/</span>

    <a href="{{ route('products.index') }}">Products</a>
    <span>/</span>
    <a href="{{ route('categories.show', $product->category->slug) }}">
        {{ $product->category->name }}
    </a>
    <span>/</span>
    <span>{{ $product->name }}</span>
</div>
            <div class="product-content sec-gap">
          <div class="product-layout">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="product-gallery">
                            <div class="product-img">
                                <img src="{{ $product->mainImage
                                    ? Storage::url($product->mainImage->image_url)
                                    : asset('images/no-image.png') }}"
                                    alt="{{ $product->name }}">
                            </div>
                        </div>
                    </div>
                     <div class="col-12 col-md-6">
                        <div class="product-info">
                            <h2 class="name">{{$product -> name}}</h2>
                            <div class="product-desc">
                                <p>{{ $product->description }}</p>
                            </div>
                            <p class="price">{{ number_format($product->base_price) }} ₫</p>
                            {{-- attribute --}}
                            <div class="product-attribute">
                                <div class="color attr">
                                    <div class="title-atr">COLOURS</div>
                                    <div class="color-img-list">
                                    @foreach($product->variants->unique('color_id') as $variant)
                                    <div class="color-img" data-color-id= "{{ $variant->color_id }}" style="background: {{ $variant->color->code }} "></div>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="size attr">
                                    <div class="title-atr">SIZE</div>
                                    <div class="size-list">
                                    @foreach($product->variants->unique('size_id') as $variant)
                                    <button  data-size-id= "{{ $variant->size_id }}" class="size-icon">{{ $variant->size->name }}</button>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="product-cta">
                                <button class="btn btn-primary btn-buy-now" data-id="{{ $product->id }}">Mua ngay</button>
                                <button class="btn btn-secondary btn-add-cart" data-id="{{ $product->id }}">Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                     </div>
                </div>
          </div>
          </div>
        </div>
    </div>
    </div>

@endsection
    <script>
    window.productVariants = @json($product->variants);

</script>

