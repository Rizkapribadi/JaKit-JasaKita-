<main id="main">
    <div class="container">
    @if($sjasas->count() > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now()) 
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">On Sale</h3>
            <div class="wrap-countdown mercado-countdown" data-expire="{{ Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:m:s') }}"></div>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                @foreach($sjasas as $sjasa)
                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{ route('jasa.details',['slug'=>$sjasa->slug]) }}" title="{{ $sjasa->name }}">
                            <figure><img src="{{ asset('assets/images/products/')}}/{{ $sjasa->image }}" width="800" height="800" alt="{{ $sjasa->name }}"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item sale-label">{{ $sjasa->category->name }}</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="{{ route('jasa.details',['slug'=>$sjasa->slug]) }}" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>{{ $sjasa->name }}</span></a>
                        <div class="wrap-price"><ins><p class="product-price">@currency($sjasa->sale_price) </p></ins> <del><p class="product-price">@currency($sjasa->price)</p></del></div>
                    </div>
                </div>
                @endforeach  
            </div>
        </div>
        @else
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">Nantikan On Sale!</h3>
            <div class="wrap-countdown mercado-countdown"></div>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                @foreach($sjasas as $sjasa)
                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{ route('jasa.details',['slug'=>$sjasa->slug]) }}" title="{{ $sjasa->name }}">
                            <figure><img src="{{ asset('assets/images/products/')}}/{{ $sjasa->image }}" width="800" height="800" alt="{{ $sjasa->name }}"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item sale-label">soon!</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="{{ route('jasa.details',['slug'=>$sjasa->slug]) }}" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>{{ $sjasa->name }}</span></a>
                        <div class="wrap-price"><ins><p class="product-price">Rp ? </p></ins> <del><p class="product-price">@currency($sjasa->price)</p></del></div>
                    </div>
                </div>
                @endforeach  
            </div>
        </div>
    @endif
    </div>
</main>
