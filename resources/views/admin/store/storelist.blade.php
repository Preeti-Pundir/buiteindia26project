@extends('layouts.adminstore')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Store') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">status</th>
                            <th scope="col">action</th>
                            <th scope="col">contact</th>
                          </tr>
                        </thead>
                        @php
                         $i=1;
                         function statuscheck($status)
                         {
                            # code...
                            if (!$status) {
                                # code...
                                return "<span class='text-danger'>deactive</span>";
                            }
                            return '<span class="text-success">active</span>';
                         }
                        @endphp
                        <tbody>
                            @foreach ($store as $stores)
                            <tr>
                              <th scope="row">{{$i}}</th>
                              <td> {{__($stores->name)}} </td>
                              <td>{{statuscheck($stores->status)}}</td>
                              <td>
                                <a href="{{url('admin/storedite').'/'.$stores->id}}"  style="text-decoration: none">
                                    <i class="bi bi-pencil-square text-success"></i>
                                </a>
                                  <div class="vr mx-2"></div>
                                <a href="{{url('admin/storedelete').'/'.$stores->id}}"  style="text-decoration: none">
                                    <i class="bi bi-trash-fill text-danger"></i>
                                </a>
                            </td>
                            <td>
                                <a href="mailto:{{$stores->email}}"  style="text-decoration: none">
                                    <i class="bi bi-envelope-paper-fill text-warning"></i>
                                </a>
                                <div class="vr mx-2"></div>
                                <a href="tel:{{$stores->contact_no}}" class="">
                                    <i class="bi bi-telephone-outbound-fill text-primary"></i>
                                </a>
                          </td>
                            </tr>
                        @php
                         $i++
                        @endphp
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
