@extends('admin.layout.master', [
    'currentPage' => 'chart',
    'current_menu' => 'chart_manager',
])
@section('page-title', 'Revenue Chart')
@section('content')
    <style>
        .daterangepicker{
            color: #6495ed;
            background: #f0f8ff;
        }
        table thead tr{
            background: #faebd7;
        }
        .date-range{
            background: #ffffe0;
            color: #6495ed;
            padding: 8px;
            line-height: 18px;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group{
            margin-bottom: 0;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0 col-sm-6">Daily Revenue Chart</h4>

                        <div class="form-group">
                            <form action="/admin/order">
                                <div class="form-group">
                                    <div id="reportrange" class="date-range">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        <span></span> <i class="fa fa-caret-down"></i>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="linechart_material">

                        </div>

                        <div id="pie_chart">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback(function () {
            $.ajax({
                url:'/chart-api?startDate=2018-08-20&endDate=2018-08-25',
                method:'GET',
                success:function (resp) {
                    drawChart(resp);
                },
                error: function () {
                    swal('Doanh thu bị thó rồi', 'Không thể lấy dữ liệu từ api', 'error');
                }
            });
        });

        function drawChart(chart_data) {
            var data = new google.visualization.DataTable();
            data.addColumn('date', 'Ngày');
            data.addColumn('number', 'Doanh thu');
            data.addColumn('number', 'Lợi nhuận');
            for (var i = 0, chartLg = chart_data.length; i < chartLg; i++){
                data.addRow([new Date(chart_data[i].day),  Number(chart_data[i].revenue), Number(chart_data[i].revenue)-Number(chart_data[i].revenue)*0.1-480000]);
            }
            var options = {
                chart: {
                    title: 'Biểu đồ doanh thu và lợi nhuận theo thời gian',
                    subtitle: 'tính theo đơn vị (vnd)'
                },
                height: 500,
                hAxis: {
                    format: 'dd/MM/yyyy'
                }
            };

            var chart = new google.charts.Line(document.getElementById('linechart_material'));

            chart.draw(data, google.charts.Line.convertOptions(options));
        };

        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

            $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
                //do something, like clearing an input
                $('#reportrange').val('');
            });
            $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
                // console.log();
                // console.log(picker.endDate.format('YYYY-MM-DD'));
                var startDate = picker.startDate.format('YYYY-MM-DD');
                var endDate = picker.endDate.format('YYYY-MM-DD');
                $.ajax({
                    url: '/chart-api?startDate=' + startDate + '&endDate=' + endDate,
                    method: 'GET',
                    success: function (resp) {
                        if(resp.length ==0){
                            swal('Làm gì bán được bông nào.', 'Làm ơn chọn thời gian khác.', 'warning');
                            return;
                        };
                        drawChart(resp);
                    },
                    error: function () {
                        swal('Lại thâm hụt ngân sách', 'Không thể lấy dữ liệu từ api', 'error');
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);

        function drawChart()
        {
            var data = google.visualization.arrayToDataTable({!! $order_data !!});
            var options = {
                title : 'Percentage of Order Status: Fulfilled, Confirmed(Delivering), Pending, Cancel'
            };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            chart.draw(data, options);
        }
    </script>
@endsection
