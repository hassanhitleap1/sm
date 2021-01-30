@extends('layouts.app', ['title' => __('qrlanding.drivers-management')])

@section('content')
    @include('drivers.partials.header', ['title' => __('qrlanding.edit-driver')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('qrlanding.driver-management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('drivers.index') }}" class="btn btn-sm btn-primary">{{ __('qrlanding.back-to-list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="pl-lg-4">
                                <form method="post" action="{{ route('drivers.update', $driver) }}" autocomplete="off">
                                    @csrf
                                    @method('put')

                                </form>
                                </div>


                                <hr />
                                <h6 class="heading-small text-muted mb-4">{{ __('qrlanding.driver-information') }}</h6>
                            <div class="pl-lg-4">


                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('qrlanding.driver-name') }}</label>
                                    <input type="text" name="name_driver" id="input-name" class="form-control form-control-alternative" placeholder="{{ __('Driver Name') }}" value="{{ old('name', $driver->name) }}" readonly>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('qrlanding.driver-email') }}</label>
                                    <input type="text" name="email_driver" id="input-name" class="form-control form-control-alternative" placeholder="{{ __('Driver Email') }}" value="{{ old('name', $driver->email) }}" readonly>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('qrlanding.driver-phone') }}</label>
                                    <input type="text" name="phone_driver" id="input-name" class="form-control form-control-alternative" placeholder="{{ __('qrlanding.driver-phone') }}" value="{{ old('name', $driver->phone) }}" readonly>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
