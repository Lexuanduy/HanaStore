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
                    <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> FLOWERS CATALOGUE</h4>
                </div>
                <div class="ml-2">
                    <a href="/admin/product/create" class="btn btn-twitter"><i class="far fa-plus-square"></i> Create New</a>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-4">
                    <label class="mr-3 badge">Search by name or id,...</label>
                    <form action="/admin/product/search">
                        <div class="form-group">
                            <input type="text" name="records" id="search" class="form-control" placeholder="Search Flower Data" />
                        </div>
                    </form>
                </div>
            </div>

            <!--Search by category-->
            <div class="row">
                <form action="/admin/product">
                    <div class="form-group col-sm-4">
                        <label class="mr-3 badge">Search by category</label>
                        <select name="categoryId" class="form-control mr-3">
                            <option value="0">All category</option>
                            @foreach($categories as $item)
                                <option
                                    value="{{$item->id}}" {{$categoryId == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="Filter" class="btn btn-social">
                    </div>
                </form>
            </div>
            <!--Search by category-->

            <!--List Flower Table-->
            <div class="row">
                <div class="panel panel-default">
                    <div class="table-responsive">
                        @if($products_in_view->count()>0)
                            <table class="table table-hover table-striped table-condensed table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" style="width: 1em">{{__('ID')}}</th>
                                    <th scope="col" style="width: 10em">{{__('Image')}}</th>
                                    <th scope="col">{{__('Name')}}</th>
                                    <th scope="col">{{__('Category')}}</th>
                                    <th class="col">{{__('Collection')}}</th>
                                    <th scope="col">{{__('Price')}}</th>
                                    <th scope="col">{{__('Sale')}}</th>
                                    <th scope="col">{{__('Description')}}</th>
                                    <th scope="col">{{__('Detail')}}</th>
                                    <th scope="col" style="width: 45px">{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products_in_view as $item)
                                    <tr>
                                        <th class="id-flower" scope="row">{{$item->id}}</th>
                                        <td>
                                            <div class="card" style="background-size: cover; height: 120px; width: 120px">
                                                <a href="/admin/product/{{ $item->id }}">
                                                    <img src="{{$item->images}}" class="img-thumbnail" style="background-size: cover; height: 120px; width: 120px" alt="images"/></a>
                                            </div>
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->category->name}}</td>
                                        <td>{{$item->collection->name}}</td>
                                        <td>{{number_format($item->price, 0, '.', ',')}} <b>VND</b></td>
                                        <td>{{$item->sale}} %</td>
                                        <td>{{$item->detail}}</td>
                                        <td>{{$item->description}}</td>
                                        <td class="none">
                                            <a class="btn btn-info btn-sm" href="/admin/product/{{$item -> id}}/edit" style="width: 96.06px"><i class="fas fa-edit"></i> <b>Edit</b></a>

                                            <a class="btn btn-delete btn-danger btn-sm" href="{{$item-> id}}"><i class="fas fa-trash-alt "></i> <b>Remove</b></a>
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
            <!--List Flower Table-->
            <div class="row float-right mr-2">
                {{$products_in_view->links()}}
            </div>
        </div>
    </div>

    <!--remove product in view-->
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
    <!--remove product in view-->

    <!--live search-->
    {{--<script>--}}
        {{--$(document).ready(function(){--}}

            {{--fetch_customer_data();--}}

            {{--function fetch_customer_data(query = '')--}}
            {{--{--}}
                {{--$.ajax({--}}
                    {{--url:'admin/product/action',--}}
                    {{--method:'GET',--}}
                    {{--data:{query:query},--}}
                    {{--dataType:'json',--}}
                    {{--success:function(data)--}}
                    {{--{--}}
                        {{--$('tbody').html(data.table_data);--}}
                        {{--$('#total_records').text(data.total_data);--}}
                    {{--}--}}
                {{--})--}}
            {{--}--}}

            {{--$(document).on('keyup', '#search', function(){--}}
                {{--var query = $(this).val();--}}
                {{--fetch_customer_data(query);--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
@endsection
