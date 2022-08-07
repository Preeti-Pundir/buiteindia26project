@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Edit Product</h3>
        <a class="btn btn-success btn-sm" href="{{ route('admin.product.index') }}">List Products</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif
    @foreach ($products as $product )
    <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="product name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label>Store_id</label>
            <input type="color" name="color" class="form-control" placeholder="product Store_id" value="{{ $product->Store_id }}">
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>categury_id</label>
                            <input type="text" name="weight" class="form-control" placeholder="product categury_id" value="{{ $product->categury_id }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>brand_id</label>
                            <input type="text" name="brand_id" class="form-control" placeholder="brand_id" value="{{ $product->brand_id }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" placeholder="product price" value="{{ $product->price }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Disc</label>
            <textarea name="description" rows="5" placeholder="product description" class="form-control">{{ $product->disc }}</textarea>
        </div>

    @endforeach
  
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection