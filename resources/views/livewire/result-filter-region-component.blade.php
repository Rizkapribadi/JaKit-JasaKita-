<h1 class="shop-title">{{ $province_name }}</h1>

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
