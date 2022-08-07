@extends('layouts.master')

@section('content')

    <div class="col-md-6 text-right">
        
        <a class="btn btn-info" href="{{route('admin.stores.create')}}"> <i class="fa fa-plus"></i> New stores </a>
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
            <th>store_code</th>
            <th>address</th>
            <th>city</th>
            {{-- <th></th> --}}
            {{-- <th>Created At</th> --}}
            <th>Action</th>
            
        </tr>
        </thead>
        <tbody>

        @foreach($stores as $store)
            <tr>
               <td>{{$store->id}}</td>
                <td>{{ $store->name }}</td>
                <td>{{ $store->store_id }}</td>
                <td>{{ $store->address }}</td>
                <td>{{ $store->city }}</td>
                {{-- <td>{{ $store->disc}}</td> --}}
                {{-- <td>{{ $product->created_at }}</td> --}}
                
               

                <td>
                    <a href="{{ route('admin.stores.edit', ['id' => $store->id]) }}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{ route('admin.stores.show', ['id' => $store->id]) }}" class="btn btn-info btn-sm">Show</a>
                    <form action="{{ route('admin.stores.delete', ['id' => $store->id]) }}" method="POST" class="d-inline-block">
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
