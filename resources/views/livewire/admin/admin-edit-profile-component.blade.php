<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Profile
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-success pull-right">My Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                       
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateBiodata">
                        @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-lable">Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Name" class="form-control input-md" wire:model="name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-lable">Email</label>
                                <div class="col-md-4">
                                    <input type="email" placeholder="email" class="form-control input-md" wire:model="email"/>
                                   
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-lable">Phone Number</label>
                                <div class="col-md-4">
                                    <input type="number" placeholder="phone number" class="form-control input-md" wire:model="phoneNumber"/>
                                   
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-lable">Address</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Address" wire:model="address"></textarea> 
                                </div>
                            </div>
                          
                          
                        <div class="form-group">
                            <label for="province" class="col-md-4 control-lable">Province</label>
                            <div class="col-md-4">
                            <select  wire:model="province_id" wire:model.lazy="selectedProvince" class="form-control">
                                <option selected="selected" value="">Choose province</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                          
                        </div>
                    </div>
                   @if(!is_null($selectedProvince))
                        <div class="form-group">
                            <label for="regency" class="col-md-4 control-lable">Regency</label>
                            <div class="col-md-4">
                            <select class="form-control" wire:model="regency_id">
                                <option selected="selected" value="">Choose Regency</option>
                                @foreach($regencies as $regency)
                                    <option value="{{ $regency->id }}">{{ $regency->name }}</option>
                                @endforeach
                            </select>
                            
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label class="col-md-4 control-lable"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </div>
                </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.changepassword') }}" class="btn btn-success">Change Password</a>
                </div>
           
            </div>
        </div>
    </div>
</div> 

