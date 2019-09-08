@extends('frontend.layout.main')

@section('content')
<section id="home-section" class="hero">
	<div class="home-slider owl-carousel">
		<div class="slider-item" style="background-image: url({{asset('bootstrap_assets/images/ekemarket1.jpg')}});">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-md-12 ftco-animate text-center">
						<h1 class="mb-2">100% Meeting your shopping needs</h1>
						<h2 class="subheading mb-4">We deliver your desired products to you.</h2>
						<p><a href="#" class="btn btn-primary">Shop Now</a></p>
					</div>

				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image: url({{asset('bootstrap_assets/images/ekemarket2.jpg')}});">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

					<div class="col-sm-12 ftco-animate text-center">
						<h1 class="mb-2">100% Meeting your shopping needs</h1>
						<h2 class="subheading mb-4">We deliver your desired products to you.</h2>
						<p><a href="#" class="btn btn-primary">Shop Now</a></p>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>


{{-- <section class="ftco-section ftco-category ftco-no-pt">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6 order-md-last align-items-stretch d-flex">
						<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex"
							style="background-image: url({{asset('bootstrap_assets/images/category.jpg')}});">
<div class="text text-center">
	<h2>Vegetables</h2>
	<p>Protect the health of every home</p>
	<p><a href="#" class="btn btn-primary">Shop now</a></p>
</div>
</div>
</div>
<div class="col-md-6">
	<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
		style="background-image: url({{asset('bootstrap_assets/images/category-1.jpg')}});">
		<div class="text px-3 py-1">
			<h2 class="mb-0"><a href="#">Fruits</a></h2>
		</div>
	</div>
	<div class="category-wrap ftco-animate img d-flex align-items-end"
		style="background-image: url({{asset('bootstrap_assets/images/category-2.jpg')}});">
		<div class="text px-3 py-1">
			<h2 class="mb-0"><a href="#">Vegetables</a></h2>
		</div>
	</div>
</div>
</div>
</div>

<div class="col-md-4">
	<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
		style="background-image: url({{asset('bootstrap_assets/images/category-3.jpg')}});">
		<div class="text px-3 py-1">
			<h2 class="mb-0"><a href="#">Juices</a></h2>
		</div>
	</div>
	<div class="category-wrap ftco-animate img d-flex align-items-end"
		style="background-image: url({{asset('bootstrap_assets/images/category-4.jpg')}});">
		<div class="text px-3 py-1">
			<h2 class="mb-0"><a href="#">Dried</a></h2>
		</div>
	</div>
</div>
</div>
</div>
</section> --}}

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				{{-- <span class="subheading">Featured Products</span> --}}
				<h2 class="mb-4">Available Products</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			@forelse ($products->chunk(4) as $chunk)
			@foreach ($chunk as $product)
			<div class="col-md-6 col-lg-3 ftco-animate">
				<div class="product">
					<a href="#" class="img-prod"><img class="img-fluid" src="{{url('product_images',$product->image)}}">
						{{-- <span class="status">30%</span> --}}
						<div class="overlay"></div>
					</a>
					<div class="text py-3 pb-4 px-3 text-center">
						<h3><a href="#">{{$product->name}}</a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price"><span class="mr-2 price-dc">&#8358; 100.00</span><span
										class="price-sale">&#8358; {{$product->price}}</span></p>
							</div>
						</div>
						<div class="bottom-area d-flex px-3">
							<div class="m-auto d-flex">

								<a href="{{ route('frontend.product.show',$product->id) }}"
									class="heart d-flex justify-content-center align-items-center" title="View Details">
									<span><i class="ion-ios-eye"></i></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			@endforeach
			@empty
			<p class="alert alert-info">No Product has been added!</p>
			@endforelse


		</div>

		<p style="text-align: right; color: green;">{{$products->links()}}</p>
	</div>
</section>

<hr>

@endsection