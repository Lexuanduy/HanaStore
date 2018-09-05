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

                <!--List Flower Table-->
                <div class="row" style="padding-top: 3em;">
                    <div class="panel panel-default">
                        <div class="table-responsive">
                            @if($list_order->count()>0)
                                <table class="table table-hover table-striped table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{__('ID')}}</th>
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
                                        <tr role="row" class="odd">
                                            <th class="id-flower col-1">{{$item->id}}</th>
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
                                                    <a href="{{$item->id}}" class="btn btn-simple btn-danger btn-icon remove btn-delete"><i
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
    <script>
        $('.btn-delete').click(function () {
            var thisButton = $(this);
            swal({
                text: "Do you want to close this order?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Agree!',
                cancelButtonText: 'Cancel',
                buttonsStyling: false
            }).then(function() {
                var id = thisButton.attr('href');
                $.ajax({
                    'url': '/admin/order/' + id,
                    'method': 'DELETE',
                    'data':{
                        '_token':$('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        swal({
                            text: 'Order has delete.',
                            type: 'success',
                            confirmButtonClass: "btn btn-success",
                            buttonsStyling: false
                        })
                        setTimeout(function () {
                            window.location.reload();
                        }, 2*1000);
                    },
                    error: function () {
                        swal({
                            text: 'Error happened, try again please!',
                            type: 'warning',
                            confirmButtonClass: "btn btn-danger",
                            buttonsStyling: false
                        })
                    }
                });

            });
            return false;
        })
    </script>
@endsection
