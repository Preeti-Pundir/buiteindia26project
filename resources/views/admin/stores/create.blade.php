@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Create Product</h3>
        <a class="btn btn-success btn-sm" href="{{ route('admin.stores.index') }}">List stores</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <form action="{{ route('admin.stores.store') }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="store name">
        </div>
       
        <div class="form-group">
            <label>Store_code</label>
             <input type="text" name="store_code" class="form-control" placeholder="Store_code"> 
           
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>address</label>
                            <input type="text" name="address" class="form-control" placeholder="address">
                           
                        </div>
                        {{-- <label for="category_id">categury_id</label>
                                    <select class="custom-select" name="category_id" id="category_id" required>
                                        <option >categury_id</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                            <option value="3">Other</option>
                                    </select> --}}
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>city</label>
                            <input type="text" name="city" class="form-control" placeholder="city ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
