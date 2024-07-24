@php
    $amount = $data->where('title', $node->id)->sum('dr');
@endphp
<tr>
    <td>{{ getUnicodeNumber($index) }}.</td>
    <td>{{ $node->name }}</td>
    <td>{{ $amount }}</td>
</tr>
