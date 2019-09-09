@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <div>
            <a href="{{ route('shopowner.all') }}" class="btn btn-success btn-sm">
                Back</a>
        </div>
        <br>
        <div class="row">
            <div class="col-md-9">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{url('user_images',$shopowner->user->userimage)}}" alt=""
                                    class="img-responsive img-rounded" width="250" height="250">

                            </div>
                            <div class="col-md-7">
                                <p>
                                    <h2>{{$shopowner->name}}</h2>
                                </p>
                                <hr>
                                <div>Name : {{strtoupper($shopowner->user->lastname).', '.$shopowner->user->firstname}}
                                </div>
                                <div>Email : {{$shopowner->user->email}} </div>
                                <div>Phone : {{$shopowner->user->phone}} </div>
                                <div>Business Name : {{$shopowner->shop->businessname.' - '.$product->shop->shopnumber}}
                                </div>

                                <br>
                                <div>
                                    Shop Owner :
                                    <strong>{{strtoupper($product->shop->user->lastname).', '.$product->shop->user->firstname}}</strong>
                                </div>
                                <div>Phone : {{$product->shop->user->phone}}</div>
                            </div>

                        </div>

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