<div class="card card-profile shadow mt--300">
    <div class="px-4">
      <div class="mt-5">
        <h3>{{ __('qrlanding.checkout') }}<span class="font-weight-light"></span></h3>
      </div>
      <div  class="border-top">
        <br />
        <div class="alert alert-danger" role="alert">
           {{ __('Order can not be placed since restaurant will be / is closed.')}}
        </div>
      </div>
      <br />
      <br />
    </div>
  </div>
  <br />

  @if(env('IS_DEMO', false) && env('ENABLE_STRIPE', false))
    @include('cart.democards')    
  @endif
