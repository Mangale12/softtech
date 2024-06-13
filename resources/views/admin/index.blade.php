@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="container">
    <!--state overview start-->
    <div class="row state-overview">
        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol blue">
                    <i class="fa fa-user"></i>
                </div>
                <div class="value">
                    <h1 class="count">{{ getUnicodeNumber($data['count_admin']) }}</h1>
                    <h6>मुख्य प्रयोगकर्ता </h6>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol terques">
                    <i class="fa fa-file"></i>
                </div>
                <div class="value">
                    <h1 class="count">{{ getUnicodeNumber($data['udhyog']) }}</h1>
                    <h6>उद्योग सूची </h6>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol red">
                    <i class="fa fa-tasks"></i>
                </div>
                <div class="value">
                    <h1 class=" count2">{{ getUnicodeNumber($data['count_anudann']) }}</h1>
                    <h6>अनुदान सूची</h6>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="card">
                <div class="symbol yellow">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="value">
                    <h1 class=" count3">{{ getUnicodeNumber($data['total_talim']) }}</h1>
                    <h6>तालिम सूची</h6>
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
                        किसान बिबरणहरु
                    </header>
                    <div class="card-body">
                        <div>
                            <div id="piechart" style="width:500px; height: 300px;"></div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-lg-6">
                <section class="card">
                    <header class="card-header">
                        इन्भेन्टरी बिबरणहरु
                    </header>
                    <div class="card-body text-center">
                        <div id="piechart-1" style="width: 400px; height: 400px;"></div>
                    </div>
                </section>
            </div>
            <div class="col-lg-6">
                <section class="card">
                    <header class="card-header">
                        उत्पादन
                    </header>
                    <div class="card-body text-center">
                        <div id="piechart_3d" style="width: 500px; height: 400px;"></div>
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
        var xValues = ["बैशाख", "जेठ", "असार", "श्रावण", "भाद्र", "असोज", "कार्तिक", "मंसिर", "पुष", "माघ", "फागुन", "चैत"];
        var yValues = [55, 49, 44, 24, 15];
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
                    text: "बैशाख २०७८ देखि चैत २०७९ सम्मको बिक्री बिबरण"
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
