<main id="main">
    <div class="container">
       
    <!--MAIN SLIDE-->
    <div class="wrap-main-slide">
        <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
            @foreach( $ads as $advertisement)
            <div class="item-slide">
                <img src="{{ asset('assets/images/sliders')}}/{{ $advertisement->image }}" alt="" class="img-slide">
                <div class="slide-info slide-3">
                    <h2 class="f-title">{{ $advertisement->jasa->name }} <b>{{ $advertisement->name }}</b></h2>
                    <p class="sale-info">Mulai dari harga: <b class="price">@currency($advertisement->jasa->price)</b> <a href="{{ $advertisement->link }}" class="btn-link">Pesan Sekarang</a></p>
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
   
       
       
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">Jasa Terbaru</h3>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                @foreach ($ljasas as $ljasa)
                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{ route('jasa.details',['slug'=>$ljasa->slug]) }}" title="{{ $ljasa->name }}">
                            <figure><img src="{{ asset('assets/images/products/')}}/{{ $ljasa->image }}" width="800" height="800" alt="{{ $ljasa->name }}"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item sale-label">{{ $ljasa->category->name }}</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="{{ route('jasa.details',['slug'=>$ljasa->slug]) }}" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="{{ route('jasa.details',['slug'=>$ljasa->slug]) }}" class="product-name"><span>{{ $ljasa->name }}</span></a>
                        <div class="wrap-price"><span class="product-price">@currency($ljasa->price)</span></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!--Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Kategori Jasa</h3>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        @foreach($categories as $key=>$category)
                            <a href="#category_{{ $category->id }}" class="tab-control-item {{ $key==0 ? 'active':''}}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                    <div class="tab-contents">
                        @foreach($categories as $key=>$category)
                        <div class="tab-content-item {{ $key==0 ? 'active':''}}" id="category_{{ $category->id }}">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                @php
                                    $c_jasas=DB::table('jasas')->where('category_id',$category->id)->get()->take($no_of_jasa);
                                @endphp
                                @foreach($c_jasas as $c_jasa)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{ route('jasa.details',['slug'=>$c_jasa->slug ]) }}" title="{{ $c_jasa->name }}">
                                                <figure><img src="{{ asset('/assets/images/products') }}/{{ $c_jasa->image }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                            </a>
                                            <div class="wrap-btn">
                                                <a href="{{ route('jasa.details',['slug'=>$c_jasa->slug ]) }}" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('jasa.details',['slug'=>$c_jasa->slug ]) }}" class="product-name"><span>{{ $c_jasa->name }}</span></a>
                                            <div class="wrap-price"><span class="product-price">@currency($c_jasa->price)</span></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach   
                    </div>
                </div>
            </div>
        </div>			
    </div>
</main>

