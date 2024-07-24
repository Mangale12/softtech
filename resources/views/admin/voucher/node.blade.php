@php
    $node = $nodeData['node'];
    $amount = $data[$type]->where('title', $node->id)->sum('dr');
    $total += $amount;
@endphp
<tr>
    <td>{{ getUnicodeNumber($index++) }}.</td>
    <td class="{{ $loop->depth > 1 ? 'indent' : '' }}">
        {{ str_repeat('&nbsp;', ($loop->depth - 1) * 4) }} {{ $node->name }}
    </td>
    <td>{{ $amount }}</td>
</tr>
@foreach ($nodeData['children'] as $childNodeData)
    @include('admin.voucher.node', ['nodeData' => $childNodeData, 'index' => $index, 'total' => $total, 'data' => $data, 'type' => $type])
@endforeach
