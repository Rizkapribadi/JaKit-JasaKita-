<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
   <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Jasa
                    </div>
                    <div class="panel-body">
                        <table class="table tabel-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Adress</th> 
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>Province</th>
                                    <th>Regency</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jasas as $key => $jasa)
                                <tr>
                                    <td>{{ $jasas->firstItem()+$key }}</td>
                                    <td><figure><img src="{{ asset('assets/images/products/')}}/{{ $jasa->image }}" width="60" /></figure></td>
                                    <td>{{ $jasa->name }}</td>
                                    <td>{{ $jasa->address }}</td>
                                    <td>@currency($jasa->price)</td>
                                    <td>{{ $jasa->status }}</td>
                                    <td>{{ $jasa->user->name }}</td>
                                    <td>{{ $jasa->category->name }}</td>
                                    <td>{{ $jasa->subcategory->name }}</td>
                                    <td>{{ $jasa->province->name }}</td>
                                    <td>{{ $jasa->regency->name }}</td>
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
