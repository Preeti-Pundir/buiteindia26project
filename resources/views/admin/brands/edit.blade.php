@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Edit Product</h3>
        <a class="btn btn-success btn-sm" href="{{ route('admin.brands.index') }}">List brands</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif
    @foreach ($products as $product )
    <form action="{{ route('admin.brands.update', ['id' => $brand->id]) }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="name" class="form-control" placeholder="product name" value="{{ $brand->Id }}">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="product name" value="{{ $brand->name }}">
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" placeholder="product slug" value="{{ $brand->Slug }}">
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>logo</label>
                            <input type="text" name="logo" class="form-control" placeholder="product categury_id" value="{{ $brand->logo }}">
                        </div>
                    </div>
                    

    @endforeach
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection