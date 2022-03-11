<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    
    @if($orders->count() ==0)
        <div class="text-center" style="padding:30px 0;">
            <h1>Daftar Pesanan Anda Kosong</h1>
            <p>Tidak ada pesanan yang sedang diproses</p>
            <a href="/jasa" class="btn btn-success">Pesan Jasa Sekarang!</a>
        </div>
    @else
    
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Pesanan Saya
                    </div>
                    <div class="panel-body">
                        @if(Session::has('order_message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                        @endif
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
                                    <th colspan="2" class="text-center">Action</th> 
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
                                       @if($order->status=="ordered")
                                       
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm-dropdown-toggle" type="button" data-toggle="dropdown">Status <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">Delivered</a></li>
                                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled')">Canceled</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        @endif
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
@endif

@if($ordersi->count() == 0)
<div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar History Pesanan Saya
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>                  
                        </thead>
                        <tbody>      
                            <div class="text-center" style="padding:30px 0;">
                                <p>Anda Belum Memiliki History Pesanan</p>
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
                        Daftar History Pesanan Saya
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
                                    <th colspan="2" class="text-center">Action</th> 
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
                                        <td><a href="{{ route('user.orderdetails',['order_id'=>$orderan->id]) }}" class="btn btn-info btn-sm">Details</a></td>
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
</div>
@endif