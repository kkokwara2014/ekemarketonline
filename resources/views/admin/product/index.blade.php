@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Product
        </button>
        <br><br>

        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>View Details</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                @if (auth::user()->id==$product->shop->user_id)

                                <tr>

                                    <td>{{$product->name}}</td>
                                    <td>&#8358; {{$product->price}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td><a href="{{ route('product.show',$product->id) }}"><span
                                                class="fa fa-eye fa-2x text-primary"></span></a></td>

                                    <td><a href="{{ route('product.edit',$product->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$product->id}}" style="display: none"
                                            action="{{ route('product.destroy',$product->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$product->id}}').submit();
                                                            } else {
                                                                event.preventDefault();
                                                            }
                                                        "><span class="fa fa-trash fa-2x text-danger"></span>
                                        </a>

                                    </td>

                                </tr>

                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>View Details</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>


        {{-- Data input modal area --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">

                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Product</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Product Name">
                            </div>
                            <div>
                                <label for="">Product Price</label>
                                <input type="text" class="form-control" name="price" placeholder="Product Price"
                                    maxlength="7">
                            </div>
                            <div>
                                <label for="">Category</label>
                                <select name="category_id" class="form-control">
                                    <option selected="disabled">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Shop</label>
                                <select name="shop_id" class="form-control">
                                    <option selected="disabled">Select Shop</option>
                                    @foreach ($shops as $shop)
                                    @if (Auth::user()->id==$shop->user->id)
                                    <option value="{{$shop->id}}">{{$shop->businessname.' - '.$shop->shopnumber}}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" cols="10" rows="3"></textarea>
                            </div>
                            <div>
                                <label for="">Upload Product Image</label>
                                <input type="file" name="image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->

                </form>
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    {{-- <section class="col-lg-5 connectedSortable"> --}}


    {{-- </section> --}}
    <!-- right col -->
</div>
<!-- /.row (main row) -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection