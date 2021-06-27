@extends('template.app')

@section('content')

@include('template.banner')

<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="">view all products <i class="fa fa-angle-right"></i></a>
          </div>
        </div>

        @foreach ($products as $product)
        <div class="col-md-4">
          <div class="product-item" >
            {{-- <a href="#"><img src="assets/images/product_01.jpg" alt=""></a> --}}
            <a href="#">
              <img src="{{ asset('images/' .$product->image_path) }}"   style="width: 348px; height: 417px" alt="product">
            </a>
            <div class="down-content" >
              <a href="#"><h4>{{ $product->product_title }}</h4></a>
              <h6>RM {{ $product->product_price }}</h6>
              <p>{{ $product->product_description }}.</p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews (24)</span>

              @if (Auth::guest() )
                <a href="{{ route('login') }}" class="btn btn-primary">Add to Cart</a>
              @elseif (Auth::user()->hasRole('user'))
                <a href="{{ route('cart.add',$product->id) }}" class="btn btn-primary">Add to Cart</a>
              @endif

            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>

  <div class="best-features">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>About Things.com</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="left-content">
            <h4>Looking for the best products?</h4>
            {{-- <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">This template</a> is free to use for your business websites. However, you have no permission to redistribute the downloadable ZIP file on any template collection website. <a rel="nofollow" href="https://templatemo.com/contact">Contact us</a> for more info.</p> --}}
            <ul class="featured-list">
              <li><a href="#">Lorem ipsum dolor sit amet</a></li>
              <li><a href="#">Consectetur an adipisicing elit</a></li>
              <li><a href="#">It aquecorporis nulla aspernatur</a></li>
              <li><a href="#">Corporis, omnis doloremque</a></li>
              <li><a href="#">Non cum id reprehenderit</a></li>
            </ul>
            <a href="" class="filled-button">Read More</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="right-image">
            <img src="{{ asset('template/assets/images/feature-image.jpg') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-md-8">
                <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
              </div>
              <div class="col-md-4">
                <a href="#" class="filled-button">Purchase Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection