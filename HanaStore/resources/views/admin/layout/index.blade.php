@extends('admin.layout.app', [
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
    </style>
    <!-- /.row -->
    <div class="container>">
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

        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
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
        </div>

    </div>

@endsection
