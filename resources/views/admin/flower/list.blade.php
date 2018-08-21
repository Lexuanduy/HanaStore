@extends('admin.layouts.master', ['currentPage' => 'list-product'])

@section('page-title', 'Danh sách sản phẩm')
@section('title-content', 'Danh sách sản phẩm')
@section('content')
    {{--content--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead style="background-color: #390F18;">
                            <tr class="row">
                                <th>&nbsp;</th>
                                <th class="text-center text-white">Mã</th>
                                <th class="text-center text-white">Tên</th>
                                <th class="text-center text-white">Ảnh</th>
                                <th class="text-center text-white">Giá</th>
                                <th class="text-center text-white">Sale</th>
                                <th class="text-center text-white">Danh mục</th>
                                <th class="text-center text-white">Bộ sưu tập</th>
                                {{--<th class="text-center">{{__('content.ngay.tao')}}</th>--}}
                                <th class="text-center text-white">Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $item)
                                <tr class="row" id="row-item-{{$item->id}}">
                                    <td class="text-center">
                                        <div class="checkbox">
                                            <input id="checkbox{{$item->id}}" type="checkbox"
                                                   class="check-item">
                                            <label for="checkbox{{$item->id}}"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">{{$item -> id}}</td>
                                    <td class="text-center">{{$item-> name}}</td>
                                    <td class="text-center">
                                        <div class="card"
                                             style="width: 100px; height: 100px;border-radius: 5px; margin-left: 40px; margin-top: 20px;">
                                            <div style="height: 100px;
                                                    background-image: url('{{asset('img/product/'. $item->images)}}');
                                                    background-size: cover;width: 100px;border-radius: 5px;" class="showImage">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{number_format($item-> price,0,',','.')}}</td>
                                    <td class="text-center">{{number_format($item-> sale,0,',','.')}}</td>
                                    <td class="text-center">{{$item->category-> name}}</td>
                                    <td class="text-center">{{$item->collection->name}}</td>
                                    {{--<td class="text-center">{{$item->created_at}}</td>--}}
                                    <td class="text-center">
                                        @if($item->status == 1) Còn hàng
                                        @elseif($item-> status == 2) Hết hàng
                                        @endif
                                    </td>
                                    <td class="td-actions text-right text-center">
                                        <button type="button" rel="tooltip"
                                                title="Sửa"
                                                class="btn btn-info btn-simple btn-xs btn-edit">
                                            <a href="#"> <i class="fa fa-edit"></i></a>
                                        </button>
                                        <button type="button" rel="tooltip"
                                                title="Xóa"
                                                class="btn btn-danger btn-simple btn-xs btn-delete"
                                                id="{{$item-> id}}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="checkbox form-group col-md-2 ">
                                <input id="checkbox-all" type="checkbox" class="form-control">
                                <label for="checkbox-all">Tất cả</label>
                            </div>
                            <div class="form-group col-md-3">
                                <select name="" id="select-action" class="form-control selcls">
                                    <option value="0">Chọn phương thức</option>
                                    <option value="1">Xóa mục đã chọn</option>
                                    <option value="2">Chức năng khác</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary"
                                        id="btn-apply">Thực hiện</button>
                            </div>
                            <div class="col-md-4 form-group text-center">
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--mess hello sir--}}
    <div class="alert alert-info" role="alert" id="messageHello" style="border-radius: 5px"></div>
    {{-- end mess hello sir--}}

    {{--modal show image--}}
    <!-- The Modal -->
    <div id="myModalImage" class="modal-image">
        <span class="close-image">&times;</span>
        <img class="modal-content-image" id="img01">
    </div>
    {{--end modal show image--}}

    {{--Modal confirm delete--}}
    <div class="modal fade" id="modalDelete" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xóa sản phẩm</h4>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc muốn xóa?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                    <button type="button" class="btn btn-primary" id="accept">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>

    {{--From delete--}}
    <form action="" method="POST" enctype="multipart/form-data" id="form-delete" >
        {{ csrf_field() }}
        @method('DELETE')
    </form>
    {{--End from delete--}}
    {{--end content--}}
@endsection