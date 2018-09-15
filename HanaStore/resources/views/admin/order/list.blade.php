@extends('admin.layout.master',[
    'page_title'=>'Order List',
    'current_menu'=>'order_manager',
    'current_sub_menu'=>'list_item'
])
@section('page-title','DANH SÁCH ĐẶT HÀNG')
@section('content')
    <style type="text/css">
        .none a{
            text-decoration: none;
        }
        .dataTable thead tr th{
            background-image: linear-gradient(#868f96, #596164);
        }
        .table td{
            vertical-align: middle;
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
            margin-right: 100px;
            margin-bottom: 0;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <!--open card-->
            <div class="card">
                <div class="card-header card-header-text">
                    <h4 class="mb-0 col-sm-4"><i class="fas fa-clipboard-list text-danger"></i> DANH SÁCH ĐẶT HÀNG</h4>

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
                                                    <th class="column1">{{__('Mã đơn hàng')}}</th>
                                                    <th class="column2">{{__('Người đặt')}}</th>
                                                    <th class="column3">{{__('Người nhận')}}</th>
                                                    <th class="column4">{{__('Ngày đặt hàng')}}</th>
                                                    <th class="column5">{{__('Sản phẩm')}}</th>
                                                    <th class="column6">{{__('Giá trị')}}</th>
                                                    <th class="column7">{{__('Trạng thái')}}</th>
                                                    <th class="column8">{{__('Thao tác')}}</th>
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
                                                            <a href="/admin/order/change-status?id={{$item->id}}&status=1" onclick="return confirm('Bạn có muốn xác nhận và vận chuyển đơn hàng này?')"
                                                               class="fas fa-check text-success">
                                                            </a>
                                                        @elseif($item->status==1)
                                                            <a href="/admin/order/change-status?id={{$item->id}}&status=2" onclick="return confirm('Bạn có chắc là đơn hàng đã hoàn thành?')"
                                                               class="fas fa-shipping-fast text-info">
                                                            </a>
                                                        @endif
                                                        @if($item->status==0)
                                                            <a href="/admin/order/change-status?id={{$item->id}}&status=-1" onclick="return confirm('Bạn có chắc xóa đơn hàng này?')"
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
                                                <div class="alert alert-info">Không có đơn đặt hàng nào.
                                                </div>
                                            @endif
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--List Flower Table-->
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
                lengthMenu: [[10, 20, 30, 40, 50, -1], [10, 20, 30, 40, 50, "Tất cả"]],
                order: [[ 3, "desc" ]],
                pagingType: "full_numbers",
                language: {
                    lengthMenu: "_MENU_",
                    search: "_INPUT_",
                    searchPlaceholder: "Tìm kiếm...",
                    zeroRecords: "Dạo này ế ẩm lắm, không có bản ghi nào",
                    paginate: {
                        first: "<<",
                        last: ">>",
                        next: ">",
                        previous: "<"
                    },
                    info: "Hiển thị từ _START_ tới _END_ của _TOTAL_ bản ghi",
                }
            });
        } );
    </script>
@endsection
