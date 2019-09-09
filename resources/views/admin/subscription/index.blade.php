@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Subscription Details
        </button>
        <br><br>

        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subscri. Date</th>
                                    <th>Amount</th>
                                    <th>Created</th>
                                   
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $subscriber)
                                @if (auth::user()->id==$subscriber->user_id)

                                <tr>

                                    <td>{{strtoupper($subscriber->user->lastname).', '.$subscriber->user->firstname}}</td>
                                    <td>{{$subscriber->user->email}}</td>
                                    <td>{{$subscriber->user->phone}}</td>
                                    <td>{{$subscriber->subscriptionyear}}</td>
                                    <td>&#8358;{{$subscriber->amount}}</td>
                                    <td>{{$subscriber->created_at->diffForHumans()}}</td>
                                    <td><a href="#" class="btn btn-success btn-sm btn-block"><span class="fa fa-download"></span> Download</a></td>
                                    
                                    
                                </tr>

                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subscri. Date</th>
                                        <th>Amount</th>
                                        <th>Created</th>
                                       
                                        <th>Download</th>
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

                <form action="{{ route('subscription.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Subscription Details</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="">Payment Date</label>
                                <input type="text" class="form-control" name="subscriptionyear" id="datepicker">
                                {{-- <input type="date" class="form-control" name="subscriptionyear"> --}}
                            </div>
                            <div>
                                <label for="">Amount</label>
                                <input type="text" class="form-control" name="amount" placeholder="Subscription Amount"
                                    maxlength="6">
                            </div>
                            
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            
                            <div>
                                <label for="">Upload Subscription Evidence</label>
                                <input type="file" name="imageevidence">
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