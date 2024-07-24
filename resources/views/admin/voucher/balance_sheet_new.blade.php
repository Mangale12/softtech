<!DOCTYPE html>
<html>
<head>
    <title>Balance Sheet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .indent {
            padding-left: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Balance Sheet</h2>
    <h4 class="text-center mb-3">नमुना एकिकृत सहकारी खेती वीउ उत्पादन समुह</h4>
    <h6 class="text-center mb-5">आम्दानी / खर्च बिवरण २०७८/०७९</h6>

    <div class="row">
        @foreach (['asset', 'liabilities'] as $type)
            <div class="col-6">
                <h5>{{ $type === 'asset' ? 'सम्पत्ति' : 'दायित्व' }}</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>क्रम संख्या</th>
                            <th>शीर्षक</th>
                            <th>रकम</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $index = 1;
                            $total = 0;
                        @endphp
                        @if (!empty($data['node_hierarchy'][$type]))
                            @foreach ($data['node_hierarchy'][$type] as $hierarchy)
                                @foreach ($hierarchy as $nodeData)
                                    @include('admin.voucher.node', ['nodeData' => $nodeData, 'index' => $index, 'total' => $total, 'data' => $data, 'type' => $type])
                                @endforeach
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">No data available</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" align="right">जम्मा</td>
                            <td>{{ $total }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
