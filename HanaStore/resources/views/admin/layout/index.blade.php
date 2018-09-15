@extends('admin.layout.master', [
    'currentPage' => 'home',
    'current_menu' => 'Home',
    'current_sub_menu' => 'Home',
])
@section('page-title', 'Trang quản lý HANASTORE')
@section('content')
    <style>
        .panel{
            background-color:#fff;
            border:1px solid transparent;border-radius:4px;
            -webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);
            box-shadow:0 1px 1px rgba(0,0,0,.05)}
        .panel-green {
            border-color: #5cb85c;
        }

        .panel-primary {
            border-color: #337ab7;
        }

        .panel-primary .panel-heading {
            border-color: #337ab7;
            color: #fff;
            background-image: linear-gradient(#16222A, #3A6073);
        }

        .panel-primary a {
            color: #337ab7;
        }

        .panel-primary a:hover {
            color: #1f4d74;
        }
        .panel-green .panel-heading {
            border-color: #5cb85c;
            color: #fff;
            background-image: linear-gradient(#43cea2, #185a9d);
        }

        .panel-green a {
            color: #5cb85c;
        }

        .panel-green a:hover {
            color: #3d8b3d;
        }

        .panel-red {
            border-color: #d9534f;
        }

        .panel-red .panel-heading {
            border-color: #d9534f;
            color: #fff;
            background-image: linear-gradient(#36d1dc, #5b86e5);
        }

        .panel-red a {
            color: #d9534f;
        }

        .panel-red a:hover {
            color: #b52b27;
        }

        .panel-yellow {
            border-color: #f0ad4e;
        }

        .panel-yellow .panel-heading {
            border-color: #f0ad4e;
            color: #fff;
            background-image: linear-gradient(#4568dc, #b06ab3);
        }

        .panel-yellow a {
            color: #f0ad4e;
        }

        .panel-yellow a:hover {
            color: #df8a13;
        }
        .panel-sea {
            border-color: #3b517c;
        }

        .panel-sea .panel-heading {
            border-color: #3b517c;
            color: #fff;
            background-image: linear-gradient(#373B44, #4286f4);
        }

        .panel-sea a {
            color: #3b517c;
        }

        .panel-sea a:hover {
            color: #222f49;
        }
        .panel-purple {
            border-color: #882b8a;
        }

        .panel-purple .panel-heading {
            border-color: #882b8a;
            color: #fff;
            background-image: linear-gradient(#ffd89b, #19547b);
        }

        .panel-purple a {
            color: #882b8a;
        }

        .panel-purple a:hover {
            color: #481749;
        }


        .row.items-dasboard{
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            margin: 0 auto;
        }

        .row.parent-dasboard{
            margin-bottom: 30px;
        }
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
    <!-- /.row -->

    <!-- Dashboard-->
    <div class="container-fluid>">
        <!-- FIRST Dashboard-->
        <div class="row parent-dasboard">
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row items-dasboard">
                            <div class="col-xs-4" style="margin-left: 10px">
                                <i class="fab fa-product-hunt fa-4x"></i>
                            </div>
                            <div class="col-xs-8 text-right" style="float: right">
                                <h2>Sản phẩm</h2>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/product">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row items-dasboard">
                            <div class="col-xs-4" style="margin-left: 10px">
                                <i class="fas fa-folder-minus fa-4x"></i>
                            </div>
                            <div class="col-xs-8 text-right" style="float: right">
                                <h2>Danh mục</h2>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/category">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row items-dasboard">
                            <div class="col-xs-4" style="margin-left: 10px">
                                <i class="far fa-list-alt fa-4x"></i>
                            </div>
                            <div class="col-xs-8 text-right" style="float: right">
                                <h2>Bộ sưu tập</h2>
                            </div>
                        </div>
                    </div>
                    <a href="admin/collection">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <!-- FIRST Dashboard-->

        <!-- SECOND Dashboard-->
        <div class="row parent-dasboard">
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-purple">
                    <div class="panel-heading">
                        <div class="row items-dasboard">
                            <div class="col-xs-4" style="margin-left: 10px">
                                <i class="fas fa-clipboard-list fa-4x"></i>
                            </div>
                            <div class="col-xs-8 text-right" style="float: right">
                                <h2>Đơn hàng</h2>
                            </div>
                        </div>
                    </div>
                    <a href="admin/order">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row items-dasboard">
                            <div class="col-xs-4" style="margin-left: 10px">
                                <i class="fa fa-chart-line fa-4x"></i>
                            </div>
                            <div class="col-xs-8 text-right" style="float: right">
                                <h2>Doanh Thu</h2>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/chart">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="panel panel-sea">
                    <div class="panel-heading">
                        <div class="row items-dasboard">
                            <div class="col-xs-4" style="margin-left: 10px">
                                <i class="fa fa-chart-bar fa-4x" ></i>
                            </div>
                            <div class="col-xs-8 text-right" style="float: right">
                                <h2>Thống kê</h2>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/chart">
                        <div class="panel-footer">
                            <span class="pull-left">Xem chi tiết</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <!-- SECOND Dashboard-->
    </div>
    <!-- Dashboard-->

    <!--General about company-->
    <div class="container-fluid">
        <!--REVENUE company-->
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
        <!--REVENUE company-->

        <!--ORDER company-->
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
        <!--ORDER company-->
    </div>
    <!--General about company-->

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
