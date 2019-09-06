<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('admin_assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->lastname.' '.Auth::user()->firstname}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            {{-- <i class="fa fa-angle-left pull-right"></i> --}}
          </span>
        </a>

      </li>

      {{--
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Product Category</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> All Categories</a></li>
        </ul>
      </li> --}}

      {{-- <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Product</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> All Products</a></li>
        </ul>
      </li> --}}

      <li><a href="{{ route('category.index') }}"><i class="fa fa-th"></i> Category</a></li>
      <li><a href="#"><i class="fa fa-university"></i> Shop</a></li>
      <li><a href="#"><i class="fa fa-product-hunt"></i> Product</a></li>
      <li><a href="#"><i class="fa fa-money"></i> Subscription</a></li>
      <li><a href="#"><i class="fa fa-user-plus"></i> Admins</a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>