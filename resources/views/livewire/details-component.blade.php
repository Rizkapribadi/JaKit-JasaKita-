<main id="main" class="main-site">
    <style>
        .rprice{
            font-weight: 300;
            font-size: 13px !important;
            color:#aaaaaa !important;
            text-decoration: line-through;
            padding-left: 10px;
        }
    </style>
    
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery" wire:ignore>
                          <ul class="slides">
                            <li data-thumb="{{ asset('assets/images/products')}}/{{ $jasa->image }}">
                                <img src="{{ asset('assets/images/products') }}/{{ $jasa->image }}" width="500" alt="{{ $jasa->name }}" />
                            </li>
                            @php
                                $images = explode(",",$jasa->images);
                            @endphp
                            @foreach($images as $image)
                                @if($image)
                                    <li data-thumb="{{ asset('assets/images/products')}}/{{ $image }}">
                                        <img src="{{ asset('assets/images/products') }}/{{ $image }}" width="500" alt="{{ $jasa->name }}" />
                                    </li>
                                @endif
                            @endforeach
                          </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        <div class="product-rating">
                            <style>
                                .color-gray{
                                    color:#e6e6e6 !important;
                                }
                            </style>
                            @php
                                $avgrating = 0;
                            @endphp
                            @foreach ($jasa->orderItems->where('rstatus',1) as $orderItem)
                                @php
                                    $avgrating = $avgrating + $orderItem->review->rating;
                                @endphp
                            @endforeach
                            @for ($i = 1; $i <= 5; $i++)
                                @if($i<=$avgrating)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-star color-gray" aria-hidden="true"></i>
                                @endif
                                
                            @endfor
                            <a href="#" class="count-review">({{ $jasa->orderItems->where('rstatus',1)->count() }} review)</a>
                        </div>
                        <h2 class="product-name">{{ $jasa->name }}</h2>
                        <div class="short-desc">
                            {{ Str::limit($jasa->description,100) }}
                        </div>
                        <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="{{ asset('assets/images/social-list.png') }}" alt=""></a>
                        </div>
                        @if($jasa->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                        <div class="wrap-price">
                            <span class="product-price">@currency($jasa->sale_price)</span>
                            <del><span class="product-price rprice">@currency($jasa->price) {{ $jasa->unit }}</span></del>
                        </div>
                        @else
                        <div class="wrap-price"><span class="product-price">@currency($jasa->price) {{ $jasa->unit }}</span></div>
                        @endif
                        <div class="stock-info in-stock">
                            <p class="availability">Availability: <b>{{ $jasa->status }}</b></p>
                        </div>
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >  
                                <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity"></a>
                                <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity"></a>
                            </div>
                        </div> 
                        <div class="wrap-butons">
                            @if($jasa->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())      
                            <a href="#" class="btn add-to-cart" wire:click.prevent="store({{ $jasa->id }},'{{ $jasa->name }}','{{ $jasa->sale_price }}','{{ $jasa->user_id }}')">Add To Cart</a>
                            @else
                            <a href="#" class="btn add-to-cart" wire:click.prevent="store({{ $jasa->id }},'{{ $jasa->name }}','{{ $jasa->price }}','{{ $jasa->user_id }}')">Add To Cart</a>
                            @endif
                            
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">description</a>
                            <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
                            <a href="#review" class="tab-control-item">Reviews</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                {{ $jasa->description }}
                            </div>
                            <div class="tab-content-item " id="add_infomation">
                                <table class="shop_attributes">
                                    <tbody>
                                        <tr>
                                            <th>Nama</th><td class="product_weight">{{ $jasa->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Jasa</th><td class="product_weight">{{ $jasa->subcategory->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pemilik</th><td class="product_weight">{{ $jasa->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th><td class="product_weight">{{ $jasa->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Provinsi</th><td class="product_weight">{{ $jasa->province->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kabupaten</th><td class="product_weight">{{ $jasa->regency->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Lokasi</th><td class="product_weight"><a href="{{ $jasa->location_link }}" target="_blank" rel="noopener noreferrer">
                                                {{ $jasa->location_link}}</a></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-content-item " id="review">
                                
                                <div class="wrap-review-form">
                                    <style>
                                        .width-0-percent{
                                            width:0%;
                                        }
                                        .width-20-percent{
                                            width:20%;
                                        }
                                        .width-40-percent{
                                            width:40%;
                                        }
                                        .width-60-percent{
                                            width:60%;
                                        }
                                        .width-80-percent{
                                            width:80%;
                                        }
                                        .width-100-percent{
                                            width:100%;
                                        }
                                    </style>
                                    
                                    <div id="comments">
                                        <h2 class="woocommerce-Reviews-title">{{ $jasa->orderItems->where('rstatus',1)->count() }} review for <span>{{ $jasa->name }}</span></h2>
                                        <ol class="commentlist">
                                            @foreach ($jasa->orderItems->where('rstatus',1) as $orderItem)
                                            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                <div id="comment-20" class="comment_container"> 
                                                    @if($orderItem->order->user->profile_photo_path==NULL)
                                                    <img alt="" src="{{ asset ('assets/images/avatars/images.PNG')}}" height="80" width="80">
                                                    @else
                                                    <img alt="" src="{{ asset ('assets/images/avatars')}}/{{ $orderItem->order->user->profile_photo_path }}" height="80" width="80">
                                                    @endif
                                                    <div class="comment-text">
                                                        <div class="star-rating">
                                                            <span class="width-{{ $orderItem->review->rating *20 }}-percent">Rated <strong class="rating">{{ $orderItem->review->rating }}</strong> out of 5</span>
                                                        </div>
                                                        <p class="meta"> 
                                                            <strong class="woocommerce-review__author">{{ $orderItem->order->user->name }}</strong> 
                                                            <span class="woocommerce-review__dash">–</span>
                                                            <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{ Carbon\Carbon::parse($orderItem->review->created_at)->format('d F Y g:i A') }}</time>
                                                        </p>
                                                        <div class="description">
                                                            <p>{{ $orderItem->review->comment }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ol>
                                    </div><!-- #comments -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end main products area-->


            <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="wrap-show-advance-info-box style-1 box-in-site">
                    <h3 class="title-box">rekomendasi</h3>
                    <div class="wrap-products"  wire:ignore>
                        <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
                            
                            @foreach ($related_jasas as $r_jasa) 
                            <div class="product product-style-2 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{ route('jasa.details',['slug'=>$r_jasa->slug]) }}" title="{{ $r_jasa->name }}">
                                        <figure><img src="{{ asset('assets/images/products') }}/{{ $r_jasa->image }}" width="214" height="214" alt="{{ $r_jasa->name }}"></figure>
                                    </a>
                                    <div class="group-flash">
                                        <span class="flash-item new-label">new</span>
                                    </div>
                                    <div class="wrap-btn">
                                        <a href="{{ route('jasa.details',['slug'=>$r_jasa->slug]) }}" class="function-link">quick view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('jasa.details',['slug'=>$r_jasa->slug]) }}" class="product-name"><span>{{ $r_jasa->name }}</span></a>
                                    <div class="wrap-price"><span class="product-price">@currency( $r_jasa->price )</span></div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div><!--End wrap-products-->
                </div>
            </div>

        </div><!--end row-->

    </div><!--end container-->

</main>