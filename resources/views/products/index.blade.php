{{-- @extends('layouts.app') --}}
@extends('template.app')

@section('content')
<div class="container mt-5" style="min-height: 100vh;">

    <h2 class="text-center" style="background:#000000 ; color: white;  padding: 7px;">Get your products on the list!</h2>

    <!-- Create button -->
    <div class="row justify-content-center">
        <div class="col-md-8 my-3">
            <a href="{{ route('vendor.create') }}" class="btn btn-success"> Upload New Product</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-secondary" style="    border-radius: 15px;">
                <div class="card-header">{{ __('Item List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} <br>
                    {{ __('Your Products') }}

                </div>

                @if ($message=Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <!--Table List -->
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_title }}</td>
                            <td>{{ $product->product_description }}</td>
                            <td>
                                <form action="{{ route('vendor.destroy', $product->id) }}" method='POST'>
                                    <a href="{{ route('vendor.show', $product->id) }}" class="btn btn-info">Show</a>
                                    <a href="{{ route('vendor.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>
@endsection