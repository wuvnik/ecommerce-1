{{-- @extends('layouts.app') --}}
@extends('template.app')
@section('content')
<div class="container my-5"
style="min-height: 100vh;" 
{{-- style="height:calc(100vh-234.8px);" --}}
>
    {{-- <h5 class="text-center" style="background:#ff7e03 ; color: white;  padding: 7px;">Your Cart</h5> --}}
    <h5 class="text-center" style="background:#000 ; color: white;  padding: 7px;">Your Cart</h5>

    <table class="table mt-5">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($cartItems as $item)
            <tr>
                <td scope="row">{{ $item->name }}</td>
                <td>
                    {{ $item->price }}
                </td>
                <td>
                    <form action="{{ route('cart.update', $item->id) }}">
                        <input name="quantity" type="number" value={{ $item->quantity }}>
                        <input type="submit" value="save">
                    </form>
                    {{-- {{ $item->quantity }} --}}
        
                </td>
                <td>
                    {{ Cart::session(auth()->id())->get($item->id)->getPriceSum() }}
                </td>
                <td>
                    <a href="{{ route('cart.remove', $item->id) }}">Delete</a>
                </td>
            </tr>
    
        @endforeach
        </tbody>

    </table>

    <h3 class="mt-3">
        Total Price: $ {{ Cart::session(auth()->id())->getTotal() }}
    </h3>

    <div class="row">
        <a name="" class="btn btn-primary mt-3 ml-auto" href="{{ route('cart.checkout') }}" style="background: #ff7e03;" role="button">
            Proceed
            <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>



</div>


@endsection