@extends('general.index', $setup);
@section('thead')
    <th>{{ __('qrlanding.name') }}</th>
    <th>{{ __('qrlanding.short-name') }}</th>
    <th>{{ __('qrlanding.actions') }}</th>
@endsection
@section('tbody')
@foreach ($setup['items'] as $item)
<tr>
    <td>{{ $item->name }}</td>
    <td>{{ $item->alias }}</td>
    <td><a href="{{ route("cities.edit",["city"=>$item->id]) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a><a href="{{ route("cities.delete",["city"=>$item->id]) }}" class="btn btn-danger btn-sm">{{ __('qrlanding.delete') }}</a></td>
</tr> 
@endforeach

@endsection
