<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Jasa
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('user.services') }}" class="btn btn-success pull-right">All Jasa</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                       
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                    <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addJasa">
                        @csrf
                            <div class="form-group">
                                <label class="col-md-4 control-lable">Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-lable">Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Slug" class="form-control input-md" wire:model="slug"/>
                                    @error('slug')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-lable">Address</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Address" wire:model="address"></textarea>
                                    @error('address')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-lable">Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Description" wire:model="description"></textarea>
                                    @error('description')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-lable">Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Price" class="form-control input-md" wire:model="price"/>
                                    @error('price')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-lable">Unit</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Unit" class="form-control input-md" wire:model="unit"/>
                                   <span> &nbsp; masukkan unit jika ada. ex: perlembar, perjam etc</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-lable">Sale price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Sale price" class="form-control input-md" wire:model="sale_price"/>
                                    @error('sale_price')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-lable">Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="status">
                                        <option value="tersedia">Tersedia</option>
                                        <option value="tidaktersedia">Tidak Tersedia</option>
                                    </select>
                                    @error('status')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            
                                    <input type="hidden" class="form-control input-md" value="1000000" wire:model="quantity"/>

                             <div class="form-group">
                                <label class="col-md-4 control-lable">Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="image"/>
                                    @if($image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120"/>
                                    @endif
                                    @error('image')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-lable">Gallery</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="images" multiple />
                                    @if($images)
                                        @foreach($images as $image)
                                            <img src="{{ $image->temporaryUrl() }}" width="120"/>
                                        @endforeach
                                    @endif
                                    @error('images')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category" class="col-md-4 control-lable">Category</label>
                                <div class="col-md-4">
                                <select wire:model="category_id" wire:model.lazy="selectedCategory" class="form-control" >
                                    <option selected="selected" value="">Choose category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        

                      
                       @if(!is_null($selectedCategory))
                            <div class="form-group">
                                <label for="subcategory" class="col-md-4 control-lable">SubCategory</label>
                                <div class="col-md-4">
                                <select name="subcategory_id" class="form-control" wire:model="subcategory_id">
                                    <option selected="selected" value="">Choose subcategory</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                                @error('subcategory_id')<p class="text-danger">{{ $message }}</p>@enderror
                            </div>
                        </div>
                        @endif
                       
                        <div class="form-group">
                            <label for="province" class="col-md-4 control-lable">Province</label>
                            <div class="col-md-4">
                            <select  wire:model.lazy="selectedProvince" class="form-control" wire:model="province_id">
                                <option selected="selected" value="">Choose province</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            @error('province_id')<p class="text-danger">{{ $message }}</p>@enderror
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
                            @error('regency_id')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label class="col-md-4 control-lable">Google Map Link</label>
                        <div class="col-md-4">
                            <input type="text" id="texty" placeholder="Location Link" class="form-control input-md" wire:model="location_link" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-lable"></label>
                        <div class="col-md-4">
                            <a class="link-to-shop" href="https://www.google.co.id/maps" target="_blank" rel="noopener noreferrer">Lihat link di sini<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-lable"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </div>
                </form>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 


