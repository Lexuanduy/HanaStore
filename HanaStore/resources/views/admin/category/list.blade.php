@extends('admin.layout.master', [
    'currentPage' => 'list',
    'current_menu' => 'category_manager',
    'current_sub_menu' => 'list',
])
@section('page-title', 'List categorys')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">DANH SÁCH DANH MỤC</h4>
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                @if (Session::has('message'))
                    <div class="alert {{ Session::get('message-class') }}">{{ Session::get('message') }}</div>
                @endif
                <div class="material-datatables">
                    <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                @if($list_category->count()>0)
                                    <table id="datatables"
                                           class="table table-striped table-no-bordered table-hover dataTable dtr-inline"
                                           cellspacing="0" width="100%" style="width: 100%;" role="grid"
                                           aria-describedby="datatables_info">
                                        <thead>
                                        <tr role="row">

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($list_category as $item)
                                            <tr role="row" class="odd">
                                                <td>{{$item->id}}</td>
                                                <td tabindex="0" class="sorting_1">{{$item->name}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>
                                                    <div class="card"
                                                         style="width: 100px;height: 80px;background-image: url('{{$item->images}}'); background-size: cover">
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <a href="/admin/category/{{$item->id}}/edit" class="btn btn-simple btn-warning btn-icon edit"><i
                                                            class="material-icons">edit</i></a>
                                                    <a href="{{$item->id}}" class="btn btn-simple btn-danger btn-icon remove btn-delete"><i
                                                            class="material-icons">close</i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            </div>
                            @else
                                <div class="alert alert-info">Hiện tại không có bộ sưu tập. Vui lòng click <a
                                        href="/admin/category/create" title="Thêm mới danh mục" class="btn-link">vào đây</a> để tạo mới.
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                                {{ $list_category->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
    <script>
        $('.btn-delete').click(function () {
            var thisButton = $(this);
            swal({
                text: "Bạn có chắc muốn xoá danh mục này không?",
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
                    'url': '/admin/category/' + id,
                    'method': 'DELETE',
                    'data':{
                        '_token':$('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        swal({
                            text: 'Danh mục đã bị xoá.',
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
                            text: 'Có lỗi xảy ra, vui lòng thử lại sau.',
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
