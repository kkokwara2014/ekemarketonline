@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('shop.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Shops
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-5">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('shop.update',$shops->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <label for="name">Business Name</label>
                                <input type="text" class="form-control" name="businessname"
                                    value="{{$shops->businessname}}">
                            </div>
                            <div>
                                <label for="name">Shop Number</label>
                                <input type="text" class="form-control" name="shopnumber"
                                    value="{{$shops->shopnumber}}">
                            </div>
                            <div>
                                <label for="name">Shop Owner</label>
                                <select name="mda_id" class="form-control">
                                    <option selected="disabled">Select Shop Owner</option>
                                    @foreach ($users as $user)
                                    @if (Auth::user()->id==$user->id)
                                    <option value="{{$user->id}}" {{$user->id==$shops->user_id ? 'selected':''}}>
                                        {{$user->lastname.' '.$user->firstname}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('shop.index') }}" class="btn btn-default">Cancel</a>

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