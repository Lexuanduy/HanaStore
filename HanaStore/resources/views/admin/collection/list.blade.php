@extends('admin.layout.master')
@section('page-title','List Collection')
@section('content')
    <table class="table table-striped">
        <thead>
        <tr class="row">
            <th class="col-md-1"></th>
            <th class="col-md-1">{{__('Id')}}</th>
            <th class="col-md-2">{{__('Image')}}</th>
            <th class="col-md-2">{{__('Collection')}}</th>
            <th class="col-md-3">{{__('Description')}}</th>
            <th class="col-md-2">{{__('Action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($collection as $item)
            <tr class="row" id="row-item-{{$item->id}}">
                <td class="col-md-1 "></td>
                <td class="col-md-1">{{$item->id}}</td>
                <td class="col-md-2">
                    <div class="card"
                         style="background-image: url('{{$item->images}}'); background-size: cover; width: 60px; height: 60px;">
                    </div>
                </td>
                <td class="col-md-2">{{$item->name}}</td>
                <td class="col-md-3">{{$item->description}}</td>
                <td class="col-md-2">
                    <a href="/admin/collection/{{$item-> id}}/edit" class="fas fa-edit fa-2x " style="margin-right: 15px;"></a>
                    <a href="{{$item-> id}}"  class="btn-delete fas fa-trash-alt fa-2x"></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
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
                    'url': '/admin/collection/' + id,
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