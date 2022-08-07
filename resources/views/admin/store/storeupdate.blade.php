@extends('layouts.adminstore')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edite Store') }}</div>
                <div class="card-body">
                    {{-- <div class="container"> --}}
                        <div class="row">
                            <div class="mb-3 col-6 ">
                                <label for="exampleFormControlInput1" class="form-label">Store Name</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" value="{{$store->name}}" placeholder="name@example.com">
                              </div>
                              <div class="mb-3 col-6">
                                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                <input class="form-control" id="exampleFormControlTextarea1" ></input>
                              </div>
                              <div class="mb-3 col-6 ">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" value="{{$store->name}}" placeholder="name@example.com">
                              </div>
                              <div class="mb-3 col-6">
                                <label for="exampleFormControlTextarea1" class="form-label">store address</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" ></textarea>
                              </div>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
