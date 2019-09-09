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
                                @foreach ($admins as $admin)


                                <tr>

                                    <td>{{$admin->lastname}}</td>
                                    <td>{{$admin->firstname}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->phone}}</td>
                                    <td><a href="{{ route('admins.show',$admin->id) }}"><span
                                                class="fa fa-eye fa-2x text-primary"></span></a></td>
                                    <td>
                                        @if ($admin->isactive==1)
                                        <span class="fa fa-check-circle fa-2x text-success"></span>
                                        @else
                                        <span class="fa fa-close fa-2x text-danger"></span>
                                        @endif

                                    </td>

                                    <td>
                                        @if ($admin->isactive==1)

                                        <form id="delete-form-{{$admin->id}}" style="display: none"
                                            action="{{ route('admins.deactivate',$admin->id) }}" method="post">
                                            {{ csrf_field() }}

                                        </form>
                                        <a href="" onclick="
                                                                if (confirm('Are you sure you want to Deactivate this?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('delete-form-{{$admin->id}}').submit();
                                                                } else {
                                                                    event.preventDefault();
                                                                }
                                                            " class="btn btn-danger btn-sm btn-block">Deactivate
                                        </a>
                                        @else

                                        <form id="delete-form-{{$admin->id}}" style="display: none"
                                            action="{{ route('admins.activate',$admin->id) }}" method="post">
                                            {{ csrf_field() }}

                                        </form>
                                        <a href="" onclick="
                                                                if (confirm('Are you sure you want to Activate this?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('delete-form-{{$admin->id}}').submit();
                                                                } else {
                                                                    event.preventDefault();
                                                                }
                                                            " class="btn btn-success btn-sm btn-block"> Activate
                                        </a>

                                        @endif
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