@extends('layouts.master')

@section('content')

    <div class="col-md-6 text-right">
        
        <a class="btn btn-info" href="{{route('admin.product.create')}}"> <i class="fa fa-plus"></i> New Product </a>
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
            <th>store_id</th>
            <th>categury_id</th>
            <th>brand_id</th>
            <th>price</th>
            <th>disc</th>

            {{-- <th>Created At</th> --}}
            <th>Action</th>
            
        </tr>
        </thead>
        <tbody>

        @foreach($products as $product)
            <tr>
               <td>{{$product->id}}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->store_id }}</td>
                <td>{{ $product->categury_id }}</td>
                <td>{{ $product->brand_id }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->disc}}</td>
                {{-- <td>{{ $product->created_at }}</td> --}}
                
               

                <td>
                    <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{ route('admin.product.show', ['id' => $product->id]) }}" class="btn btn-info btn-sm">Show</a>
                    <form action="{{ route('admin.product.delete', ['id' => $product->id]) }}" method="POST" class="d-inline-block">
                        @csrf
                                 <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                 </td> 
            </tr>
        @endforeach

        </tbody>
    </table>

    {{-- <div class="d-flex justify-content-between">
        {{ $product->render() }}
    </div> --}}

@endsection
