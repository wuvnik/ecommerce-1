{{-- @extends('layouts.app') --}}
@extends('template.app')

@section('content')
    {{-- @include('carousel') --}}
    {{-- <section> --}}

        <div class="container-fluid">
          <div class="container">
            <h2 class="text-center my-5" style=" color: rgb(7, 7, 7);  padding: 7px;">Latest Items</h2>

            <div class="row">
              @foreach ($products as $product)
              <div class="col-sm-4  mb-5">
                <div class="card card_red text-center" style="width: 350px; height: 500px">
                  <div class="title">
                    {{-- <i class="fa fa-rocket" aria-hidden="true"></i> --}}
                    <h2>{{ $product->product_title }}</h2>
                  </div>
                  <div class="option">
                    <ul>
                        <li><div class="card-img pt-2 pb-3"> 
                            <img src="{{ asset('images/' .$product->image_path) }}" style="width: 100px; height: 130px" /> 
                        </div></li>
                        <div class="price">
                          <h5>RM {{ $product->product_price }}</h5>
                        </div>
                      <li><i class="fa fa-check" aria-hidden="true"></i>{{ $product->product_description }}</li>
                      {{-- <li><i class="fa fa-check" aria-hidden="true"></i>5 Domain Names</li>
                      <li><i class="fa fa-check" aria-hidden="true"></i>20 Emails Addresse</li>
                      <li><i class="fa fa-times" aria-hidden="true"></i>Live Support</li> --}}
                      </ul>
                  </div>
                  @if (Auth::user()->hasRole('user'))
                  <a href="{{ route('cart.add',$product->id) }}">Order Now</a>
                  @endif
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      {{-- </section> --}}

<style>
@import url('https://fonts.googleapis.com/css?family=Roboto:300');

body {
  margin: 0;
  padding: 0;
  font-family: 'Roboto', sans-serif;
}

section {
  width: 100%;
  height: 100vh;
  box-sizing: border-box;
  padding: 140px 0; 
  
}

.card {
  position: relative;
  min-width: 300px;
  height: auto;
  overflow: hidden;
  border-radius: 15px;
  margin: 0 auto;
  padding: 40px 20px;
  box-shadow: 0 10px 15px rgba(0,0,0,0.3);
  transition: .5s;
}
.card:hover {
  transform:scale(1.1);
}
.card_red, .card_red .title .fa {
  background: linear-gradient(-45deg, #ffec61, #f321d7);
}
.card_violet, .card_violet .title .fa  {
  background: linear-gradient(-45deg, #f403d1, #64b5f6);
}
.card_three, .card_three .title .fa  {
  background: linear-gradient(-45deg, #24ff72, #9a4eff);
}

.card:before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 40%;
  background: rgba(255, 255, 255, .1);
  z-index: 1;
  transform: skewY(-5deg) scale(1.5);
}

.title .fa {
  color: #fff;
  font-size: 60px;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  text-align: center;
  line-height: 100px;
  box-shadow: 0 10px 10px rgba(0, 0, 0, .1);
}
.title h2 {
  position: relative;
  margin: 20px 0 0;
  padding: 0;
  color: #fff;
  font-size: 28px;
  z-index: 2;
}
.price {
  position: relative;
  z-index: 2;
}
.price h4 {
  margin: 0;
  padding: 20px 0;
  color: #fff;
  font-size: 60px;
}
.option {
  position: relative;
  z-index: 2;
}
.option ul {
  margin: 0;
  padding: 0;
}
.option ul li {
  margin: 0 0 10px;
  padding: 0;
  list-style: none;
  color: #fff;
  font-size: 16px;
}
.card a {
  display: block;
  position: relative;
  z-index: 2;
  background-color: #fff;
  color: #262ff;
  width: 150px;
  height: 40px;
  text-align: center;
  margin: 20px auto 0;
  line-height: 40px;
  border-radius: 40px;
  font-size: 16px;
  cursor: pointer;
  text-decoration: none;
  box-shadow: 0 5px 10px rgba(0,0,0, .1);
}
.card a:hover {
  
}
</style>


@endsection