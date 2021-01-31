@extends('layouts.app', ['title' => __('qrlanding.share-menu')])
@section('admin_title')
    {{__('qrlanding.share-menu')}}
@endsection
@section('title')
<title>{{$name}}</title>
@endsection
@if(env('SHARE_THIS_PROPERTY',false))
    @section('head')
        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property={{ env('SHARE_THIS_PROPERTY',"") }}&product=sticky-share-buttons" async="async"></script>
    @endsection
@endisset

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <h2 class="text-uppercase text-center text-muted mb-4">{{ __('qrlanding.share-your-menu-with-your-audience') }}</h2>
                        <div class="pl-lg-4">
                            <div class="sharethis-inline-share-buttons" data-url="{{ $url }}"></div>
                            <div class="text-center mt-6">
                                <img src="{{ 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data='.$url }}" class="image mr-3" alt=""/>
                            </div>
                            <div class="text-center mt-4 mr-3">
                                <a type="button" href="/downloadqr" class="btn btn-success">{{ __('qrlanding.download-QR-code') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
