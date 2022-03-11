<div class="wrap-icon-section minicart">
    <a href="{{ route('jasa.favoritelist') }}" class="link-direction">
        <i class="fa fa-heart" aria-hidden="true"></i>
        <div class="left-info">
            @if(Cart::instance('wishlist')->count() > 0)
            <span class="index">{{ Cart::instance('wishlist')->count() }} item</span>
            @else
            <span class="index">0 item</span>
            @endif
            <span class="title">Favorite</span>
        </div>
    </a>
</div>