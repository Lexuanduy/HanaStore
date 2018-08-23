@extends('admin.layout.master', [
    'currentPage' => 'list',
    'current_menu' => 'product_manager',
    'current_sub_menu' => 'list_item',
])
@section('page-title', 'List flowers')
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="form-group">
                    <label class="mr-3"></label>
                    <select name="categoryId" class="form-control mr-3">
                        <option value="0">All category</option>
                        @foreach($categories as $item)
                            <option
                                value="{{$item->id}}" {{$categoryId == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Filter" class="btn btn-outline-success">
                </div>
                <div class="panel-heading">
                    <form action="" method="POST" id="frmsearch">
                        <input type="text" name="search" class="form-control" id="search" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="panel panel-default">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-condensed table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
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
                                        <a href="/admin/product/{{$item -> id}}/edit"><b>Edit</b></a>
                                        |
                                        <a href="/admin/product/{{$item -> id}}"><b>Remove</b></a>
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
        </div>
    </div>
@endsection
