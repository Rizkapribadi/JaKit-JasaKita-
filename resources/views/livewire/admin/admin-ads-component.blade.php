<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Ads
                            </div>
                            
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User</th>
                                    <th>Toko</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ads as $advertisement)
                                <tr>
                                    <td>{{ $advertisement->id }}</td>
                                    <td>{{ $advertisement->user->name }}</td>
                                    <td>{{ $advertisement->jasa->name }}</td>
                                    <td>{{ $advertisement->name }}</td>
                                    <td>{{ $advertisement->link }}</td>
                                    <td><img src="{{asset('assets/images/sliders')}}/{{ $advertisement->image }}" width="120"/></td>
                                    <td>{{ $advertisement->status == 1 ? 'Active':'Inactive'}}</td>
                                    <td><a href="{{ route('admin.edit-ads',['ads_id'=>$advertisement->id]) }}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                        <a href="#" onclick="confirm('Are you sure, you want to delete this Advertisement?') || event.stopImmediatePropagation()" wire:click.prevent="deleteAds({{ $advertisement->id }})" style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
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
