@extends('layouts.master')
@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Show Brands</h3>
        <a class="btn btn-success btn-sm" href="{{ route('admin.brands.index') }}">List brands</a>
    </div>
    
    <div class="form-group">
        <label>Id</label>
        <input type="text" name="name" class="form-control" value="{{ $brand->id }}" disabled>
    </div>

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $brand->name }}" disabled>
    </div>

    <div class="form-group">
        <label>slug</label>
        <input type="integer" name="store_id" class="form-control" value="{{ $brand->slug}}" disabled>
    </div>
    
    <div class="form-group">
        <label>logo</label>
        <input type="text" name="category_id" class="form-control" value="{{ $brand->logo }}" disabled>
    </div>
    
@endsection
