@extends('general.index', $setup);
@section('thead')
    <th>{{ __('qrlanding.rating') }}</th>
    <th>{{ __('qrlanding.comment') }}</th>
    <th>{{ __('qrlanding.order') }}</th>
    <th>{{ __('qrlanding.user') }}</th>
    <th>{{ __('qrlanding.actions') }}</th>
@endsection
@section('tbody')
@foreach ($setup['items'] as $item)
<tr>
    <td>{{ $item->rating }}</td>
    <td>{{ $item->comment }}</td>
<td><a href="{{ route('orders.show',['order'=>$item->order->id]) }}">{{ "#".$item->order->id }}</a></td>
    <td>{{ $item->user->name }}</td>
    <td><a href="{{ route("reviews.destroyget",["rating"=>$item->id]) }}" class="btn btn-danger btn-sm">{{ __('qrlanding.delete') }}</a></td>
</tr> 
@endforeach

@endsection
