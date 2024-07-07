@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<style>
    .table-body-scroll {
    max-height: 300px; /* Adjust the height as needed */
    overflow-y: auto;
}

.table-body-scroll table {
    width: 100%;
    border-collapse: collapse;
}
</style>
<div class="container">
    <!--state overview start-->
    <div class="row state-overview">
        {{-- <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol blue">
                    <i class="fa fa-user"></i>
                </div>
                <div class="value">
                    <h1 class="count">{{ getUnicodeNumber($data['count_admin']) }}</h1>
                    <h6>मुख्य प्रयोगकर्ता </h6>
                </div>
            </section>
        </div> --}}
        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol terques">
                    <i class="fa fa-file"></i>
                </div>
                <div class="value" style="margin-top: -1rem">
                    <h6>उद्योग सूची </h6>
                    <h1 class="count" style="margin-top: -1rem">{{ getUnicodeNumber($data['udhyog']) }}</h1>
                <a type="button" class="btn btn-small btn-primary" style="margin-top: -3px; width: 100%; margin-left: -0.6rem;">विवरण हेर्नुहोस्</a>

                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol red">
                    <i class="fa fa-tasks"></i>
                </div>
                <div class="value" style="margin-top: -1rem">
                    <h6>कार्यक्रमको सूची</h6>

                    <h1 class="count2" style="margin-top: -1rem">{{ getUnicodeNumber($data['program']) }}</h1>
                <a href="{{ route('admin.programs.index') }}" type="button" class="btn btn-small btn-danger" style="margin-top: -3px; width: 100%; margin-left: -0.6rem;">विवरण हेर्नुहोस्</a>

                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6 ">
            <section class="card">
                <div class="symbol yellow">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="value" style="margin-top: -1rem">
                    <h6>तालिम सूची</h6>

                    <h1 class=" count3" style="margin-top: -1rem">{{ getUnicodeNumber($data['total_talim']) }}</h1>
                <a href="{{ route('admin.talim.index') }}" type="button" class="btn btn-small btn-warning" style="margin-top: -3px; width: 100%; margin-left: -0.6rem;">विवरण हेर्नुहोस्</a>

                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6 ">
            <section class="card">
                <div class="symbol yellow">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="value" style="margin-top: -1rem">
                    <h6>साझेदार संस्थाको सूची</h6>

                    <h1 class=" count3" style="margin-top: -1rem">{{ getUnicodeNumber($data['parter_organization']) }}</h1>
                <a href="{{ route('admin.partener_organization.index') }}" type="button" class="btn btn-small btn-warning" style="margin-top: -3px; width: 100%; margin-left: -0.6rem;">विवरण हेर्नुहोस्</a>

                </div>
            </section>
        </div>

    </div><br>
    <!--state overview end-->
    <div class="flot-chart">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-6">
                <section class="card">
                    <header class="card-header">
                        उद्योग बिबरणहरु
                    </header>
                    <div class="card-body text-center">
                        <canvas id="myChart" height="300" width="500"></canvas>

                    </div>
                </section>
            </div>
            <div class="col-lg-6">
                <section class="card">
                    <header class="card-header">
                        कम भण्डार
                    </header>
                    <div class="card-body">
                        <table class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>उत्पादनको नाम</th>
                                    <th>ईकाई</th>
                                    <th>स्टक मात्रा</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="table-body-scroll">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <tbody>
                                    @if(count($data['products']) != 0)
                                        @foreach($data['products'] as $key => $row)
                                            <tr class="gradeX">
                                                <td>{{ getUnicodeNumber($key + 1) }}.</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->unit_id != null ? $row->unit->name : '' }}</td>
                                                <td>{{ $row->stock_quantity }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">माफ गर्नुहोला ! डाटा फेलापरेन !</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>

            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header">
                        चेतावनी उत्पादनहरू
                    </header>
                    <div class="card-body">
                        <table class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>उत्पादनको नाम</th>
                                    <th>उत्पादनको ब्याच नं</th>
                                    <th>उत्पादन मिति</th>
                                    <th>म्याद समाप्ति</th>
                                    <th>स्टक मात्रा</th>
                                </tr>
                            </thead>
                        </table>
                        <div class="table-body-scroll">
                            <table class="display table table-bordered table-striped" id="dynamic-table">
                                <tbody>
                                    @if(count($data['expiring_product']) != 0)
                                        @foreach($data['expiring_product'] as $key => $row)
                                            <tr class="gradeX">
                                                <td>{{ getUnicodeNumber($key + 1) }}.</td>
                                                <td>{{ $row['product_name'] }}</td>
                                                <td>{{ $row['batch_number'] }}</td>
                                                <td>{{ $row['production_date'] }}</td>
                                                <td>{{ $row['expiration_date'] }}</td>
                                                <td>{{ $row['stock_quantity'] }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">माफ गर्नुहोला ! डाटा फेलापरेन !</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>

            </div>

        </div>
        <!-- page end-->
    </div>
    @endsection
    @section('js')
    <script src="{{ asset('assets/cms/assets/chart-master/Chart.min.js')}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        var xValues = ["अचार", "आलु चिप्स", "दुध", "पापड", "हैब्रिड बिउ"];
        var yValues = [
            @foreach ($data['transaction'] as $item)
                @if (in_array($item['udhyog_id'], [2, 3, 4, 5, 6]))
                    {{ $item['total_amount'] }},
                @endif
            @endforeach
        ];
        // var yValues = [{{ $data['transaction'][0]['total_amount'] }}, 49, 44, 24, 15];
        var barColors = ["red", "green", "blue", "orange", "brown"];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: true
                },
                title: {
                    display: true,
                    text: "बैशाख २०८१/०१/०१ देखि चैत २०८१/१२/३१ सम्मको बिक्री बिबरण"
                }
            }
        });
    </script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['मुख्य प्रयोगकर्ता', <?php echo json_encode($data['count_admin'], JSON_NUMERIC_CHECK); ?>],
                ['कृषक हरु', <?php echo json_encode($data['count_user'], JSON_NUMERIC_CHECK); ?>],
                ['प्रोफाइल हरु', <?php echo json_encode($data['profile'], JSON_NUMERIC_CHECK); ?>],
                ['खेत बारी बिबरण', <?php echo json_encode($data['farm'], JSON_NUMERIC_CHECK); ?>],
            ]);

            var options = {
                title: 'किसान बिबरणहरु'
            };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Language', 'Speakers (in millions)'],
                ['जमिन', <?php echo json_encode($data['inventoryLandCategory'], JSON_NUMERIC_CHECK); ?>],
                ['गोदाम', <?php echo json_encode($data['inventoryStoreCategory'], JSON_NUMERIC_CHECK); ?>],
                ['औजार/उपकरण', <?php echo json_encode($data['inventoryEquipmentCategory'], JSON_NUMERIC_CHECK); ?>],
                ['सिचाई', <?php echo json_encode($data['inventoryIrrigationCategory'], JSON_NUMERIC_CHECK); ?>],
                ['इन्धन', <?php echo json_encode($data['inventoryFuelCategory'], JSON_NUMERIC_CHECK); ?>],
                ['उद्योगहरु', <?php echo json_encode($data['udhyog'], JSON_NUMERIC_CHECK); ?>],

            ]);

            var options = {
                title: 'इन्भेन्टरी बिबरणहरु',
                legend: 'none',
                pieSliceText: 'label',
                slices: {
                    4: {
                        offset: 0.2
                    },
                    12: {
                        offset: 0.3
                    },
                    14: {
                        offset: 0.4
                    },
                    15: {
                        offset: 0.5
                    },
                },
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart-1'));
            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 11],
                ['Eat', 2],
                ['Commute', 2],
                ['Watch TV', 2],
                ['Sleep', 7]
            ]);

            var options = {
                title: 'My Daily Activities',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
    @endsection
