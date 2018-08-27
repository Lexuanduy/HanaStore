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


</style>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2>Product !</h2>
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
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-calendar fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2>Category !</h2>
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
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-atom fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2>Collection !</h2>
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
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-purple">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2>Order !</h2>
                        </div>
                    </div>
                </div>
                <a href="#">
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
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-chart-line fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2>Chart !</h2>
                        </div>
                    </div>
                </div>
                <a href="#">
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
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-chart-bar fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2>Revenue !</h2>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    </div>

    @endsection