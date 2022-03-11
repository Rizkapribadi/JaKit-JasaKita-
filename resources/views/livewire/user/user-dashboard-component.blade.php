<div>
   <div class="container" style="padding:30px 0;"> 
        <style>
            .content {
              padding-top: 40px;
              padding-bottom: 40px;
            }
            .icon-stat {
                display: block;
                overflow: hidden;
                position: relative;
                padding: 15px;
                margin-bottom: 1em;
                background-color: #fff;
                border-radius: 4px;
                border: 1px solid #ddd;
            }
            .icon-stat-label {
                display: block;
                color: #999;
                font-size: 13px;
            }
            .icon-stat-value {
                display: block;
                font-size: 28px;
                font-weight: 600;
            }
            .icon-stat-visual {
                position: relative;
                top: 22px;
                display: inline-block;
                width: 32px;
                height: 32px;
                border-radius: 4px;
                text-align: center;
                font-size: 16px;
                line-height: 30px;
            }
            .bg-primary {
                color: #fff;
                background: #d74b4b;
            }
            .bg-secondary {
                color: #fff;
                background: #6685a4;
            }
            
            .icon-stat-footer {
                padding: 10px 0 0;
                margin-top: 10px;
                color: #aaa;
                font-size: 12px;
                border-top: 1px solid #eee;
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">    
                  <div class="icon-stat">    
                    <div class="row">
                      <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">Total Revenue</span>
                        @if($totalRevenue==NULL)
                          <span class="icon-stat-value">Rp {{ $totalRevenue }}</span>
                        @else
                          <span class="icon-stat-value">Rp {{ number_format($totalRevenue,3) }}</span>
                        @endif
                      </div>   
                      <div class="col-xs-4 text-center">
                        <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                      </div>
                    </div>    
                    <div class="icon-stat-footer">
                      <i class="fa fa-clock-o"></i> Updated Now
                    </div>    
                  </div>    
                </div>    
                <div class="col-md-3 col-sm-6">    
                  <div class="icon-stat">    
                    <div class="row">
                      <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">Total Sales</span>
                        <span class="icon-stat-value">{{ $totalSales }}</span>
                      </div>    
                      <div class="col-xs-4 text-center">
                        <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                      </div>
                    </div>    
                    <div class="icon-stat-footer">
                      <i class="fa fa-clock-o"></i> Updated Now
                    </div>   
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">    
                  <div class="icon-stat">    
                    <div class="row">
                      <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">Today Revenue</span>
                        @if($todayRevenue==NULL)
                        <span class="icon-stat-value">Rp {{ $todayRevenue }}</span>
                      @else
                        <span class="icon-stat-value">Rp {{ number_format($todayRevenue,3) }}</span>
                      @endif
                      </div>    
                      <div class="col-xs-4 text-center">
                        <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
                      </div>
                    </div>    
                    <div class="icon-stat-footer">
                      <i class="fa fa-clock-o"></i> Updated Now
                    </div>
                  </div>    
                </div>    
                <div class="col-md-3 col-sm-6">    
                  <div class="icon-stat">    
                    <div class="row">
                      <div class="col-xs-8 text-left">
                        <span class="icon-stat-label">Today Sales</span>
                        <span class="icon-stat-value">{{ $todaySales }}</span>
                      </div>    
                      <div class="col-xs-4 text-center">
                        <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
                      </div>
                    </div>    
                    <div class="icon-stat-footer">
                      <i class="fa fa-clock-o"></i> Updated Now
                    </div>    
                  </div>    
                </div>    
              </div>           
          </div>

@if($orders->count() == 0)
<div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Latest Order
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>                  
                        </thead>
                        <tbody>      
                            <div class="text-center" style="padding:30px 0;">
                                <p>Jasa Anda Belum Memiliki Pesanan Dari User</p>
                            </div>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@else
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  Latest Order
                </div>
                <div class="panel-body">
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Total</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Order Date</th> 
                            <th class="text-center">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{  $order->id }}</td>
                                <td>{{ number_format($order->total,3) }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->user->phoneNumber }}</td>
                                <td>{{ $order->user->address }}</td>
                                <td>{{ $order->user->email }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td><a href="{{ route('user.orderdetails',['order_id'=>$order->id]) }}" class="btn btn-info btn-sm">Details</a></td>
                            </tr>
                           
                        @endforeach
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>

    </div>
</div>
@endif
