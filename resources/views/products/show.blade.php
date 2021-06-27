{{-- @extends('layouts.app') --}}
@extends('template.app')
@section('content')

<!--Section: Block Content-->
<section class="my-5" style="min-height: 100vh;">
{{-- {{ $product }}
{{ $product->$product }} --}}
@foreach ($product as $item)

    <div class="row">
      <div class="col-md-6 mb-4 mb-md-0">
  
        <div id="mdb-lightbox-ui"></div>
  
        <div class="mdb-lightbox">
  
          <div class="row product-gallery mx-1">
  
            <div class="col-12 mb-0">
              <figure class="view overlay rounded z-depth-1 main-img">
                <a>
                    <img src="{{ asset('images/' .$item->image_path) }}"
                    class="img-fluid z-depth-1">
                </a>
              </figure>
            </div>
          </div>
  
        </div>
  
      </div>
      <div class="col-md-6">
  
        <h5>{{ $item->product_name }}</h5>
        <p class="mb-2 text-muted text-uppercase small">{{ $item->product_name }}</p>
        <ul class="rating" style="display: none">
          <li> 
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="fas fa-star fa-sm text-primary"></i>
          </li>
          <li>
            <i class="far fa-star fa-sm text-primary"></i>
          </li>
        </ul>
        <p><span class="mr-1"><strong>RM{{ $item->product_price }}</strong></span></p>
        <p class="pt-1">{{ $item->product_description }}</p>
        <hr>

        @if (Auth::user()->hasRole('user'))
        <button href="{{ route('cart.add',$item->id) }}" type="button" class="btn btn-info btn-md mr-1 mb-2">
            <i class="fas fa-shopping-cart pr-2"></i>
            <a href="{{ route('cart.add',$item->id) }}">
            Add to cart
        </button>
        @endif
      </div>
    </div>
    @endforeach
  
  </section>
  <!--Section: Block Content-->
    
@endsection