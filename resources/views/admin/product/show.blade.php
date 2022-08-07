@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Show Product</h3>
        <a class="btn btn-success btn-sm" href="{{ route('admin.product.index') }}">List Products</a>
    </div>
    
  
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" disabled>
    </div>
    <div class="form-group">
        <label>store_id</label>
        <input type="integer" name="store_id" class="form-control" value="{{ $product->store_id}}" disabled>
    </div>
    <div class="form-group">
        <label>Categury_id</label>
        <input type="text" name="category_id" class="form-control" value="{{ $product->Categury_id }}" disabled>
    </div>
    <div class="form-group">
        <label>Brand_id</label>
        <input type="text" name="brand_id" class="form-control" value="{{ $product->brand_id }}" disabled>
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="integer" name="Price" class="form-control" value="{{ $product->Price }}" disabled>
    </div>
    <div class="form-group">
        <label>Disc</label>
        
        <input type="text" name="disc" class="form-control" value="{{ $product->Disc }}" disabled>
    </div>
@endsection
