<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>

    @if($ordersi->count() ==0)
    <div class="text-center" style="padding:30px 0;">
        <div class="text-center" style="padding:30px 0;">
            <h3>Jasa Anda Belum Memiliki Pesanan Dari User</h3>
        </div>
    </div>
    @else
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Pesanan Jasa Saya
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
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersi as $orderan)
                                    <tr>
                                        <td>{{  $orderan->id }}</td>
                                        <td>{{ number_format($orderan->total,3) }}</td> 
                                        <td>{{ $orderan->user->name }}</td>
                                        <td>{{ $orderan->user->phoneNumber }}</td>
                                        <td>{{ $orderan->user->address }}</td>
                                        <td>{{ $orderan->user->email }}</td>
                                        <td>{{ $orderan->status }}</td>
                                        <td>{{ $orderan->created_at }}</td>
                                        <td><a href="{{ route('user.sellerdetails',['order_id'=>$orderan->id]) }}" class="btn btn-info btn-sm">Details</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $ordersi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if($orders->count() == 0)
<div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pesanan History Jasa Saya
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>                  
                        </thead>
                        <tbody>      
                            <div class="text-center" style="padding:30px 0;">
                                <p>Jasa Anda Belum Memiliki History Pesanan</p>
                            </div>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@else
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Pesanan History Jasa Saya
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
                                    <th>Action</th> 
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
                                        <td><a href="{{ route('user.sellerdetails',['order_id'=>$order->id]) }}" class="btn btn-info btn-sm">Details</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif