{{-- @extends('layouts.app') --}}
@extends('template.app')

@section('content')

<div class="container">


<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Edit Item') }}</div>
            <div class="card-body">


@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Somethings is wrong <br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            
        @endforeach
    </ul>
</div>
@endif

@foreach ($product as $product)
<form action="{{ route('vendor.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product name:</strong>
                    <input type="text" name="product_name" value="{{ $product->product_name }}" 
                    class="form-control" placeholder="Product name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product title:</strong>
                    <input type="text" name="product_title" value="{{ $product->product_title }}" 
                    class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product description:</strong>
                    <input type="text" name="product_description" value="{{ $product->product_description }}" 
                    class="form-control" placeholder="Description">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="integer" name="product_price" value="{{ $product->product_price }}" 
                    class="form-control" placeholder="Price">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product picture:</strong>
                    <input type="file" name="image_path" 
                    value="{{ $product->image_path }}" 
                    class="form-control">

                    <img src="{{ asset('images/' .$product->image_path) }}" 
                    class="w-50 my-5 shadow-xl text-center"
                    alt="Product Image">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stock:</strong>
                    <input type="integer" name="stock" value="{{ $product->stock }}" 
                    class="form-control" placeholder="Stock quantity">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <a href="{{ route('vendor.index') }}" class="btn btn-primary ">Back</a>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>

    </div>
</form>
@endforeach

            </div>
        </div>
    </div>
</div>

</div>
@endsection