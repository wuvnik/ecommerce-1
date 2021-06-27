{{-- @extends('layouts.app') --}}
@extends('template.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 my-3">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="text-center">
                    <h2>Add new product</h2>
                </div>
            </div>
        </div>
        
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
        
        <form action="{{ route('vendor.store') }}" method="POST" 
        enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product name:</strong>
                        <input type="text" name="product_name" class="form-control" placeholder="Product name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product title:</strong>
                        <input type="text" name="product_title" class="form-control" placeholder="Title">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product description:</strong>
                        <input type="text" name="product_description" class="form-control" placeholder="Description">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price:</strong>
                        <input type="integer" name="product_price" class="form-control" placeholder="Price">
                    </div>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Product picture:</strong>
                        <input type="file" name="image_path" class="form-control">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Stock:</strong>
                        <input type="integer" name="stock" class="form-control" placeholder="Stock quantity">
                    </div>
                </div>

                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Vendor id:</strong>
                        <input type="" name="seller_id" class="form-control" placeholder="">
                    </div>
                </div> --}}

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <a href="{{ route('vendor.index') }}" class="btn btn-primary ">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>

                {{-- <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <button type="submit" class="btn btn-primary ">Submit</button>
                    </div>
                </div> --}}

                {{-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <a href="{{ route('products.index') }}" class="btn btn-primary float-left">Back</a>
                </div>
        
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div> --}}
            </div>
        </form>

    </div>
</div>

@endsection