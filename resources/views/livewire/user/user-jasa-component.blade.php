<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>

@if($jasas->count() == 0)
    <div class="text-center" style="padding:30px 0;">
        <h1>Anda Belum Memiliki Jasa</h1>
        
        <a href="/user/service/add" class="btn btn-success">Buka Jasa Sekarang!</a>
    </div>
@else
   <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            All Jasa
                         </div>
                        <div class="col-md-6">
                            <a href="{{ route('user.addservice') }}" class="btn btn-success pull-right">Add New Jasa</a>
                        </div>
                    </div>
                </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table tabel-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Adress</th> 
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Province</th>
                                    <th>Regency</th>
                                    <th>Action</th>
                                    <th>Ads</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jasas as $key => $jasa)
                                <tr>
                                    <td>{{ $jasas->firstItem()+$key }}</td>
                                    <td><img src="{{ asset('assets/images/products/')}}/{{ $jasa->image }}" width="60" /></td>
                                    <td><a href="{{ route('jasa.details',['slug'=>$jasa->slug]) }}">{{ $jasa->name }}</a></td>
                                    <td>{{ $jasa->address }}</td>
                                    <td>@currency($jasa->price)</td>
                                    <td>@currency($jasa->sale_price)</td>
                                    <td>{{ $jasa->status }}</td>
                                    <td>{{ $jasa->category->name }}</td>
                                    <td>{{ $jasa->subcategory->name }}</td>
                                    <td>{{ $jasa->province->name }}</td>
                                    <td>{{ $jasa->regency->name }}</td>
                                    <td>
                                        <a href="{{ route('user.editservice',['jasa_slug'=>$jasa->slug]) }}" style="margin-left:10px;"><i class="fa fa-edit fa-2x text-info"></i></a>
                                        <a href="#" onclick="confirm('Are you sure, you want to delete this Jasa?') || event.stopImmediatePropagation()" wire:click.prevent="deleteJasa({{ $jasa->id }})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                        
                                    </td>
                                    <td><a href="{{ route('user.add-ads',[$jasa->id]) }}"><i class="fa fa-send fa-2x text-info"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $jasas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
