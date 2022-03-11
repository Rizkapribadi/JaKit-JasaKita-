<div>
    <div class="container" style="padding:30px 0;"> 
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        My Profile
                     </div>
                     
                </div>
            </div>
                <div class="panel-body">
                    <table class="table tabel-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th> 
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Province</th>
                                <th>Regency</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>1</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phoneNumber }}</td>
                                <td>{{ $user->address }}</td>
                                @if($user->province_id==NUll && $user->regency_id ==NULL)
                                <td>{{ $user->province_id }}</td>
                                <td>{{ $user->regency_id }}</td>
                                @else
                                <td>{{ $user->province->name }}</td>
                                <td>{{ $user->regency->name }}</td>
                                @endif
                                <td>
                                    <a href="{{ route('admin.editprofile',['user_id'=>$user->id]) }}"><i class="fa fa-edit fa-2x text-info"></i></a>
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

