@extends('admin.layout.app', [
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
            background-color: #117a8b;
            color: #fff;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header card-header-text" style="background: url('{{ asset('img/hanastore.png') }}')">
                    <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> COLLECTION CATALOGUE</h4>
                </div>

                <div class="card-body">
                    <div class="form-group col-sm-4">
                        <label class="mr-3 badge badge-info">Search by name or id,...</label>
                        <form action="/admin/category/search">
                            <div class="form-group">
                                <input type="text" name="records" id="search" class="form-control" placeholder="Search Collection Data" />
                            </div>
                        </form>

                        <div class="ml-2">
                            <a href="/admin/category/create" class="btn btn-warning"><i class="far fa-plus-square"></i> Create New</a>
                        </div>
                    </div>

                    <!--List Flower Table-->
                    <div class="limiter">
                        <div class="container-table100">
                            <div class="wrap-table100">
                                <div class="table100">
                                    @if($list_category->count()>0)
                                        <table class="table table-bordered">
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
                                                    <td class="column8">{{$item->description}}</td>
                                                    <td class="column9">
                                                        <a class="text-primary" href="/admin/category/{{$item -> id}}/edit"><i class="fas fa-edit"></i></a>

                                                        <a class="text-danger" href="{{$item-> id}}"><i class="fas fa-trash-alt "></i></a>
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
                    <div style="display: flex; align-items: center; justify-content: center;">
                        {{$list_category->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--remove category in view-->
    <script>
        $('.btn-delete').click(function () {
            var thisButton = $(this);
            swal({
                text: "Are you sure about this action?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Agree',
                cancelButtonText: 'Cancel',
                buttonsStyling: false
            }).then(function() {
                var id = thisButton.attr('href');
                $.ajax({
                    'url': '/admin/category/' + id,
                    'method': 'DELETE',
                    'data':{
                        '_token':$('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        swal({
                            text: 'Category has deleted.',
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
    <!--remove category in view-->
@endsection
