@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Shop
        </button>
        <br><br>

        <div class="row">
            <div class="col-md-9">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if (!empty($shops))



                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Business Name</th>
                                    <th>Shop Number</th>
                                    <th>Shop Owner</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shops as $shop)
                                @if (auth::user()->id==$shop->user_id)
                                
                                <tr>

                                    <td>{{$shop->businessname}}</td>
                                    <td>{{$shop->shopnumber}}</td>
                                    <td>{{$shop->user->lastname.' '.$shop->user->firstname}}</td>
                                    <td><a href="{{ route('shop.edit',$shop->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$shop->id}}" style="display: none"
                                            action="{{ route('shop.destroy',$shop->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$shop->id}}').submit();
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
                                    <th>Business Name</th>
                                    <th>Shop Number</th>
                                    <th>Shop Owner</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>


                        @else
                        <p class="alert alert-warning">You have not added Shop!</p>
                        @endif

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>


        {{-- Data input modal area --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">

                <form action="{{ route('shop.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Shop</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="">Business Name</label>
                                <input type="text" class="form-control" name="businessname" placeholder="Business Name">
                            </div>
                            <div>
                                <label for="">Shop Number</label>
                                <input type="text" class="form-control" name="shopnumber" placeholder="Shop Number">
                            </div>

                            <div>
                                <label for="">Shop Owner</label>
                                <select name="user_id" class="form-control">
                                    <option selected="disabled">Select Shop Owner</option>
                                    @foreach ($users as $user)
                                    @if (Auth::user()->id==$user->id)
                                    <option value="{{$user->id}}">{{$user->lastname.' '.$user->firstname}}</option>
                                    @endif
                                    @endforeach
                                </select>

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