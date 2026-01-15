<div class="hottest-card ">
  <div class="hottest-card__media {{ $class ?? '' }}">
    <div class="hottest-card__image">
      <img src="{{ $image }}" alt="{{ $alt ?? 'Shop item' }}">
    </div>
    <a href="{{ $link ?? '#' }}" class="shop-card__cta">
      {{ $ctaText ?? 'VISIT' }}
    </a>
  </div>
</div>
