@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Product
        </button> --}}
        <br><br>

        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Surname</th>
                                    <th>First Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>View Details</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shopowners as $shopowner)
                               

                                <tr>

                                    <td>{{$shopowner->lastname}}</td>
                                    <td>{{$shopowner->firstname}}</td>
                                    <td>{{$shopowner->email}}</td>
                                    <td>{{$shopowner->phone}}</td>
                                    <td><a href="{{ route('shopowner.show',$shopowner->id) }}"><span
                                                class="fa fa-eye fa-2x text-primary"></span></a></td>

                                    <td><a href="{{ route('shopowner.activate',$shopowner->id) }}"><span
                                                class="fa fa-unlock fa-2x text-success"></span></a></td>
                                    <td>
                                        

                                    </td>

                                </tr>

                               
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                        <th>Surname</th>
                                        <th>First Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>View Details</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
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