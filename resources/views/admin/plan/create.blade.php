<h1>this is create function for plan</h1>
@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Create Plan </h3>
        <a class="btn btn-success btn-sm" href="{{ route('admin.plan.index') }}">List Plan</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <form action="{{ route('admin.brands.store') }}" method="POST">

        @csrf
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label>Id</label>
                                <input type="text" name="id" class="form-control" placeholder=" id">
                            </div>
        
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="form-group">

            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="plan name">
        </div>

        <div class="form-group">
            <label>stripe_plan</label>
            <input type="text" name="name" class="form-control" placeholder="stripe_plan">
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
                            <label>description</label>
                            <input type="text" name="logo" class="form-control" placeholder="Description">
                           
                        </div>
                        
                    </div>
                          </div>

       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
