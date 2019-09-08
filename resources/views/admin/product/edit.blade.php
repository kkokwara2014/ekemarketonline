@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('product.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Products
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-5">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('product.update',$products->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" name="name" value="{{$products->name}}">
                            </div>
                            <div>
                                <label for="">Product Price</label>
                                <input type="text" class="form-control" name="price" value="{{$products->price}}"
                                    maxlength="7">
                            </div>
                            <div>
                                <label for="">Category</label>
                                <select name="category_id" class="form-control">
                                    <option selected="disabled">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name}}</option>
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
                                <textarea name="description" class="form-control" cols="10" rows="3"
                                    style="text-align: left">
                                {{ $products->description }}
                                </textarea>
                            </div>
                            <div>
                                <label for="">Upload Product Image</label>
                                <input type="file" name="image">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('product.index') }}" class="btn btn-default">Cancel</a>

                    </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
</div>
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