
	<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Semua Daftar Jasa</span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

					{{-- <div class="banner-shop">
						<a href="#" class="banner-link">
							<figure><img src="{{ asset('assets/images/shop-banner.jpg') }}" alt=""></figure>
						</a>
					</div> --}}

					<div class="wrap-shop-control">

						<h1 class="shop-title">Semua Daftar Jasa</h1>

						<div class="wrap-right">

							<div class="sort-item orderby ">
								<select name="orderby" class="use-chosen" wire:model="sorting">
									<option value="default" selected="selected">Default sorting</option>
									<option value="date">Sort by newness</option>
									<option value="price">Sort by price: low to high</option>
									<option value="price-desc">Sort by price: high to low</option>
								</select>
							</div>

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

							<div class="change-display-mode">
								<a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
								<a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
							</div>

						</div>

					</div><!--end wrap shop control-->
                    @if($jasas->count() > 0)
					<div class="row">

					<ul class="product-list grid-products equal-container">
							@foreach ($jasas as $jasa)
							<li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
								<div class="product product-style-3 equal-elem ">
									<div class="product-thumnail">
										<a href="{{ route('jasa.details',['slug'=>$jasa->slug]) }}" title="{{ $jasa->name }}">
											<figure><img src="{{ asset('assets/images/products/')}}/{{ $jasa->image }}" alt="{{ $jasa->name }}"></figure>
										</a>
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
									</div>
								</div>
							</li>
								@endforeach	
						</ul>
					</div>
                    @else
                    <p style="padding-top:30px;">Tidak pada pencarian</p>
                    @endif
					 <div class="wrap-pagination-info">
					 {{$jasas->links()}}
						 
					</div>
				</div>
				<!--end main products area-->

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

					<div class="widget mercado-widget filter-widget brand-widget">
						<h2 class="widget-title">Provinsi</h2>
						<div class="widget-content">
							<ul class="list-style vertical-list list-limited" data-show="6">
								<li class="list-item"><a class="filter-link active" href="#">Sumatera Utara </a></li>
								<li class="list-item"><a class="filter-link " href="#">Sumatera Barat</a></li>
								<li class="list-item default-hiden"><a class="filter-link " href="#">Riau</a></li>
								<li class="list-item"><a data-label='Show less<i class="fa fa-angle-up" aria-hidden="true"></i>' class="btn-control control-show-more" href="#">Show more<i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div><!-- brand widget-->

					<div class="widget mercado-widget widget-product">
						<h2 class="widget-title">Popular Products</h2>
						<div class="widget-content">
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
