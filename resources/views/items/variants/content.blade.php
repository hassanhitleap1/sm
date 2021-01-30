@section('thead')
    <th>{{ __('qrlanding.price') }}</th>
    <th>{{ __('qrlanding.options') }}</th>
    <th>{{ __('qrlanding.actions') }}</th>
@endsection
@section('tbody')
@foreach ($setup['items'] as $item)
<tr>
    <td>{{ $item->price }}</td>
    <td>
        {{ $item->optionsList }}
    </td>
    <td><a href="{{ route("items.variants.edit",["variant"=>$item->id]) }}" class="btn btn-primary btn-sm">{{ __('Edit') }}</a><a href="{{ route("items.variants.delete",["varaint"=>$item->id]) }}" class="btn btn-danger btn-sm">{{ __('Delete') }}</a></td>
</tr> 
@endforeach

@endsection