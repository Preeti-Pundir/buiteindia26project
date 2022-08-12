@extends('layouts.planapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Plans</div>
              
                 <a href="" class="btn btn-outline-dark pull-right">Choose</a>

                {{--{ route('plan.show', $plan->slug) }} --}}
                {{-- <a class="btn btn-info" href="{{route('admin.plan.create')}}"> <i class="fa fa-plus"></i> New Product </a> --}}

                <div class="card-body">

                    @if(session()->has('success'))
                        <label class="alert alert-success w-100">{{session('success')}}</label>
                    @elseif(session()->has('error'))
                        <label class="alert alert-danger w-100">{{session('error')}}</label>
                    @endif


                    <ul class="list-group">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>stripe_plan</th>
                                <th>slug</th>
                                <th>description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        @foreach($plans as $plan)
                            <tr>
                       
                                <td>{{$plan->id}}</td>
                                <td>{{ $plan->name }}</td>
                                <td>${{ number_format($plan->cost, 2) }} monthly</td>
                                <td>{{ $plan->slug }} </td>
                                <td>{{ $plan->description }}</td>
                               
                             <td>   
                                  {{-- <a href="{{ route('admin.plans.show', ['id' => $plan->id]) }}" class="btn btn-outline-dark pull-right">Choose</a>
                                   --}}
                            </td>
                            
                             </tr>
                            
                        @endforeach
                    </tbody>
                                 {{-- <a href="{{ route('admin.plans.show', ['id' => $plan->id]) }}" class="btn btn-info btn-sm">Show</a>
                    --}}
                </table>
                            {{-- @if(!auth()->user()->subscribedToPlan($plan->stripe_plan, 'main'))
                                <a href="{{ route('plan.show', $plan->slug) }}" class="btn btn-outline-dark pull-right">Choose</a>
                            @endif --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection