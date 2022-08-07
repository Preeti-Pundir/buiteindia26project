@extends('layouts.planapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Plans</div>
              
                {{-- <a href="" class="btn btn-outline-dark pull-right">Choose</a>
                {{ route('plan.show', $plan->slug) }} --}}
                <div class="card-body">
                    <ul class="list-group">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>stripe_plan</th>
                                <th>description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        @foreach($plans as $plan)
                            <tr>
                       
                                <td>{{$plan->id}}</td>
                                <td>{{ $plan->name }}</td>
                                <td>${{ number_format($plan->cost, 2) }} monthly</td>
                                <td>{{ $plan->description }}</td>
                               
                             <td>   
                                  <a href="{{ route('plan.show', $plan->slug) }}" class="btn btn-outline-dark pull-right">Choose</a>
                            </td>
                            
                             </tr>
                            
                        @endforeach
                    </tbody>
                    <a href="{{ route('plan.show', $plan->slug) }}" class="btn btn-outline-dark pull-right">Choose</a>
                             
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