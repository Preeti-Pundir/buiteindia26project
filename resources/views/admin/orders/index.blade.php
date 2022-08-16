@extends('layouts.app')

{{--@extends('admin.app') 
   @section('title') {{ $pageTitle }} @endsection  
   {{--@section('content') 
   <div class="app-title">
        <div>
            <h1><i class="fa fa-bar-chart"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>  --}}
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- <table class="table table-hover table-bordered" id="sampleTable"> --}}
                        <table class="table table-dark table-hover">
                        <thead>
                        <tr>
                            
                            <th> Order Number </th>
                            <th class="text-center"> placed_by </th>
                            <th class="text-center"> total_amout </th>
                            <th class="text-center"> items_qty </th>
                            <th class="text-center">Payment_status </th>
                            <th class="text-center"> Status </th>
                            <th class='text-center'>Action</th>
                            {{-- <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                               --}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                {{-- <td>{{$orders->placed_by}}</td> --}}
                                <td>{{$order->Placed_By}}</td>
                                {{-- <td>{{ $order->user->fullName }}</td> --}}
                                <td class="text-center">{{ config('settings.currency_symbol') }}{{ $order->total_amout }}</td>
                                <td class="text-center">{{ $order->items_qty }}</td>
                                <td class="text-center">
                                    @if ($order->payment_status == 1)
                                        <span class="badge badge-success">Completed</span>
                                    @else
                                        <span class="badge badge-danger">Not Completed</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-success">{{ $order->status }}</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Second group">
                                        <a href="{{ route('admin.orders.show', $order->order_number) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- </table> --}}
                </div>
            </div>
        </div>
    </div>
{{-- @endsection --}}
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush