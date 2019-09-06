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
              <a href="{{ route('login') }}" class="text">Sign In</a> | <a href="{{ route('register') }}" class="text">Sign Up</a>
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
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="{{ route('index') }}" class="nav-link"><span class="ion-ios-home"
              style="font-size: 13px;"></span> </a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">Shop</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">

            <div class="row">
              <div class="col-md-4">
                <a class="dropdown-item" href="shop.html">
                  <h6>Wears</h6>
                </a>
                <a class="dropdown-item" href="#">Wishlist</a>
                <a class="dropdown-item" href="#">Single Product</a>
              </div>
              <div class="col-md-4">
                <a class="dropdown-item" href="shop.html">
                  <h6>Electronics</h6>
                </a>
                <a class="dropdown-item" href="#">Wishlist</a>
                <a class="dropdown-item" href="#">Single Product</a>
              </div>
              <div class="col-md-4">
                <a class="dropdown-item" href="shop.html">
                  <h6>Fashion</h6>
                </a>
                <a class="dropdown-item" href="#">Wishlist</a>
                <a class="dropdown-item" href="#">Single Product</a>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Sign In</a></li>
        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Sign Up</a></li>

      </ul>
    </div>
  </div>
</nav>
<!-- END nav -->