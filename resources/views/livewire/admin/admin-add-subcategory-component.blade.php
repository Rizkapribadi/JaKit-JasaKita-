<main>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class=row>
                            <div class="col-md-6">
                                Add new Subcategory
                            </div>
                            <div class="col-md-6"> 
                                <a href="{{ route('admin.subcategories') }}" class="btn btn-success pull-right">All subcategory</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="createSubcategory">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Subcategory Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="subcategory Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                                    @error('name')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Subcategory Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Subcategory Slug" class="form-control input-md" wire:model="slug"/>
                                    @error('slug')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="col-md-4 control-label">
                                <label for="">Category name</label>
                              </div>
                            <div class="col-md-4">
                                  <select name="category_id" class="form-control" wire:model="category_id">
                                    <option selected="selected" value="">Choose category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                    @endforeach
                                  </select>
                                @error('category_id')<p class="text-danger">{{ $message }}</p>@enderror
                              </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
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
</main>