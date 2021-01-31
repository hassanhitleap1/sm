@extends('layouts.front', ['title' => __('qrlanding.user-profile')])
@if (strlen(env('RECAPTCHA_SITE_KEY',""))>2)
    @section('head')
    {!! htmlScriptTagJsApi([]) !!}
    @endsection
@endif

@section('content')
    @include('users.partials.header', [
        'title' => __(''),
    ])


    <div class="container-fluid mt--7">
        <div class="row">

            </div>
            <div class="col-xl-8 offset-xl-2">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('qrlanding.register-your-restaurant') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form  id="registerform" method="post" action="{{ route('newrestaurant.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('qrlanding.restaurant-information') }}</h6>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="name">{{ __('qrlanding.restaurant-name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Restaurant Name here') }} ..." value="{{ isset($_GET["name"])?$_GET['name']:""}}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4">{{ __('qrlanding.owner-information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name_owner') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="name_owner">{{ __('qrlanding.owner-name') }}</label>
                                    <input type="text" name="name_owner" id="name_owner" class="form-control form-control-alternative{{ $errors->has('name_owner') ? ' is-invalid' : '' }}" placeholder="{{ __('qrlanding.owner-name') }} ..." value="{{ isset($_GET["name"])?$_GET['name']:""}}" required autofocus>

                                    @if ($errors->has('name_owner'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name_owner') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email_owner') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="email_owner">{{ __('qrlanding.owner-email') }}</label>
                                    <input type="email" name="email_owner" id="email_owner" class="form-control form-control-alternative{{ $errors->has('email_owner') ? ' is-invalid' : '' }}" placeholder="{{ __('qrlanding.owner-email') }} ..." value="{{ isset($_GET["email"])?$_GET['email']:""}}" required autofocus>

                                    @if ($errors->has('email_owner'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email_owner') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('phone_owner') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="phone_owner">{{ __('qrlanding.owner-phone') }}</label>
                                    <input type="text" name="phone_owner" id="phone_owner" class="form-control form-control-alternative{{ $errors->has('phone_owner') ? ' is-invalid' : '' }}" placeholder="{{ __('qrlanding.owner-phone') }} ..." value="{{ isset($_GET["phone"])?$_GET['phone']:""}}" required autofocus>

                                    @if ($errors->has('phone_owner'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone_owner') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    @if (strlen(env('RECAPTCHA_SITE_KEY',""))>2)
                                        @if ($errors->has('g-recaptcha-response'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                        @endif

                                        {!! htmlFormButton(__('qrlanding.save'), ['id'=>'thesubmitbtn','class' => 'btn btn-success mt-4']) !!}
                                    @else
                                        <button type="submit" id="thesubmitbtn" class="btn btn-success mt-4">{{__('qrlanding.save')}}</button>
                                    @endif


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br/>
    </div>
@endsection

@section('js')
@if (isset($_GET['name'])&&$errors->isEmpty())
<script>
    "use strict";
    document.getElementById("thesubmitbtn").click();
</script>
@endif
@endsection
