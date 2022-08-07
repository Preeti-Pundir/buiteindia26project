@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Create Product</h3>
        <a class="btn btn-success btn-sm" href="{{ route('admin.product.index') }}">List Products</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <form action="{{ route('admin.product.store') }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="product name">
        </div>
       
        <div class="form-group">
            <label>Store_id</label>
             <input type="text" name="store_id" class="form-control" placeholder="Store_id"> 
            {{-- <select class="custom-select" name="category_id" id="category_id" required>
                <option >store_id</option>
                <option value="1">1</option>
                <option value="2">2</option>
                    <option value="3">Other</option>
            </select> --}}
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>categury_id</label>
                            <input type="text" name="categury_id" class="form-control" placeholder="categury_id">
                           
                        </div>
                        {{-- <label for="category_id">categury_id</label>
                                    <select class="custom-select" name="category_id" id="category_id" required>
                                        <option >categury_id</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                            <option value="3">Other</option>
                                    </select> --}}
                    </div>
                    <div class="form-group">
                        <label>brand_id</label>
                        <input type="text" name="brand_id" class="form-control" placeholder="brand_id">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" placeholder="product price">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Disc</label>
            <textarea class="form-control" style="height:150px" name="disc" placeholder="Detail"></textarea>
            {{-- <input type="text" name="Disc" class="form-control" placeholder="product disc"> --}}
                {{-- <textarea name="Disc" placeholder="product Disc" class="form-control"></textarea> --}}
        </div>

        {{-- <div class="form-group">
            <label>created_at</label>
            
            <textarea name="date" placeholder="product description" class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <label>updated_at</label>
            
            <textarea name="updated_at" placeholder="product description" class="form-control"></textarea>
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
