@extends('layouts.master')

@section('content')

    <div class="col-md-6 text-right">
        
        <a class="btn btn-info" href="{{route('admin.brands.create')}}"> <i class="fa fa-plus"></i> New Brand </a>
        
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>slug</th>
            <th>logo</th>
           <th>Action</th>
            
        </tr>
        </thead>
        <tbody>

        @foreach($brands as $brand)
            <tr>
               <td>{{$brand->id}}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->slug }}</td>
                <td>{{ $brand->logo }}</td>
                <td>
                    <a href="{{ route('admin.brands.edit', ['id' => $brand->id]) }}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{ route('admin.brands.show', ['id' => $brand->id]) }}" class="btn btn-info btn-sm">Show</a>
                    
                    <form action="{{ route('admin.brands.delete', ['id' => $brand->id]) }}" method="POST" class="d-inline-block">
                        @csrf
                                 <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                 </td> 
            </tr>
        @endforeach

        </tbody>
    </table>



@endsection
