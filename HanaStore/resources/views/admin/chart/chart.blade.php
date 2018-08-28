@extends('admin.layout.master', [
    'currentPage' => 'chart',
    'current_menu' => 'chart_manager',
])
@section('page-title', 'Revenue Chart')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Daily Revenue Chart</div>
                    <div id="linechart_material">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
    </script>
    <script type = "text/javascript">
        google.charts.load('current', {packages: ['corechart','line']});
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Day', 'Revenue (VND)'],
                ['22 August',  1000],
                ['23 August',  1170],
                ['24 August',  660],
                ['25 August',  1030],
                ['26 August',  1030],
                ['27 August',  1030],
                ['28 August',  1030],
                ['29 August',  1030],
                ['30 August',  1030],
            ]);

            var options = {
                title: 'Store Performance',
                curveType: 'function',
                legend: { position: 'bottom' },
                height: 500
            };

            var chart = new google.visualization.LineChart(document.getElementById('linechart_material'));

            chart.draw(data, options);
        }
    </script>
@endsection
