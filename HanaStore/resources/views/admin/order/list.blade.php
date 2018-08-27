@extends('admin.layout.master', [
    'currentPage' => 'list',
    'current_menu' => 'order_manager',
    'current_sub_menu' => 'list',
])
@section('page-title','List Order')
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
    <div class="card">
        <div class="card-content">
            <div class="card-header card-header-text text-center" data-background-color="green">
                <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> FLOWERS CATALOGUE</h4>
            </div>

            <div class="row">
                <div class="panel panel-default">
                    <div class="table-responsive">
                        @if($orders->count()>0)
                            <table class="table table-hover table-striped table-condensed table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">{{__('ID')}}</th>
                                    <th scope="col">{{__('Name')}}</th>
                                    <th scope="col">{{__('Phone')}}</th>
                                    <th scope="col">{{__('Address')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(orders as $item)
                                    <tr>
                                        <th class="id-flower" scope="row">{{$item->id}}</th>
                                        <td>
                                            <div class="card" style="background-size: cover; height: 60px; width: 60px">
                                                <a href="/admin/product/{{ $item->id }}">
                                                    <img src="{{$item->images}}" class="img-thumbnail" style="background-size: cover; height: 60px; width: 60px" alt="images"/></a>
                                            </div>
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->addressDetail}}</td>
                                        <td class="none">
                                            <a class="btn btn-info btn-sm" href="/admin/order/{{$item -> id}}/edit"><i class="fas fa-edit"></i> <b>Edit</b></a>

                                            <a class="btn btn-delete btn-danger btn-sm" href="{{$item-> id}}"><i class="fas fa-trash-alt "></i> <b>Remove</b></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        @else
                            <div class="alert alert-danger">Hiện tại không có đơn hàng. Vui lòng click <a
                                    href="/admin/order/create" title="Thêm mới sản phẩm" class="btn-link">vào đây</a> để tạo mới.
                            </div>
                        @endif
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.btn-delete').click(function () {
            var thisButton = $(this);
            swal({
                text: "Are you sure about this action?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Huỷ bỏ',
                buttonsStyling: false
            }).then(function() {
                var id = thisButton.attr('href');
                $.ajax({
                    'url': '/admin/product/' + id,
                    'method': 'DELETE',
                    'data':{
                        '_token':$('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        swal({
                            text: 'Product has deleted.',
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