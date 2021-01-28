@extends('layouts.app', ['title' => __('qrlanding.orders')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-7 ">
                <br/>
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ "#".$order->id." - ".$order->created_at->format(env('DATETIME_DISPLAY_FORMAT','d M Y H:i')) }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                   @include('orders.partials.orderinfo')
                   @include('orders.partials.actions.buttons',['order'=>$order])
                </div>
            </div>
            <div class="col-xl-5  mb-5 mb-xl-0">
                @if(config('app.isft'))
                <br/>
                <div class="card card-profile shadow">
                    <div class="card-header">
                        <h5 class="h3 mb-0">{{ __("qrlanding.order-tracking")}}</h5>
                    </div>
                    <div class="card-body">
                        @include('orders.partials.map',['order'=>$order])
                    </div>
                </div>
                @endif
                <br/>
                <div class="card card-profile shadow">
                    <div class="card-header">
                        <h5 class="h3 mb-0">{{ __("qrlanding.status-history")}}</h5>
                    </div>
                    @include('orders.partials.orderstatus')
                    
                </div>
                @role('client')
                @if($order->status->pluck('alias')->last() == "delivered")
                    <br/>
                    @include('orders.partials.rating',['order'=>$order])
                @endif
                @endrole
            </div>
        </div>
        @include('layouts.footers.auth')
        @include('orders.partials.modals',['order'=>$order])
    </div>
@endsection

@section('head')
    <link type="text/css" href="{{ asset('custom') }}/css/rating.css" rel="stylesheet">
@endsection

@section('js')
<!-- Google Map -->
<script async defer src= "https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=<?php echo env('GOOGLE_MAPS_API_KEY',''); ?>"> </script>
  

    <script src="{{ asset('custom') }}/js/ratings.js"></script>
@endsection

