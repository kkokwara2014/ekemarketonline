@extends('frontend.layout.main')

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url({{asset('bootstrap_assets/images/ekemarket1.jpg')}});">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="#">Home</a></span> <span class="mr-2"><a
                            href="#">Product</a></span> <span>Product Single</span></p>
                <h1 class="mb-0 bread">Product Details</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="{{url('product_images',$products->image)}}" class="image-popup"><img
                        src="{{url('product_images',$products->image)}}" class="img-fluid"
                        ></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3>{{$products->name}}</h3>
                {{-- <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                    </p>
                    <p class="text-left">
                        <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                    </p>
                </div> --}}
                <p class="price"><span>&#8358; {{$products->price}}</span></p>
                <p>
                    {{$products->description}}
                </p>
                
                <hr>
                <p><a href="#" class="btn btn-black py-3 px-5">Continue to Shop</a></p>
            </div>
        </div>
    </div>
</section>

@endsection