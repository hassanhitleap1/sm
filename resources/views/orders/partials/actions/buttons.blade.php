@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('owner') || auth()->user()->hasRole('driver'))
<?php
$lastStatusAlisas=$order->status->pluck('alias')->last();
?>
<div class="card-footer py-4">
    <h6 class="heading-small text-muted mb-4">{{ __('Actions') }}</h6   >
    <nav class="justify-content-end" aria-label="...">
    @role('admin')
        <script>
            function setSelectedOrderId(id){
                $("#form-assing-driver").attr("action", "/updatestatus/assigned_to_driver/"+id);
            }
        </script>
        @if($lastStatusAlisas == "just_created")
            <a href="{{ url('updatestatus/accepted_by_admin/'.$order->id) }}" class="btn btn-primary">{{ __('qrlanding.accept') }}</a>
            <a href="{{ url('updatestatus/rejected_by_admin/'.$order->id) }}" class="btn btn-danger">{{ __('qrlanding.reject') }}</a>
        
        @elseif($lastStatusAlisas == "accepted_by_restaurant"&&$order->delivery_method.""!="2")
            <button type="button" class="btn btn-primary" onClick=(setSelectedOrderId({{ $order->id }}))  data-toggle="modal" data-target="#modal-asign-driver">{{ __('qrlanding.assign-to-driver') }}</button>
        @elseif($lastStatusAlisas == "rejected_by_driver"&&$order->delivery_method.""!="2")
            <button type="button" class="btn btn-primary" onClick=(setSelectedOrderId({{ $order->id }}))  data-toggle="modal" data-target="#modal-asign-driver">{{ __('qrlanding.assign-to-driver') }}</button>
        @elseif($lastStatusAlisas == "prepared"&&$order->delivery_method.""!="2"&&$order->driver==null)
            <button type="button" class="btn btn-primary" onClick=(setSelectedOrderId({{ $order->id }}))  data-toggle="modal" data-target="#modal-asign-driver">{{ __('qrlanding.assign-to-driver') }}</button>
        @else
            <p>{{ __('No actions for you right now!') }}</p>
       @endif
    @endrole
    @role('owner')
        @if(config('app.isft'))
            @if($lastStatusAlisas == "accepted_by_admin")
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-time-to-prepare">{{ __('qrlanding.accept') }}</button>
                <a href="{{ url('updatestatus/rejected_by_restaurant/'.$order->id) }}" class="btn btn-danger">{{ __('Reject') }}</a>
            @elseif($lastStatusAlisas == "assigned_to_driver"||$lastStatusAlisas == "accepted_by_restaurant"||$lastStatusAlisas == "accepted_by_driver"||$lastStatusAlisas == "rejected_by_restaurant")
                <a href="{{ url('updatestatus/prepared/'.$order->id) }}" class="btn btn-primary">{{ __('qrlanding.prepared') }}</a>
            @elseif($lastStatusAlisas == "accepted_by_restaurant")
                <a href="{{ url('updatestatus/prepared/'.$order->id) }}" class="btn btn-primary">{{ __('qrlanding.prepared') }}</a>
            @elseif(config('app.allow_self_deliver')&&$lastStatusAlisas == "prepared")
                <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-primary">{{ __('qrlanding.delivered') }}</a>
            @elseif($lastStatusAlisas == "prepared"&&$order->delivery_method.""=="2")
                <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-primary">{{ __('qrlanding.delivered') }}</a>
            @else
                <p>{{ __('No actions for you right now!') }}</p>
            @endif
        @else
        
            @if($lastStatusAlisas == "just_created")
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-time-to-prepare">{{ __('qrlanding.accept') }}</button>
                <a href="{{ url('updatestatus/rejected_by_restaurant/'.$order->id) }}" class="btn btn-danger">{{ __('qrlanding.reject') }}</a>
            @elseif($lastStatusAlisas == "accepted_by_restaurant")
                <a href="{{ url('updatestatus/prepared/'.$order->id) }}" class="btn btn-primary">{{ __('qrlanding.prepared') }}</a>
            @elseif($lastStatusAlisas == "prepared")
                <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-primary">{{ __('qrlanding.delivered') }}</a>
            @elseif($lastStatusAlisas == "delivered")
                <a href="{{ url('updatestatus/closed/'.$order->id) }}" class="btn btn-danger">{{ __('qrlanding.close') }}</a>
            @elseif($lastStatusAlisas == "updated")
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-time-to-prepare">{{ __('qrlanding.accept') }}</button>
                <a href="{{ url('updatestatus/rejected_by_restaurant/'.$order->id) }}" class="btn btn-danger">{{ __('qrlanding.reject') }}</a>
            @else
                <p>{{ __('qrlanding.no-actions-for-you-right-now') }}</p>
            @endif

        @endif

    @endrole
    @role('driver')
        @if($lastStatusAlisas == "prepared")
            <a href="{{ url('updatestatus/picked_up/'.$order->id) }}" class="btn btn-primary">{{ __('qrlanding.picked-up') }}</a>
        @elseif($lastStatusAlisas == "picked_up")
            <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-primary">{{ __('qrlanding.delivered') }}</a>
        @else
            <p>{{ __('qrlanding.no-actions-for-you-right-now') }}</p>
        @endif
    @endrole
    </nav>
</div>
@endif
