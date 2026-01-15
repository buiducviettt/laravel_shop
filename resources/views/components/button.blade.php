@if(($type ?? '') === 'submit')
    <button type="submit" class="cta-btn btn">
        {{ $ctaText }}
    </button>
@else
    <a href="{{ $link ?? '#' }}" class="cta-btn btn">
        {{ $ctaText }}
    </a>
@endif
