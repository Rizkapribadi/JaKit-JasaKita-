<main id="main" class="main-site left-sidebar">
		<div class="container">
			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Semua Jasa</span></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
					<div class="wrap-shop-control">
						<h1 class="shop-title">Semua Jasa</h1>
						<div class="wrap-right">
							
							<div class="sort-item product-per-page">
								<select name="post-per-page" class="use-chosen" wire:model="pagesize" >
									<option value="12" selected="selected">12 per page</option>
									<option value="16">16 per page</option>
									<option value="18">18 per page</option>
									<option value="21">21 per page</option>
									<option value="24">24 per page</option>
									<option value="30">30 per page</option>
									<option value="32">32 per page</option>
								</select>
							</div>
						</div>
					</div><!--end wrap control-->

					<style>
						.product-wish{
							position: absolute;
							top: 10%;
							left: 0;
							z-index: 99;
							right: 30px;
							text-align: right;
							padding-top: 0;
						}
						.product-wish .fa{
							color: #cbcbcb;
							font-size: 32px;
						}
						.product-wish .fa:hover{
							color: #ff2832;
						}
						.fill-heart{
							color: #ff2832 !important;
						}
					</style>
					
					<div class="row">
					<ul class="product-list grid-products equal-container">
						@php
							$fitems = Cart::instance('wishlist')->content()->pluck('id') ;
						@endphp
							@foreach ($jasas as $jasa)
																	
							<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
								<div class="product product-style-3 equal-elem ">
									<div class="product-thumnail">
										<a href="{{ route('jasa.details',['slug'=>$jasa->slug]) }}" title="{{ $jasa->name }}">
											<figure><img src="{{ asset('assets/images/products/')}}/{{ $jasa->image }}" width="800" height="800" alt="{{ $jasa->name }}" ></figure>
										</a>
									</div>
									<div class="product-rating">
										<style>
											.color-gray{
												color:#e6e6e6 !important;
											}
											.color-yellow{
												color:#ffbf00 !important;
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
												<i class="fa fa-star color-yellow" aria-hidden="true"></i>
											@else
												<i class="fa fa-star color-gray" aria-hidden="true"></i>
											@endif
											
										@endfor
										<i class="count-review">({{ $jasa->orderItems->where('rstatus',1)->count() }} review)</i>
									</div>			
									<div class="product-info">
										
										<a href="{{ route('jasa.details',['slug'=>$jasa->slug]) }}" class="product-name"><span>{{ $jasa->name }}</span></a>
										<div class="wrap-price"><span class="product-price">{{ $jasa->subcategory->name }}</span></div>
										<div class="wrap-price"><span class="product-price">{{ $jasa->province->name }}</span></div>
										@if($jasa->unit != NULL)
										<div class="wrap-price"><span class="product-price">@currency($jasa->price) / {{ $jasa->unit }}</span></div>
										@else
										<div class="wrap-price"><span class="product-price">@currency($jasa->price)</span></div>
										@endif
										<a href="{{ route('jasa.details',['slug'=>$jasa->slug]) }}" class="btn add-to-cart">Detail</a>
										<div class="product-wish">
											@if($fitems->contains($jasa->id))
											<a href="#" wire:click.prevent="removeFromFavorite({{ $jasa->id }})"><i class="fa fa-heart fill-heart"></i></a>
											@else
											<a href="#" wire:click.prevent="addToFavorite({{ $jasa->id }},'{{ $jasa->name }}','{{ $jasa->price }}')"><i class="fa fa-heart"></i></a>
											@endif	
										</div>
									</div>
								</div>
							</li>
								@endforeach	
						</ul>
					</div>
					 <div class="wrap-pagination-info">
					 {{$jasas->links()}} 
					</div>
				</div>
				<!--end main Jasa area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget mercado-widget categories-widget">
						<h2 class="widget-title">All Categories</h2>
						<div class="widget-content">
							<ul class="list-category">
								 @foreach($categories as $category)
								<li class="category-item">
									<a href="{{ route('jasa.category',['category_slug'=>$category->slug]) }}" class="cate-link">{{ $category->name }}</a>
								</li>
								@endforeach	 
							</ul>
						</div>
					</div><!-- Categories widget-->

					{{-- <div class="widget mercado-widget filter-widget price-filter">
						<h2 class="widget-title"> <span class="text-info">@currency($min_price) - @currency($max_price)</span></h2>
						<div class="widget-content" style="padding:10px 5px 40px 5px;">
							<div id="slider" wire:ignore></div>
						</div>
					</div><!-- Price--> --}}

					{{-- <div class="widget mercado-widget filter-widget brand-widget">
						<h2 class="widget-title">Provinsi</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list list-limited" data-show="6">
								<li class="list-item"><a class="filter-link active" href="#">Sumatera Utara </a></li>
								<li class="list-item"><a class="filter-link " href="#">Sumatera Barat</a></li>
								<li class="list-item"><a class="filter-link " href="#">Riau</a></li>
								<li class="list-item"><a class="filter-link " href="#">Jambi</a></li>
								<li class="list-item"><a class="filter-link " href="#">Bengkulu</a></li>
								<li class="list-item"><a class="filter-link " href="#">Aceh</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">DKI Jakarta</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">Jawa Tengah</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">Jawa Barat</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">Kalimantan Selatan</a></li>
								<li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div><!-- brand widget--> --}}

					<div class="widget mercado-widget widget-product">
						<h2 class="widget-title">Terpopuler</h2>
						<div class="widget-content"  wire:ignore>
							<ul class="products">
								@foreach($popular_jasas as $p_jasa)	
								<li class="product-item">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="{{ route('jasa.details',['slug'=>$p_jasa->slug]) }}" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
												<figure><img src="{{ asset('assets/images/products') }}/{{ $p_jasa->image }}" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="{{ route('jasa.details',['slug'=>$p_jasa->slug]) }}" class="product-name"><span>{{ $p_jasa->name }}</span></a>
											<div class="wrap-price"><span class="product-price">@currency($p_jasa->price)</span></div>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
					</div><!-- brand widget--> 
				</div><!--end sitebar-->
			</div><!--end row-->
		</div><!--end container-->
	</main>
