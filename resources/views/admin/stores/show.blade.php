@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Show Stores</h3>
        <a class="btn btn-success btn-sm" href="{{ route('admin.stores.index') }}">List stores</a>
    </div>
    
  
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $store->name }}" disabled>
    </div>
    <div class="form-group">
        <label>store_code</label>
        <input type="integer" name="store_id" class="form-control" value="{{ $store->store_code}}" disabled>
    </div>
    <div class="form-group">
        <label>address</label>
        <input type="text" name="address" class="form-control" value="{{ $store->address }}" disabled>
    </div>
    <div class="form-group">
        <label>city</label>
        <input type="integer" name="city" class="form-control" value="{{ $store->city }}" disabled>
    </div>
    
@endsection
