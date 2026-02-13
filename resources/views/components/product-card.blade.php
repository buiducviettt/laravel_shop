<div class="product-card" data-variants='@json($product->variants)'>
 
    {{-- LINK chỉ cho image + tên + giá --}}
    <a href="{{ route('products.show', $product) }}" class="product-link">
        <div class="img-prod">
            <img src="{{ $product->mainImage
                ? Storage::url($product->mainImage->image_url)
                : asset('images/no-image.png') }}"
                alt="{{ $product->name }}">
        </div>

        <h4 class="prod-name">{{ $product->name }}</h4>
        <p class="price">
            {{ number_format($product->base_price) }} ₫
        </p>
    </a>

    {{-- ATTRIBUTE nằm ngoài link --}}
    <div class="product-attribute d-flex flex-column gap-2">
        {{-- COLOR --}}
        <div class="color attr">
            <div class="color-img-list">
                @foreach($product->variants->unique('color_id') as $variant)
                    <div 
                        class="color-img"
                        data-color-id="{{ $variant->color_id }}"
                        style="background: {{ $variant->color->code }}">
                    </div>
                @endforeach
            </div>
        </div>

        {{-- SIZE --}}
        <div class="size attr">
            <div class="size-list">
                @foreach($product->variants->unique('size_id') as $variant)
                    <button
                        type="button"
                        data-size-id="{{ $variant->size_id }}"
                        class="size-icon">
                        {{ $variant->size->name }}
                    </button>
                @endforeach
            </div>
        </div>
      

    </div>

    {{-- CTA --}}
    <div class="product-cta">
        <button 
            type="button"
            class="btn btn-primary btn-buy-now"
            data-id="{{ $product->id }}">
            Mua ngay
        </button>

        <button 
            type="button"
            class="btn btn-secondary btn-add-cart"
            data-id="{{ $product->id }}">
            Thêm vào giỏ
        </button>
    </div>

</div>
