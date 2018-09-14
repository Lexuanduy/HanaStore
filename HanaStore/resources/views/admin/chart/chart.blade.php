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
                        <h4 class="mb-0 col-sm-6">Thống kê doanh thu và lợi nhuận</h4>

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
                        <div class="row">
                            <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6" id="first-revenue-chart">

                            </div>
                            <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6" id="second-revenue-chart">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0 col-sm-6">Trạng thái đơn hàng</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col col-sm-6 col-md-4 col-lg-4 col-xl-4" id="first_order_chart">

                            </div>
                            <div class="col col-sm-6 col-md-4 col-lg-4 col-xl-4" id="second_order_chart">

                            </div>
                            <div class="col col-sm-6 col-md-4 col-lg-4 col-xl-4" id="third_order_chart">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.load('current', {'packages':['line']});
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(function () {
            $.ajax({
                url:'/chart-api?startDate=2018-08-20&endDate=2018-09-15',
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
            let data = new google.visualization.DataTable();
            data.addColumn('date', 'Ngày');
            data.addColumn('number', 'Doanh thu');
            data.addColumn('number', 'Lợi nhuận');
            for (let i = 0, chartLg = chart_data.length; i < chartLg; i++){
                data.addRow([new Date(chart_data[i].day),  Number(chart_data[i].revenue), Number(chart_data[i].revenue)-Number(chart_data[i].revenue)*0.1-480000]);
            }
            let options = {
                chart: {
                    title: 'Biểu đồ doanh thu và lợi nhuận theo thời gian',
                    subtitle: 'tính theo đơn vị (vnd)'
                },
                height: 500,
                hAxis: {
                    format: 'dd/MM/yyyy'
                }
            };

            let first_revenue_chart = new google.charts.Line(document.getElementById('first-revenue-chart'));

            first_revenue_chart.draw(data, google.charts.Line.convertOptions(options));

            let second_revenue_chart = new google.charts.Bar(document.getElementById('second-revenue-chart'));

            second_revenue_chart.draw(data, google.charts.Bar.convertOptions(options));
        };

        $(function() {

            let start = moment().subtract(29, 'days');
            let end = moment();

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
                let startDate = picker.startDate.format('YYYY-MM-DD');
                let endDate = picker.endDate.format('YYYY-MM-DD');
                $.ajax({
                    url: '/chart-api?startDate=' + startDate + '&endDate=' + endDate,
                    method: 'GET',
                    success: function (resp) {
                        if(resp.length ==0){
                            swal({
                                title: 'Làm gì bán được bông nào!',
                                text: 'Hoa còn tồn kho nhiều lắm, gắng bán đê.',
                                imageUrl: 'https://media.giphy.com/media/3orifdO6eKr9YBdOBq/giphy.gif',
                                imageWidth: 300,
                                imageHeight: 200,
                                imageAlt: 'Custom image',
                                animation: false
                            });
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

        google.charts.setOnLoadCallback(function () {
            $.ajax({
                url:'/order-api',
                method:'GET',
                success:function (resp) {
                    drawOrderChart(JSON.parse(resp));
                },
                error: function () {
                    swal('Server bị hack rồi mất hết số liệu.', 'Không thể lấy dữ liệu từ api', 'error');
                }
            });
        });

        // Draw the chart and set the chart values
        function drawOrderChart(order_data) {
            let data = new google.visualization.DataTable();
            data.addColumn('string', 'Order Status');
            data.addColumn('number', 'Number');
            for (let i = 0, chartLg = order_data.length; i < chartLg; i++){
                data.addRow([order_data[i].status,  order_data[i].number]);
            };

            // Optional; add a title and set the width and height of the chart
            let options_one = {'title':'Phân loại trạng thái đơn hàng', height: 400, is3D: true};
            let options_two = {'title':'Phân loại trạng thái đơn hàng', height: 400, legend: 'none'};
            let options_three = {'title':'Phân loại trạng thái đơn hàng', height: 400, pieHole: 0.4};

            // Display the chart inside the <div> element with id="first_order_chart"
            let first_order_chart = new google.visualization.PieChart(document.getElementById('first_order_chart'));
            first_order_chart.draw(data, options_one);

            // Display the chart inside the <div> element with id="second_order_chart"
            let second_order_chart = new google.visualization.BarChart(document.getElementById('second_order_chart'));
            second_order_chart.draw(data, options_two);

            // Display the chart inside the <div> element with id="third_order_chart"
            let third_order_chart = new google.visualization.PieChart(document.getElementById('third_order_chart'));
            third_order_chart.draw(data, options_three);
        }
    </script>
@endsection
