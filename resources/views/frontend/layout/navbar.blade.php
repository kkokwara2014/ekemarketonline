<div class="py-1 bg-primary">
  <div class="container">
    <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
      <div class="col-lg-12 d-block">
        <div class="row d-flex">
          <div class="col-md pr-4 d-flex topper align-items-center">
            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span>
            </div>
            <span class="text">{{$phone}}</span>
          </div>
          <div class="col-md pr-4 d-flex topper align-items-center">
            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-envelope"></span>
            </div>
            <span class="text">services@ekemarketonline.com</span>
          </div>
          <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
            <span class="text">
              <a href="{{ route('login') }}" class="text">Login</a> | <a href="{{ route('register') }}"
                class="text">Register</a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ route('index') }}">EkeMarketOnline</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
          <form action="{{route('search.product')}}" class="subscribe-form" method="POST">
            {{ csrf_field() }}
            <div class="form-group d-flex">
            <input type="text" name="productname" value="{{old('productname')}}" class="form-control-sm" placeholder="Enter Product name">
              <input type="submit" value="Search" class="submit px-2">
            </div>
          </form>
        </div>
      </div>


      <ul class="navbar-nav ml-auto">

        <li class="nav-item active"><a href="{{ route('index') }}" class="nav-link"><span class="ion-ios-home"
              style="font-size: 13px;"></span> </a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Shop</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">

            <div class="row">
              @forelse ($categories->chunk(3) as $chunk)
              @foreach ($chunk as $category)
              <div class="col-md-4">
                <a class="dropdown-item" href="{{ route('frontend.category.show',$category->id) }}">
                  <h6>{{$category->name}}</h6>
                </a>
              </div>
              @endforeach
              @empty
              <p class="alert alert-info">No Category has been added!</p>
              @endforelse
            </div>
          </div>
        </li>
        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
        <li class="nav-item"><a href="{{ route('contact.create') }}" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>

      </ul>
    </div>
  </div>
</nav>
<!-- End of navbar -->