{{-- @extends('layouts.app') --}}
@extends('template.app')
@section('content')

<div class="container">
    <h5 class="text-center mt-3 mb-4" style="background: #000; color:white; padding: 7px;">Checkout Form</h5>
    <div class="row">
        <!-- summary -->
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-muted">Your cart</span>
                  <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Product name</h6>
                      <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$12</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Second product</h6>
                      <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$8</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Third item</h6>
                      <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$5</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                      <h6 class="my-0">Promo code</h6>
                      <small>EXAMPLECODE</small>
                    </div>
                    <span class="text-success">-$5</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
                  </li>
                </ul>

                <form class="card p-2">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                  </div>
                </form>
              </div>
              <!--endsummary-->
    
        <!-- chechkout form -->
        <div class="col-md-8 order-md-1">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
        
                <div class="row">
                    <div class="col-md-6 mb-6 form-group">
                        <label for="">Full Name</label>
                        <input type="text" name="shipping_fullname"  id="" class="form-control" required>
                        <div class="invalid-feedback">
                            Your name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-6 form-group">
                        <label for="">Phone Number</label>
                        <input type="text" name="shipping_phone"  id="" class="form-control" required>
                        <div class="invalid-feedback">
                            Your phone number is required.
                        </div>
                    </div>
        
                </div>
                <div class="row col-md-12 mb-12 form-group">
        
                </div>
                <div class="row col-md-12 mb-12 form-group">
                    <label for="">Address</label>
                    <input type="text" name="shipping_address"  id="" class="form-control" required>
                    <div class="invalid-feedback">
                        Your address is required.
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3 form-group">
                        <label for="zip">State</label>
                        <input type="text" class="form-control" name="shipping_state" id="zip" placeholder="" required class="form-control">
                        <div class="invalid-feedback">
                        State required.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 form-group">
                        <label for="zip">City</label>
                        <input type="text" class="form-control" name="shipping_city" id="zip" placeholder="" required class="form-control">
                        <div class="invalid-feedback">
                        City required.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 form-group">
                        <label for="zip">Post Code</label>
                        <input type="text" class="form-control" name="shipping_postcode" id="zip" placeholder="" required class="form-control">
                        <div class="invalid-feedback">
                        Post code required.
                        </div>
                    </div>
                </div>

                <hr class="mb-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="same-address">
                  <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="save-info">
                  <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div>
                <hr class="mb-4">
        
                <h5 class="mb-3 text-center" style="background: #000; color: white;  padding: 7px;">Payment Options</h5>
        
                <div class="d-block my-3 text-center">
                  <div class="custom-control custom-radio">
                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                    <label class="custom-control-label" for="credit">Credit card</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="debit">Debit card</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="paypal">PayPal</label>
                  </div>
                </div>
        </div>
    
    </div>

    <div class="row mt-0">
        <a href="{{ route('cart.index') }}" type="" class="btn btn-primary mr-auto" style="background: #ff7e03;">
            Back
            <i class="fas fa-arrow-circle-left"></i>
        </a>
        <button type="submit" class="btn btn-primary ml-auto" style="background: #ff7e03;">
            Place Order and Pay
            <i class="fas fa-arrow-circle-right"></i>
        </button>
    </div>

</div>

        </form>
      </div>
    </div>
  
 
  </div>


@endsection