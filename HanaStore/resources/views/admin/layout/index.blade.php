@extends('admin.layout.master', [
    'currentPage' => 'home',
    'current_menu' => 'Home',
    'current_sub_menu' => 'Home',
])
@section('page-title', 'Home')
@section('content')
    <style>
        .panel{
            margin-bottom:20px;
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
            background-color: #337ab7;
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
            background-color: #5cb85c;
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
            background-color: #d9534f;
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
            background-color: #f0ad4e;
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
            background-color: #3b517c;
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
            background-color: #882b8a;
        }

        .panel-purple a {
            color: #882b8a;
        }

        .panel-purple a:hover {
            color: #481749;
        }


        .row.items-dasboard{
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
    <div class="container-fluid>">
        <div class="row parent-dasboard">
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row items-dasboard">
                            <div class="col-xs-4" style="margin-left: 10px">
                                <i class="fab fa-product-hunt fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right" style="float: right">
                                <h2>Products</h2>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/product">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
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
                                <i class="fas fa-folder-minus fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right" style="float: right">
                                <h2>Categories</h2>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/category">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
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
                                <i class="far fa-list-alt fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right" style="float: right">
                                <h2>Collections</h2>
                            </div>
                        </div>
                    </div>
                    <a href="admin/collection">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <div class="row parent-dasboard">
            <div class="col-lg-4 col-md-6">
                <div class="panel panel-purple">
                    <div class="panel-heading">
                        <div class="row items-dasboard">
                            <div class="col-xs-4" style="margin-left: 10px">
                                <i class="fas fa-clipboard-list fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right" style="float: right">
                                <h2>Orders</h2>
                            </div>
                        </div>
                    </div>
                    <a href="admin/order">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
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
                                <i class="fa fa-chart-line fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right" style="float: right">
                                <h2>Chart</h2>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/chart">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
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
                                <i class="fa fa-chart-bar fa-5x" ></i>
                            </div>
                            <div class="col-xs-8 text-right" style="float: right">
                                <h2>Revenue</h2>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/chart">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
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
            for (var i = 0; i < chart_data.length; i++){
                data.addRow([new Date(chart_data[i].day),  Number(chart_data[i].revenue)]);
            }
            var options = {
                chart: {
                    title: 'Biểu đồ doanh thu theo thời gian',
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
@endsection
