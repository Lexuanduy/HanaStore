@extends('admin.layout.master', [
    'currentPage' => 'list',
    'current_menu' => 'product_manager',
    'current_sub_menu' => 'list_item',
])
@section('page-title', 'List flowers')
@section('content')
    <style type="text/css">
        .none a{
            text-decoration: none;
        }
        thead tr th{
            background-image: linear-gradient(#868f96, #596164);
        }
        .table td, .table th{
            vertical-align: middle;
            text-align: center;
        }
        .table thead th{
            text-align: center;
        }
        .form-group{
            margin-bottom: 0;
        }
    </style>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-text text-center">
                    <h4 class="mb-0 col-sm-4"><i class="fab fa-pagelines text-danger"></i> FLOWERS CATALOGUE</h4>

                    <div class="form-group">
                        <a href="/admin/product/create" class="btn" style="background-image: linear-gradient(#a3bded, #66a6ff);"><i class="far fa-plus-square"></i> Create New</a>
                    </div>
                </div>

                <div class="card-body">
                    <!--List Flower Table-->
                    <div class="limiter">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100">
                                    @if($products_in_view->count()>0)
                                        <table class="table table-bordered" id="table">
                                            <thead>
                                            <tr class="table100-head">
                                                <th class="column1">{{__('ID')}}</th>
                                                <th class="column2">{{__('Image')}}</th>
                                                <th class="column3">{{__('Name')}}</th>
                                                <th class="column4">{{__('Category')}}</th>
                                                <th class="column5">{{__('Collection')}}</th>
                                                <th class="column6">{{__('Price')}}</th>
                                                <th class="column7">{{__('Sale')}}</th>
                                                <th class="column8">{{__('Description')}}</th>
                                                <th class="column9">{{__('Detail')}}</th>
                                                <th class="column10">{{__('Action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products_in_view as $item)
                                                <tr>
                                                    <td class="column1">{{$item->id}}</td>
                                                    <td class="column2">
                                                        <div class="card" style="background-size: cover; height: 120px; width: 120px">
                                                            <a href="/admin/product/{{ $item->id }}">
                                                                <img src="{{$item->images}}" class="img-thumbnail" style="background-size: cover; height: 120px; width: 120px" alt="images"/></a>
                                                        </div>
                                                    </td>
                                                    <td class="column3">{{$item->name}}</td>
                                                    <td class="column4">{{$item->category->name}}</td>
                                                    <td class="column5">{{$item->collection->name}}</td>
                                                    <td class="column6">{{number_format($item->price, 0, '.', ',')}} (VND)</td>
                                                    <td class="column7">{{$item->sale}} %</td>
                                                    <td class="column8">{{$item->description}}</td>
                                                    <td class="column9">{{$item->detail}}</td>
                                                    <td>
                                                        <a class="text-primary" href="/admin/product/{{$item -> id}}/edit"><i class="fas fa-edit"></i></a>

                                                        <a class="text-danger btn-delete" href="{{$item-> id}}"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            @else
                                                <div class="alert alert-danger">Hiện tại không có danh mục sản phẩm. Vui lòng click <a
                                                        href="/admin/product/create" title="Thêm mới sản phẩm" class="btn-link">vào đây</a> để tạo mới.
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
        </div>
    </div>

    <!--remove product in view-->
    <script>
        $('.btn-delete').click(function () {
            var thisButton = $(this);
            swal({
                title: 'Chắc cú không?',
                text: "Xóa hoa này nghen?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý'
            }).then(function(result) {
                var id = thisButton.attr('href');
                if (result.value) {
                    $.ajax({
                        'url': '/admin/product/' + id,
                        'method': 'DELETE',
                        'data':{
                            '_token':$('meta[name="csrf-token"]').attr('content')
                        },
                        success: function () {
                            swal({
                                text: 'Hoa bị lạc trôi về nơi vô cực rồi.',
                                type: 'success',
                                confirmButtonColor: '#2ebf91',
                            })
                            setTimeout(function () {
                                window.location.reload();
                            }, 2*1000);
                        },
                        error: function () {
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Có gì đó sai sai!',
                                footer: '<a href>Why do I have this issue?</a>'
                            })
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal({
                        title: 'Đã hủy bỏ!',
                        text: 'Hoa còn tồn kho nhiều lắm.',
                        imageUrl: 'https://ubisafe.org/images/amounting-clipart-animation-1.gif',
                        imageWidth: 300,
                        imageHeight: 150,
                        imageAlt: 'Custom image',
                        animation: false
                    })
                }
            });
            return false;
        });

        $(document).ready(function() {
            $('#table').DataTable({
            });
        } );
    </script>
    <!--remove product in view-->
@endsection
