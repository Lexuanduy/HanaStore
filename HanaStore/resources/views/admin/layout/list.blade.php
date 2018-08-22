@extends('admin.layout.master', [
    'currentPage' => 'list',
    'current_menu' => 'product_manager',
    'current_sub_menu' => 'list',
])
@section('page-title', 'List products')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title float-left">List Products</h5>
            <a href="/admin/product/create" class="float-right"><i class="far fa-plus-square pr-2"
                                                                   style="margin-right: 3px;"></i>Create new</a>
            <div class="clearfix"></div>
            <form action="" class="form-inline" style="width: 100%;">
                <div class="form-group">
                    <label class="mr-3"></label>
                    <select name="categoryId" class="form-control mr-3">
                        <option value="0">All category</option>
                        @foreach($categories as $item)
                            <option
                                value="{{$item->id}}" {{$categoryId == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Lọc" class="btn btn-outline-success">
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">All category</th>
                    <th scope="col" class="w-25">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sale</th>
                    <th scope="col">Description</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products_in_view as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>
                            <div class="card">
                                 {{--style="background-image: url('{{\JD\Cloudder\Facades\Cloudder::show($item->images, array('width' => 70, 'height' => 70, 'crop' => 'fit'))}}'); background-size: cover; width: 77px; height: 60px">--}}
                                <a href="/admin/product/{{$item->id}}"><img src="{{\JD\Cloudder\Facades\Cloudder::show($item->images, array('width' => 70, 'height' => 70, 'crop' => 'fit'))}}" style="background-size: cover; width: 77px; height: 60px" /></a>

                            </div>
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->sale}}</td>
                        <td>{{$item->detail}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <a href="/admin/product/{{$item -> id}}/edit">Edit</a>&nbsp
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row float-right mr-2">
                {{$products_in_view->links()}}
            </div>
        </div>
    </div>
@endsection
