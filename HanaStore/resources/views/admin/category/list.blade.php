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
            background-color: #117a8b;
            color: #fff;
        }
        .id-flower{
            background-color: #ffff00;
        }
    </style>
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="card-header card-header-text text-center col-sm-3" data-background-color="green">
                    <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> CATEGORY CATALOGUE</h4>
                </div>
                <div class="ml-2">
                    <a href="/admin/category/create" class="btn btn-twitter"><i class="far fa-plus-square"></i> Create New</a>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-4">
                    <label class="mr-3 badge">Search by name or id,...</label>
                    <form action="/admin/category/search">
                        <div class="form-group">
                            <input type="text" name="records" id="search" class="form-control" placeholder="Search Category Data" />
                        </div>
                    </form>
                </div>
            </div>

            <!--List Flower Table-->
            <div class="row">
                <div class="panel panel-default">
                    <div class="table-responsive">
                        @if($list_category->count()>0)
                            <table class="table table-hover table-striped table-condensed table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" style="width: 1em">{{__('ID')}}</th>
                                    <th scope="col" style="width: 10em">{{__('Image')}}</th>
                                    <th class="col">{{__('Category')}}</th>
                                    <th class="col">{{__('Description')}}</th>
                                    <th scope="col" style="width: 45px">{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list_category as $item)
                                    <tr>
                                        <th class="id-flower" scope="row">{{$item->id}}</th>
                                        <td>
                                            <div class="card" style="background-size: cover; height: 120px; width: 120px">
                                                <a href="/admin/category/{{ $item->id }}">
                                                    <img src="{{$item->images}}" class="img-thumbnail" style="background-size: cover; height: 120px; width: 120px" alt="images"/></a>
                                            </div>
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->description}}</td>
                                        <td class="none">
                                            <a class="btn btn-info btn-sm" href="/admin/category/{{$item -> id}}/edit" style="width: 96.06px"><i class="fas fa-edit"></i> <b>Edit</b></a>

                                            <a class="btn btn-delete btn-danger btn-sm" href="{{$item-> id}}"><i class="fas fa-trash-alt "></i> <b>Remove</b></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                @else
                                    <div class="alert alert-danger">Hiện tại không có danh mục nào. Vui lòng click <a
                                            href="/admin/category/create" title="Thêm mới bộ sưu tập" class="btn-link">vào đây</a> để tạo mới.
                                    </div>
                                @endif
                            </table>
                    </div>
                </div>
            </div>
            <!--List Flower Table-->
            <div class="row float-right mr-2">
                {{$list_category->links()}}
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
