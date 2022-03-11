<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Order Details
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('user.orders') }}" class="btn btn-success pull-right">My Orders</a>
                            </div>
                        </div>
                      </div>
                      <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <th>Order Id</th>
                                    <td>{{ $order->id }}</td>
                                    <th>Order Date</th>
                                    <td>{{ $order->created_at }}</td>
                                    <th>Status</th>
                                    <td>{{ $order->status }}</td>
                                   @if($order->status == "delivered")
                                       <th>Delivery Date</th>
                                       <td>{{ $order->delivered_date }}</td>
                                    @elseif($order->status == "canceled")
                                        <th>Cancellation Date</th>
                                        <td>{{ $order->canceled_date }}</td>
                                    @endif
                                </tr>
                            </table>
                      </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="row">
                          <div class="col-md-6">
                              Ordered Items
                          </div>
                          <div class="col-md-6">
                              <a href="{{ route('user.orders') }}" class="btn btn-success pull-right">My Orders</a>
                          </div>
                      </div>
                    </div>
                    <div class="panel-body">
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">Product Name</h3>
                            <ul class="products-cart">
                                @foreach ($order->orderItems as $item) 
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{ asset('assets/images/products') }}/{{ $item->jasa->image }}" alt=""></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{ route('jasa.details',['slug'=>$item->jasa->slug]) }}">{{ $item->jasa->name }}</a>
                                    </div>
                                    <div class="price-field produtc-price"><p class="price">@currency($item->jasa->price)</p></div>
                                     <div class="quantity">  
                                       <h5>{{ $item->quantity }}</h5>
                                    </div> 
                                    <div class="price-field sub-total"><p class="price">@currency($item->price * $item->quantity)</p></div>
                                    @if($order->status == "delivered" && $item->rstatus == false)
                                    <div class="price-field sub-total"><p class="price"><a href="{{ route('user.review',['order_item_id'=>$item->id]) }}">Review</a></p></div>
                                    @endif
                                </li>
                                @endforeach								
                            </ul>
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">
                                    {{-- <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>  --}}
                                    <p class="summary-info"><span class="title">Total</span><b class="index">Rp {{ number_format($order->total,3) }}</b></p>  
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Informasi Pembeli
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{ $order->user->name }}</td>
                                <th>email</th>
                                <td>{{ $order->user->email }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $order->user->address }}</td>
                                <th>Phone</th>
                                <td>{{ $order->user->phoneNumber }}</td>
                            </tr>
                            <tr>
                                <th>Regency</th>
                                <td>{{ $order->user->regency->name }}</td>
                                <th>Province</th>
                                <td>{{ $order->user->province->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($order->is_shipping_different)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Detail Tujuan Pengiriman Jasa
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{ $order->shipping->name }}</td>
                                <th>email</th>
                                <td>{{ $order->shipping->email }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $order->shipping->address }}</td>
                                <th>Phone</th>
                                <td>{{ $order->shipping->phoneNumber }}</td>
                            </tr>
                            <tr>
                                <th>Regency</th>
                                <td>{{ $order->shipping->regency->name }}</td>
                                <th>Province</th>
                                <td>{{ $order->shipping->province->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($order->is_shipping_different)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Transaction
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Transaction Mode</th>
                                <td>{{ $order->transaction->mode }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $order->transaction->status }}</td>
                            </tr>
                            <tr>
                                <th>Transaction Date</th>
                                <td>{{ $order->transaction->created_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
