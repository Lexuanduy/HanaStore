{{--* Created by PhpStorm.--}}
{{--* User: phuoc--}}
{{--* Date: 11-Aug-18--}}
{{--* Time: 1:58 AM--}}

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Product</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
              integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <script src="{{asset('js/app.js')}}"></script>
    </head>
    <body>
        <div class="container">
            <h1>List product</h1>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title float-left">
                        List Product
                        <small class="text-muted">show all product</small>
                    </h3>
                    <a href="/admin/product/create" class="btn float-right"><i class="fas fa-plus-circle"></i> Create new</a>
                    <div class="clearfix"></div>
                    <div class="alert alert-success d-none" role="alert" id="messageSuccess"></div>
                    <div class="alert alert-danger d-none" role="alert" id="messageError"></div>
                    @if(count($products_in_view)>0)
                        <table class="table table-striped">
                            {{--<tr class="row">--}}
                            {{--<td class="col-md-12">--}}
                            {{--<form action="/admin/product/list" method="get">--}}
                            {{--<select name="categoryId">--}}
                            {{--<option value="0">All</option>--}}
                            {{--@foreach($categories as $category)--}}
                            {{--<option value="{{$category->id}}" {{$category->id==$choosedCategoryId?'selected':''}}>{{$category->name}}</option>--}}
                            {{--@endforeach--}}
                            {{--</select>--}}
                            {{--<input type="submit" value="Search">--}}
                            {{--</form>--}}
                            {{--</td>--}}
                            {{--</tr>--}}
                            <thead>
                            <tr class="row">
                                <th class="col-md-1"></th>
                                <th class="col-md-1">ID</th>
                                <th class="col-md-2">Name</th>
                                <th class="col-md-2">Thumbnail</th>
                                <th class="col-md-2">Description</th>
                                <th class="col-md-1">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products_in_view as $item)
                                <tr class="row" id="row-item-{{$item->id}}">
                                    <td class="col-md-1 text-center">
                                        <input type="checkbox" class="check-item">
                                    </td>
                                    <td class="col-md-1">{{$item->id}}</td>
                                    <td class="col-md-2">
                                        <div class="card"
                                             style="background-image: url('{{$item->images}}'); background-size: cover; width: 60px; height: 60px;">
                                        </div>
                                    </td>
                                    <td class="col-md-2">{{$item->name}}</td>
                                    <td class="col-md-2">{{$item->description}}</td>
                                    <td class="col-md-1">{{$item->price}}</td>
                                    <td class="col-md-3">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info" role="alert">
                            Have no bakery, click <a href="/admin/product/create">here</a> to create new.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
