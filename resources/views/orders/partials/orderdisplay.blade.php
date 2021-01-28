<thead class="thead-light">
    <tr>
        <th scope="col">{{ __('ID') }}</th>
        @hasrole('admin|driver')
            <th scope="col">{{ __('qrlanding.restaurant') }}</th>
        @endhasrole
        <th class="table-web" scope="col">{{ __('qrlanding.created') }}</th>
        <th class="table-web" scope="col">{{ __('qrlanding.time-slot') }}</th>
        <th class="table-web" scope="col">{{ __('qrlanding.method') }}</th>
        <th scope="col">{{ __('Last status') }}</th>
        @hasrole('admin|owner|driver')
            <th class="table-web" scope="col">{{ __('qrlanding.client') }}</th>
        @endhasrole
        @role('admin')
            <th class="table-web" scope="col">{{ __('qrlanding.address') }}</th>
        @endrole
        @role('owner')
            <th class="table-web" scope="col">{{ __('qrlanding.items') }}</th>
        @endrole
        @hasrole('admin|owner')
            <th class="table-web" scope="col">{{ __('qrlanding.driver') }}</th>
        @endhasrole
        <th class="table-web" scope="col">{{ __('qrlanding.price') }}</th>
        <th class="table-web" scope="col">{{ __('qrlanding.delivery') }}</th>
        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('owner') || auth()->user()->hasRole('driver'))
            <th scope="col">{{ __('qrlanding.actions') }}</th>
        @endif
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
        {{ $order->time_formated }}
    </td>
    <td class="table-web">
        @if ($order->delivery_method==1)
            <span class="badge badge-primary badge-pill">{{ __('qrlanding.delivery') }}</span>
        @else
            <span class="badge badge-success badge-pill">{{ __('qrlanding.pickup') }}</span>
        @endif

    </td>
    <td>
        @include('orders.partials.laststatus')
    </td>
    @hasrole('admin|owner|driver')
    <td class="table-web">
       {{ $order->client->name }}
    </td>
    @endhasrole
    @role('admin')
        <td class="table-web">
            {{ $order->address?$order->address->address:"" }}
        </td>
    @endrole
    @role('owner')
        <td class="table-web">
            {{ count($order->items) }}
        </td>
    @endrole
    @hasrole('admin|owner')
        <td class="table-web">
            {{ !empty($order->driver->name) ? $order->driver->name : "" }}
        </td>
    @endhasrole
    <td class="table-web">
        @money( $order->order_price, env('CASHIER_CURRENCY','usd'),env('DO_CONVERTION',true))

    </td>
    <td class="table-web">
        @money( $order->delivery_price, env('CASHIER_CURRENCY','usd'),env('DO_CONVERTION',true))
    </td>
    @include('orders.partials.actions.table',['order' => $order ])
</tr>
@endforeach
</tbody>
