@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Edit Product</h3>
        <a class="btn btn-success btn-sm" href="{{ route('admin.stores.index') }}">List Stores</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif
    @foreach ($stores as $store )
    <form action="{{ route('admin.stores.update', ['id' => $store->id]) }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder=" name" value="{{ $store->name }}">
        </div>
        <div class="form-group">
            <label>Store_code</label>
            <input type="color" name="color" class="form-control" placeholder="Store_code" value="{{ $store->Store_id }}">
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>address</label>
                            <input type="text" name="address" class="form-control" placeholder="address" value="{{ $store->address }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>city</label>
                            <input type="text" name="city" class="form-control" placeholder="city" value="{{ $store->city }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    @endforeach
    
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection