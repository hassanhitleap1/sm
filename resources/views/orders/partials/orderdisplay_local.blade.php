<thead class="thead-light">
    <tr>
        <th scope="col">{{ __('qrlanding.ID') }}</th>
        @hasrole('admin')
            <th scope="col">{{ __('qrlanding.restaurant') }}</th>
        @endhasrole
        <th class="table-web" scope="col">{{ __('qrlanding.created') }}</th>
        <th class="table-web" scope="col">{{ __('qrlanding.table-method') }}</th>
        <th class="table-web" scope="col">{{ __('qrlanding.items') }}</th>
        <th class="table-web" scope="col">{{ __('qrlanding.price') }}</th>
        <th scope="col">{{ __('qrlanding.last-status') }}</th>
        <th scope="col">{{ __('qrlanding.actions') }}</th>
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
        @if( $order->table)
            {{  $order->table->restoarea?$order->table->restoarea->name." - ".$order->table->name:$order->table->name }}
        @else
            {{ __('qrlanding.takeaway')}}
        @endif
    </td>
    <td class="table-web">
        {{ count($order->items) }}
    </td>
    <td class="table-web">
        @money( $order->order_price, env('CASHIER_CURRENCY','usd'),env('DO_CONVERTION',true))
    </td>
    <td>
        @include('orders.partials.laststatus')
    </td>
    @include('orders.partials.actions.table',['order' => $order ])
</tr>
@endforeach
</tbody>
