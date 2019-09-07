@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">

        <br>
        <div class="row">
            <div class="col-md-5">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <img src="{{url('user_images','no_user.jpg')}}" alt="" class="img-responsive img-circle"
                                    width="250" height="250">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <br>
                                    <input type="file" name="imagename">
                                    <p></p>
                                    <button type="submit" class="btn btn-success text-center"><span class="fa fa-upload"></span>
                                        Upload your
                                        Photo</button>
                                </form>
                            </div>
                            <div class="col-md-3"></div>
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