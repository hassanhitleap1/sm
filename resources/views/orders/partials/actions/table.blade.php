<?php
$lastStatusAlisas=$order->status->pluck('alias')->last();
?>
@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('owner') || auth()->user()->hasRole('driver'))
    @role('admin')
    <script>
        function setSelectedOrderId(id){
            $("#form-assing-driver").attr("action", "updatestatus/assigned_to_driver/"+id);
        }
    </script>
    <td>
        @if($lastStatusAlisas == "just_created")
            <a href="{{'updatestatus/accepted_by_admin/'.$order->id }}" class="btn btn-success btn-sm order-action">{{ __('qrlanding.accept') }}</a>
            <a href="{{'updatestatus/rejected_by_admin/'.$order->id }}" class="btn btn-danger btn-sm order-action">{{ __('qrlanding.reject') }}</a>
        @elseif($lastStatusAlisas == "accepted_by_restaurant"&&$order->delivery_method.""!="2")
            <button type="button" class="btn btn-primary btn-sm order-action" onClick=(setSelectedOrderId({{ $order->id }}))  data-toggle="modal" data-target="#modal-asign-driver">{{ __('qrlanding.assign-to-driver') }}</a>
        @elseif($lastStatusAlisas == "prepared"&&$order->driver==null)
            <button type="button" class="btn btn-primary btn-sm order-action" onClick=(setSelectedOrderId({{ $order->id }}))  data-toggle="modal" data-target="#modal-asign-driver">{{ __('qrlanding.Assign to driver') }}</a>
        @else
            <small>{{ __('qrlanding.no-actions-for-you-right-now') }}</small>
        @endif
    </td>
    @endrole
    @role('owner')
    <td>
        @if(config('app.isft'))
            @if($lastStatusAlisas == "accepted_by_admin")
                <a href="{{ url('updatestatus/accepted_by_restaurant/'.$order->id) }}" class="btn btn-success btn-sm order-action">{{ __('qrlanding.accept') }}</a>
                <a href="{{ url('updatestatus/rejected_by_restaurant/'.$order->id) }}" class="btn btn-danger btn-sm order-action">{{ __('qrlanding.reject') }}</a>
            @elseif($lastStatusAlisas == "assigned_to_driver"||$lastStatusAlisas == "accepted_by_restaurant")
                <a href="{{ url('updatestatus/prepared/'.$order->id) }}" class="btn btn-primary btn-sm order-action">{{ __('qrlanding.prepared') }}</a>
            @elseif(config('app.allow_self_deliver')&&$lastStatusAlisas == "accepted_by_restaurant")
                <a href="{{ url('updatestatus/prepared/'.$order->id) }}" class="btn btn-primary btn-sm order-action">{{ __('qrlanding.prepared') }}</a>
            @elseif(config('app.allow_self_deliver')&&$lastStatusAlisas == "prepared")
                <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-primary btn-sm order-action">{{ __('qrlanding.delivered') }}</a>
            @elseif($lastStatusAlisas == "prepared"&&$order->delivery_method.""=="2")
                <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-primary btn-sm order-action">{{ __('qrlanding.delivered') }}</a>
            @else
                <small>{{ __('No actions for you right now!') }}</small>
            @endif
        @else

        @if($lastStatusAlisas == "just_created")
            <a href="{{ url('updatestatus/accepted_by_restaurant/'.$order->id) }}" class="btn btn-success btn-sm order-action">{{ __('qrlanding.accept') }}</a>
            <a href="{{ url('updatestatus/rejected_by_restaurant/'.$order->id) }}" class="btn btn-sm btn-danger">{{ __('Reject') }}</a>
        @elseif($lastStatusAlisas == "accepted_by_restaurant")
            <a href="{{ url('updatestatus/prepared/'.$order->id) }}" class="btn btn-sm btn-primary">{{ __('qrlanding.prepared') }}</a>
        @elseif($lastStatusAlisas == "prepared")
            <a href="{{ url('updatestatus/delivered/'.$order->id) }}" class="btn btn-sm btn-primary">{{ __('qrlanding.delivered') }}</a>
        @elseif($lastStatusAlisas == "delivered")
            <a href="{{ url('updatestatus/closed/'.$order->id) }}" class="btn btn-sm btn-danger">{{ __('qrlanding.close') }}</a>
        @elseif($lastStatusAlisas == "updated")
            <a href="{{ url('updatestatus/accepted_by_restaurant/'.$order->id) }}" class="btn btn-success btn-sm order-action">{{ __('qrlanding.accept') }}</a>
            <a href="{{ url('updatestatus/rejected_by_restaurant/'.$order->id) }}" class="btn btn-sm btn-danger">{{ __('qrlanding.reject') }}</a>
        @else
            <small>{{ __('qrlanding.no-actions-for-you-right-now') }}</small>
        @endif

        @endif
    </td>
    @endrole
    @role('driver')
    <td>
       @if($lastStatusAlisas == "prepared")
            <a href="{{'updatestatus/picked_up/'.$order->id }}" class="btn btn-primary btn-sm order-action">{{ __('qrlanding.picked-up') }}</a>
        @elseif($lastStatusAlisas == "picked_up")
            <a href="{{'updatestatus/delivered/'.$order->id }}" class="btn btn-primary btn-sm order-action">{{ __('qrlanding.picked-up') }}</a>
        @else
            <small>{{  __('qrlanding.no-actions-for-you-right-now') }}</small>
        @endif
    </td>
    @endrole
@endif
