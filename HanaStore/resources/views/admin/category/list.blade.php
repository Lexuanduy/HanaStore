@extends('admin.layout.master', [
    'currentPage' => 'list',
    'current_menu' => 'category_manager',
    'current_sub_menu' => 'list',
])
@section('page-title', 'List categorys')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-header card-header-text text-center" data-background-color="green">
                <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> DANH SÁCH DANH MỤC</h4>
            </div>
            @if($list_category->count()>0)
                <table class="table  ">
                    <thead class="black white-text" >
                    <tr class="row">

                        <th class="col">{{__('Id')}}</th>
                        <th class="col">{{__('Category')}}</th>
                        <th class="col">{{__('Description')}}</th>
                        <th class="col">{{__('Action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_category as $item)
                        <tr class="row" id="row-item-{{$item->id}}">

                            <td class="col">{{$item->id}}</td>
                            <td class="col">{{$item->name}}</td>
                            <td class="col">{{$item->description}}</td>
                            <td class="col">
                                <a href="/admin/category/{{$item-> id}}/edit" class="fas fa-edit  " style="margin-right: 15px;"></a>
                                <a href="{{$item-> id}}"  class="btn-delete fas fa-trash-alt "></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    @else
                        <div class="alert alert-danger">Hiện tại không có danh mục sản phẩm. Vui lòng click <a
                                href="/admin/category/create" title="Thêm mới danh mục" class="btn-link">vào đây</a> để tạo mới.
                        </div>
                    @endif
                </table>
        </div>
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
