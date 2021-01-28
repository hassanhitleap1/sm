<thead class="thead-light">
    <tr>
        <th scope="col">{{ __('ID') }}</th>
        @hasrole('admin|driver')
            <th scope="col">{{ __('qrlanding.restaurant') }}</th>
        @endhasrole
        <th class="table-web" scope="col">{{ __('qrlanding.created') }}</th>
        <th class="table-web" scope="col">{{ __('qrlanding.method') }}</th>

        <th class="table-web" scope="col">{{ __('qrlanding.platform-fee') }}</th>
        <th class="table-web" scope="col">{{ __('qrlanding.processor-fee') }}</th>
        <th class="table-web" scope="col">{{ __('qrlanding.delivery') }}</th>
        <th class="table-web" scope="col">{{ __('qrlanding.net-price+VAT') }}</th>
        <th class="table-web" scope="col">{{ __('qrlanding.VAT') }}</th>
        <th class="table-web" scope="col">{{ __('qrlanding.net-price') }}</th>
        
        
        <th class="table-web" scope="col">{{ __('qrlanding.total-price') }}</th>
        
    </tr>
</thead>
<tbody>
@foreach($orders as $order)
<tr>
    <td>
        
        <a class="btn badge badge-success badge-pill" href="{{ route('orders.show',$order->id )}}">#{{ $order->id }}</a>
    </td>
    @hasrole('admin|driver')
    <th scope="row">
        <div class="media align-items-center">
            <a class="avatar-custom mr-3">
                <img class="rounded" alt="..." src={{ $order->restorant->icon }}>
            </a>
            <div class="media-body">
                <span class="mb-0 text-sm">{{ $order->restorant->name }}</span>
            </div>
        </div>
    </th>
    @endhasrole

    <td class="table-web">
        {{ $order->created_at->format(env('DATETIME_DISPLAY_FORMAT','d M Y H:i')) }}
    </td>
    <td class="table-web">
        @if ($order->delivery_method==1)
            <span class="badge badge-primary badge-pill">{{ __('qrlanding.delivery') }} | {{ __($order->payment_method) }} </span>
        @else
            <span class="badge badge-success badge-pill">{{ __('qrlanding.pickup') }} | {{ __($order->payment_method) }}</span>
        @endif

    </td>
    
    <td class="table-web">
        @money( $order->fee_value+$order->static_fee, env('CASHIER_CURRENCY','usd'),env('DO_CONVERTION',true))
    </td>
    <td class="table-web">
        @money( $order->payment_processor_fee, env('CASHIER_CURRENCY','usd'),env('DO_CONVERTION',true))
    </td>
    <td class="table-web">
        @money( $order->delivery_price, env('CASHIER_CURRENCY','usd'),env('DO_CONVERTION',true))
    </td>
    <td class="table-web">
        @money( $order->order_price-($order->fee_value+$order->static_fee), env('CASHIER_CURRENCY','usd'),env('DO_CONVERTION',true))
    </td>
    <td class="table-web">
        @money( $order->vatvalue, env('CASHIER_CURRENCY','usd'),env('DO_CONVERTION',true))
    </td>
    <td class="table-web">
        @money( $order->order_price-($order->fee_value+$order->static_fee)-$order->vatvalue, env('CASHIER_CURRENCY','usd'),env('DO_CONVERTION',true))
    </td>

    
   
    <td class="table-web">
        @money( $order->order_price+$order->delivery_price, env('CASHIER_CURRENCY','usd'),env('DO_CONVERTION',true))
    </td>
    
    
</tr>
   

@endforeach
</tbody>
