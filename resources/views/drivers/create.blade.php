@extends('layouts.app', ['title' => __('qrlanding.drivers-management')])

@section('content')
    @include('drivers.partials.header', ['title' => __('qrlanding.add-driver')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('qrlanding.drivers-anagement') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('drivers.index') }}" class="btn btn-sm btn-primary">{{ __('qrlanding.back-to-list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ __('qrlanding.driver-information') }}</h6>
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('drivers.store') }}" autocomplete="off">
                                @csrf
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="name_driver">{{ __('qrlanding.driver-name') }}</label>
                                        <input type="text" name="name_driver" id="name_driver" class="form-control form-control-alternative{{ $errors->has('name_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('qrlanding.driver-name') }}" value="" required>
                                        @if ($errors->has('name_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="email_driver">{{ __('qrlanding.driver-email') }}</label>
                                        <input type="email" name="email_driver" id="email_driver" class="form-control form-control-alternative{{ $errors->has('email_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('qrlanding.driver-email') }}" value="" required>
                                        @if ($errors->has('email_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('phone_driver') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="phone_driver">{{ __('qrlanding.driver-phone') }}</label>
                                        <input type="text" name="phone_driver" id="phone_driver" class="form-control form-control-alternative{{ $errors->has('phone_driver') ? ' is-invalid' : '' }}" placeholder="{{ __('qrlanding.driver-phone') }}" value="" required>
                                        @if ($errors->has('phone_driver'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone_driver') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('qrlanding.save') }}</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
