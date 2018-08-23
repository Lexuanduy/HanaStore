@extends('admin.layout.master', [
    'currentPage' => 'list',
    'current_menu' => 'collection_manager',
    'current_sub_menu' => 'list',
])
@section('page-title','List Collection')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-header card-header-text text-center" data-background-color="green">
                <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> DANH SÁCH BỘ SƯU TẬP</h4>
            </div>
            @if($collection->count()>0)
                <table class="table  ">
                    <thead class="black white-text" >
                        <tr class="row">
                            <th class="col">{{__('Id')}}</th>
                            <th class="col">{{__('Image')}}</th>
                            <th class="col">{{__('Collection')}}</th>
                            <th class="col">{{__('Description')}}</th>
                            <th class="col">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collection as $item)
                            <tr class="row" id="row-item-{{$item->id}}">

                                <td class="col">{{$item->id}}</td>
                                <td class="col">
                                    <div class="card"
                                         style="background-image: url('{{$item->images}}'); background-size: cover; width: 60px; height: 60px;">
                                    </div>
                                </td>
                                <td class="col">{{$item->name}}</td>
                                <td class="col">{{$item->description}}</td>
                                <td class="col">
                                    <a href="/admin/collection/{{$item-> id}}/edit" class="fas fa-edit  " style="margin-right: 15px;"></a>
                                    <a href="{{$item-> id}}"  class="btn-delete fas fa-trash-alt "></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            @else
                <div class="alert alert-danger">Hiện tại không có danh mục sản phẩm. Vui lòng click <a
                            href="/admin/collection/create" title="Thêm mới sản phẩm" class="btn-link">vào đây</a> để tạo mới.
                </div>
            @endif
                </table>
            <div class="row float-right mr-2">
                    {{$collection->links()}}
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
                    'url': '/admin/collection/' + id,
                    'method': 'DELETE',
                    'data':{
                        '_token':$('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        swal({
                            text: 'Collection has deleted.',
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

