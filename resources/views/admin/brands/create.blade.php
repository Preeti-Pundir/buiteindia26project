@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Create Product</h3>
        <a class="btn btn-success btn-sm" href="{{ route('admin.brands.index') }}">List brands</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <form action="{{ route('admin.brands.store') }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="name" class="form-control" placeholder="brand id">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="brand name">
        </div>
       
        <div class="form-group">
            <label>Slug</label>
             <input type="text" name="slug" class="form-control" placeholder="Slug"> 
           
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>logo</label>
                            <input type="text" name="logo" class="form-control" placeholder="logo">
                           
                        </div>
                        
                    </div>
                          </div>

       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
