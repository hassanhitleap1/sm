<!-- Fee Info -->
<div class="col-5">
    <div class="card  bg-secondary shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">{{ __('qrlanding.fee-information') }}</h3>
                </div>
                <div class="col-4 text-right">
                </div>
            </div>
        </div>
        <div class="card-body">
            <p>
                {{ __('Your current static fee on each order is:')}}  @money( $restaurant->static_fee, env('CASHIER_CURRENCY','usd'),env('DO_CONVERTION',true))<br />
                {{ __('Your current percentage fee on each order is:').' '.$restaurant->fee."% ".__('qrlanding.on-the-order-value')}} <br />
                <hr />
                <b>{{__('qrlanding.fees').": ".$restaurant->fee."% + "}} @money($restaurant->static_fee, env('CASHIER_CURRENCY','usd'),env('DO_CONVERTION',true))</b>
            </p>
        </div>
    </div>
</div>
