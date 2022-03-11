<div class="wrap-icon-section minicart">
    <a href="/cart" class="link-direction">
        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        <div class="left-info">
            @if(Cart::instance('cart')->count() > 0)
            <span class="index">{{Cart::instance('cart')->count()}} Items</span>
            @else
            <span class="index">0 item</span>
            @endif
            <span class="title">Cart</span>
        </div>
    </a>
</div>