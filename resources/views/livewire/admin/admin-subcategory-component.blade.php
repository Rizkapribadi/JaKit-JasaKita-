<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Subcategories
                            </div>
                            <div class="col-md-6">
                               <a href="{{  route('admin.addsubcategory') }}" class="btn btn-success pull-right">Add new subcategory</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Subcategory Name</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($subcategories as $key => $subcategory)
                                    <tr>
                                        <td>{{ $subcategories->firstItem()+$key }}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>{{ $subcategory->category->name }}</td>
                                        <td>{{ $subcategory->slug }}</td>
                                        <td>
                                            <a href="{{ route('admin.editsubcategory',['subcategory_slug'=>$subcategory->slug]) }}"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" onclick="confirm('Are you sure, you want to delete this category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSubcategory({{ $subcategory->id }})" style="margin-left: 10px; "><i class="fa fa-times fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $subcategories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
