@extends('admin.layout.master', [
    'currentPage' => 'list',
    'current_menu' => 'category_manager',
    'current_sub_menu' => 'list_item',
])
@section('page-title', 'List category')
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
                    <h4 class="mb-0 col-sm-4"><i class="fab fa-pagelines text-danger"></i> CATEGORY CATALOGUE</h4>

                    <div class="form-group">
                        <a href="/admin/category/create" class="btn" style="background-image: linear-gradient(#a3bded, #66a6ff);"><i class="far fa-plus-square"></i> Create New</a>
                    </div>
                </div>

                <div class="card-body">
                    <!--List Flower Table-->
                    <div class="limiter">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100">
                                    @if($list_category->count()>0)
                                        <table class="table table-bordered" id="table">
                                            <thead>
                                            <tr class="table100-head">
                                                <th class="column1">{{__('ID')}}</th>
                                                <th class="column2">{{__('Image')}}</th>
                                                <th class="column5">{{__('Category')}}</th>
                                                <th class="column8">{{__('Description')}}</th>
                                                <th class="column9">{{__('Action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($list_category as $item)
                                                <tr>
                                                    <td class="column1">{{$item->id}}</td>
                                                    <td class="column2">
                                                        <div class="card" style="background-size: cover; height: 120px; width: 120px">
                                                            <a href="/admin/category/{{ $item->id }}">
                                                                <img src="{{$item->images}}" class="img-thumbnail" style="background-size: cover; height: 120px; width: 120px" alt="images"/></a>
                                                        </div>
                                                    </td>
                                                    <td class="column3">{{$item->name}}</td>
                                                    <td class="column4">{{$item->description}}</td>
                                                    <td>
                                                        <a class="text-primary" href="/admin/category/{{$item -> id}}/edit"><i class="fas fa-edit"></i></a>

                                                        <a class="text-danger btn-delete" href="{{$item-> id}}"><i class="fas fa-trash-alt "></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            @else
                                                <div class="alert alert-danger">Hiện tại không có danh mục sản phẩm. Vui lòng click <a
                                                        href="/admin/category/create" title="Thêm mới sản phẩm" class="btn-link">vào đây</a> để tạo mới.
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

    <!--remove category in view-->
    <script>
        $('.btn-delete').click(function () {
            var thisButton = $(this);
            swal({
                title: 'Chắc cú không?',
                text: "Xóa danh mục này nghen?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý'
            }).then(function() {
                var id = thisButton.attr('href');
                $.ajax({
                    'url': '/admin/category/' + id,
                    'method': 'DELETE',
                    'data':{
                        '_token':$('meta[name="csrf-token"]').attr('content')
                    },
                    success: function () {
                        swal({
                            text: 'Danh mục đã bị xóa.',
                            type: 'success',
                            confirmButtonColor: '#2ebf91',
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
        });

        $(document).ready(function() {
            $('#table').DataTable({
            });
        } );
    </script>
    <!--remove category in view-->
@endsection
