@extends('frontend.layout.main')

@section('content')

@include('frontend.layout.heroboard')



<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                {{-- <span class="subheading">Featured Products</span> --}}
                <h2 class="mb-4">Searched Products</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            @if (isset($details))
            <p>The search results for your request <b>{{$query}}</b> are : </p>

            @forelse ($products->chunk(4) as $chunk)
            @foreach ($chunk as $product)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{ route('frontend.product.show',$product->id) }}" class="img-prod"><img class="img-fluid"
                            src="{{url('product_images',$product->image)}}">
                        {{-- <span class="status">30%</span> --}}
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{ route('frontend.product.show',$product->id) }}">{{$product->name}}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span class="mr-2 price-dc">&#8358; 100.00</span><span
                                        class="price-sale">&#8358; {{$product->price}}</span></p>
                            </div>
                        </div>
                        {{-- <div>
							<hr>
							Call {{$product->shop->user->phone}}
                    </div> --}}
                    <div class="bottom-area d-flex px-3">
                        <div class="m-auto d-flex">
                            <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                <span><i class="ion-ios-cart" title="Add to Cart"></i></span>
                            </a>

                            <a href="{{ route('frontend.product.show',$product->id) }}"
                                class="heart d-flex justify-content-center align-items-center" title="View Details">
                                <span><i class="ion-ios-eye"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @empty
            {{-- <p class="alert alert-info">No Product has been added!</p> --}}
            @endforelse

            @foreach ($details->chunk(4) as $chunk)
                @foreach ($chunk as $product)
                    
                @endforeach
            @endforeach

            @elseif(isset($message))
            <p>{{$message}}</p>
            @endif


        </div>




    </div>

    <p style="text-align: right; color: green;">{{$products->links()}}</p>
    </div>
</section>

<hr>

@endsection