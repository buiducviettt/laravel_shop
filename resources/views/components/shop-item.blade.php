<div class="shop-card">
  <div class="shop-card__media">
    <div class="shop-card__image">
      <img src="{{ $image }}" alt="{{ $alt ?? 'Shop item' }}">
    </div>

    <a href="{{ $link ?? '#' }}" class="shop-card__cta">
      {{ $ctaText ?? 'VISIT' }}
    </a>
  </div>
</div>
