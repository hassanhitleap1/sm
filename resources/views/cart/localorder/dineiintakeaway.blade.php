<div class="card card-profile shadow">
    <div class="px-4">
      <div class="mt-5">
        <h3>{{ __('qrlanding.dine-in-takeaway') }}<span class="font-weight-light"></span></h3>
      </div>
      <div class="card-content border-top">
        <br />
       
        <div class="custom-control custom-radio mb-3">
          <input name="dineType" class="custom-control-input" id="deliveryTypeDinein" type="radio" value="dinein" checked>
          <label class="custom-control-label" for="deliveryTypeDinein">{{ __('qrlanding.dine-in') }}</label>
        </div>
        <div class="custom-control custom-radio mb-3">
          <input name="dineType" class="custom-control-input" id="deliveryTypeTakeAway" type="radio" value="takeaway">
          <label class="custom-control-label" for="deliveryTypeTakeAway">{{ __('qrlanding.takeaway') }}</label>
        </div>

      </div>
      <br />
      <br />
    </div>
  </div>
  <br />
