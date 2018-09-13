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
        thead tr th{
            background-image: linear-gradient(#868f96, #596164);
        }
        .table td{
            vertical-align: middle;
        }
        .daterangepicker{
            color: #6495ed;
            background: #f0f8ff;
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
    <div class="row">
        <div class="col-md-12">
            <!--open card-->
            <div class="card">
                <div class="card-header card-header-text">
                    <h4 class="mb-0 col-sm-8"><i class="fas fa-clipboard-list text-danger"></i> ORDER</h4>

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
                    <!--List Flower Table-->
                    <div class="limiter">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100">
                                    @if($list_order->count()>0)
                                        <table class="table table-bordered" id="table">
                                            <thead>
                                                <tr class="table100-head">
                                                    <th class="column1">{{__('Order Code')}}</th>
                                                    <th class="column2">{{__('Merchant')}}</th>
                                                    <th class="column3">{{__('Recipient')}}</th>
                                                    <th class="column4">{{__('Order Date')}}</th>
                                                    <th class="column5">{{__('Items')}}</th>
                                                    <th class="column6">{{__('Order Value')}}</th>
                                                    <th class="column7">{{__('Status')}}</th>
                                                    <th class="column8">{{__('Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($list_order as $item)
                                                <tr>
                                                    <td class="column1">{{$item->id}}</td>
                                                    <td class="column2">tingfu</td>
                                                    <td class="column3">{!! $item->shipInformation !!}</td>
                                                    <td class="column4">{{$item->created_at}}</td>
                                                    <td class="column5">
                                                        <ul>
                                                            @foreach($item->details as $order_detail)
                                                                <li>{{$order_detail->product->name}} - {{$order_detail->quantity}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td class="column6">{{number_format($item->totalPrice, 0, '.', ',')}} (VND)</td>
                                                    <td class="column7">{{$item->statusLabel}}</td>
                                                    <td class="column8 text-center">
                                                        @if($item->status==0)
                                                            <a href="/admin/order/change-status?id={{$item->id}}&status=1" onclick="return confirm('Do you confirm this order definitely?')"
                                                               class="fas fa-check text-success">
                                                            </a>
                                                        @elseif($item->status==1)
                                                            <a href="/admin/order/change-status?id={{$item->id}}&status=2" onclick="return confirm('Do you fulfill this order definitely?')"
                                                               class="fas fa-shipping-fast text-info">
                                                            </a>
                                                        @endif
                                                        @if($item->status==0)
                                                            <a href="/admin/order/change-status?id={{$item->id}}&status=-1" onclick="return confirm('Delete this order, are you sure?')"
                                                               class="far fa-times-circle text-danger">
                                                            </a>
                                                        @elseif($item->status==-1)
                                                            <i class="fas fa-ban text-secondary"></i>
                                                        @elseif($item->status==2)
                                                            <i class="far fa-check-circle text-success"></i>
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
                    </div>
                    <!--List Flower Table-->
                    <div style="display: flex; align-items: center; justify-content: center;">
                        {{$list_order->links()}}
                    </div>
                </div>
            </div>
            <!--  end card  -->
        </div>
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

        $(document).ready(function() {
            $('#table').DataTable({
                "paging": false
            });
        } );
    </script>
@endsection
