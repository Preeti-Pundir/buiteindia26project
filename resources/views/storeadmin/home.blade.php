@extends('layouts.store')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                    <li>
                        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.brands.index' ? 'active' : '' }}" href="{{ route('admin.brands.index') }}">
                           
                            
                            <i class="app-menu__icon fa fa-briefcase"></i>
                            <span class="app-menu__label">Brands</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.product.index' ? 'active' : '' }}" href="{{ route('admin.product.index') }}">
                            <i class="app-menu__icon fa fa-briefcase"></i> 
                            <span class="app-menu__label">Product</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.stores.index' ? 'active' : '' }}" href="{{ route('admin.stores.index') }}">
                            <i class="app-menu__icon fa fa-briefcase"></i> 
                            <span class="app-menu__label">Stores</span>
                        </a>
                    </li>
                    <li>
                          <a class="app-menu__item {{ Route::currentRouteName() == 'customer.index' ? 'active' : '' }}" href="{{ route('customer.index') }}">
                            
                            <i class="app-menu__icon fa fa-briefcase"></i> 
                            <span class="app-menu__label">customer </span>
                        </a>
                    </li>

                    {{-- <li>
                        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.plan.index' ? 'active' : '' }}" href="{{ route('admin.plan.index') }}">
                            <i class="app-menu__icon fa fa-briefcase"></i> 
                            <span class="app-menu__label">Payment</span>
                        </a>
                    </li> --}}


                    <li>
                        <a class="app-menu__item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
                            <i class="app-menu__icon fa fa-bar-chart"></i>
                            <span class="app-menu__label">Orders</span>
                        </a>
                    </li>
                   

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Store Home') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
