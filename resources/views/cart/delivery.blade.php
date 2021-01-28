<div class="card card-profile shadow">
    <div class="px-4">
      <div class="mt-5">
        <h3>{{ __('qrlanding.delivery-pickup') }}<span class="font-weight-light"></span></h3>
      </div>
      <div class="card-content border-top">
        <br />

        <div class="custom-control custom-radio mb-3">
          <input name="deliveryType" class="custom-control-input" id="deliveryTypeDeliver" type="radio" value="delivery" checked>
          <label class="custom-control-label" for="deliveryTypeDeliver">{{ __('qrlanding.delivery') }}</label>
        </div>
        <div class="custom-control custom-radio mb-3">
          <input name="deliveryType" class="custom-control-input" id="deliveryTypePickup" type="radio" value="pickup">
          <label class="custom-control-label" for="deliveryTypePickup">{{ __('qrlanding.pickup') }}</label>
        </div>

      </div>
      <br />
      <br />
    </div>
  </div>
  <br />
