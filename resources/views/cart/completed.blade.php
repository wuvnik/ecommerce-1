{{-- @extends('layouts.app') --}}
@extends('template.app')
@section('content')
<div class="container my-5"
style="min-height: 44vh;" 
{{-- style="height:calc(100vh-234.8px);" --}}
>
    <h5 class="text-center" style="background:#000000 ; color: white;  padding: 7px;">Your Order</h5>

    <table class="table mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order Number</th>
                <th>Name</th>
                <th>Status</th>
                <th>Price</th>
            </tr>
        </thead>

        @foreach ($completes as $complete)
        <tr>
        <td>{{ $complete->id }}</td>
        <td>{{ $complete->order_number }}</td>
        <td>{{ $complete->shipping_fullname }}</td>
        <td>{{ $complete->status }}</td>
        <td>{{ $complete->grand_total }}</td>
        </tr>
        @endforeach

    </table>





</div>


@endsection