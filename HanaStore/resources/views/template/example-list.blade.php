<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="{{asset('js/app.js')}}"></script>
    <title>Example list form</title>
</head>
<body>
<div class="card">
    <div class="card-body">
        <h5 class="card-title float-left">List</h5>
        <a href="/admin/product/create" class="float-right"><i
                class="far fa-plus-square mr-2"></i>Create new</a>
        <div class="clearfix"></div>
        <div class="row mt-3 mb-3 ml-1">
            <form action="" class="form-inline">
                <div class="form-group">
                    <label class="mr-3">Category</label>
                    <select name="categoryId" class="form-control mr-3">
                        <option value="0">All category</option>
                        {{--@foreach($categories as $item)--}}
                            {{--<option--}}
                                {{--value="{{$item->id}}" {{$categoryId == $item->id ? 'selected' : ''}}>{{$item->name}}</option>--}}
                        {{--@endforeach--}}
                    </select>
                    <input type="submit" value="Lọc" class="btn btn-outline-success">
                </div>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col" class="w-25">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            {{--<tbody>--}}
            {{--@foreach($products_in_view as $item)--}}
                {{--<tr>--}}
                    {{--<th scope="row">{{$item->id}}</th>--}}
                    {{--<td>--}}
                        {{--<div class="card"--}}
                             {{--style="background-image: url('{{\JD\Cloudder\Facades\Cloudder::show($item->image, array('width' => 70, 'height' => 70, 'crop' => 'fit'))}}'); background-size: cover; width: 77px; height: 60px">--}}
                        {{--</div>--}}
                    {{--</td>--}}
                    {{--<td>{{$item->name}}</td>--}}
                    {{--<td>{{$item->category->name}}</td>--}}
                    {{--<td>{{$item->price}}</td>--}}
                    {{--<td>--}}
                        {{--<a href="/admin/product/{{$item -> id}}/edit">{{__('message.edit')}}</a>&nbsp;&nbsp;--}}
                        {{--<a href="/admin/product/{{$item -> id}}">{{__('message.delete')}}</a>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            </tbody>
        </table>
        <div class="row float-right mr-2">
            {{--{{$products_in_view->links()}}--}}
        </div>
    </div>
</div>
</body>
</html>
