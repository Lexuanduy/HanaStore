@extends('admin.layout.master',[
    'page_title'=>'Order List',
    'current_menu'=>'order_manager',
    'current_sub_menu'=>'list_item'
])
@section('content')
    <style type="text/css">
        .none a{
            text-decoration: none;
        }
        thead tr{
            background-color: #117a8b;
            color: #fff;
        }
        .id-flower{
            background-color: #ffff00;
        }
    </style>
    <div class="col-md-12">
        <!--open card-->
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="card-header card-header-text text-center" data-background-color="green">
                        <h4 class="mb-0"><i class="material-icons">assignment</i></i> ORDER</h4>
                    </div>
                </div>

                <div class="row">
                    <form action="/admin/product">
                        <div class="form-group col-sm-3">
                            <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span></span> <i class="fa fa-caret-down"></i>
                            </div>
                        </div>
                    </form>
                </div>

                <!--List Flower Table-->
                <div class="row" style="padding-top: 3em;">
                    <div class="panel panel-default">
                        <div class="table-responsive">
                            @if($list_order->count()>0)
                                <table class="table table-hover table-striped table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{__('Order Code')}}</th>
                                        <th scope="col">{{__('Merchant')}}</th>
                                        <th scope="col">{{__('Recipient')}}</th>
                                        <th class="col">{{__('Time')}}</th>
                                        <th scope="col">{{__('Information')}}</th>
                                        <th scope="col">{{__('Status')}}</th>
                                        <th scope="col">{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list_order as $item)
                                        <tr role="row">
                                            <td class="id-flower col-1">{{$item->id}}</td>
                                            <td class="col-1">tingfu</td>
                                            <td class="col-2">{!! $item->shipInformation !!}</td>
                                            <td class="col-2">{{$item->created_at}}</td>
                                            <td class="col-2">
                                                <ul>
                                                    @foreach($item->details as $order_detail)
                                                        <li>{{$order_detail->product->name}} - {{$order_detail->quantity}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="col-1">{{$item->statusLabel}}</td>
                                            <td class="col-3">
                                                @if($item->status==0)
                                                    <a href="/admin/order/change-status?id={{$item->id}}&status=1" onclick="return confirm('Do you confirm this order definitely?')"
                                                       class="btn btn-simple btn-success btn-icon edit"><i
                                                            class="material-icons">how_to_reg</i></a>
                                                @elseif($item->status==1)
                                                    <a href="/admin/order/change-status?id={{$item->id}}&status=2" onclick="return confirm('Do you fulfill this order definitely?')"
                                                       class="btn btn-simple btn-success btn-icon edit"><i
                                                            class="material-icons">done</i></a>
                                                @endif
                                                @if($item->status==0)
                                                    <a href="/admin/order/change-status?id={{$item->id}}&status=-1" onclick="return confirm('Delete this order, are you sure?')"
                                                       class="btn btn-simple btn-danger btn-icon remove btn-delete"><i
                                                            class="material-icons">close</i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    @else
                                        <div class="alert alert-info">Non order.
                                        </div>
                                    @endif
                                </table>
                        </div>
                    </div>
                </div>
                <!--List Flower Table-->
                <div class="row">
                    <div class="col-sm-5">
                    </div>
                    <div class="col-sm-7">
                        {{ $list_order->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!--  end card  -->
    </div>

    <script type="text/javascript">
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

        });
    </script>
@endsection
