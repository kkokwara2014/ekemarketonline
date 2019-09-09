@extends('admin.layout.app')


@section('content')
@include('admin.layout.statboard')
<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-12 connectedSortable">

    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">
        <h1 style="color:green">Useful Tips</h1>
        
        <ol>
          <li><h3> Add Shop before</h3></li>
          <li><h3> Adding Products</h3></li>
        </ol>
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