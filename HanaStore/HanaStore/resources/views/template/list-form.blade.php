<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="{{asset('js/app.js')}}"></script>
    <title>Document</title>
</head>
<body>
<div class="card">
    <div class="card-body">
        <h3 class="card-title float-left">
            List Product
            <small class="text-muted">Show all Products</small>
        </h3>
        <a href="/admin/bakery/create" class="btn float-right"><i
                class="fas fa-plus-circle mr-1"></i>Create new</a>
        <div class="clearfix"></div>
        <div class="alert alert-success d-none" role="alert" id="messageSuccess"></div>
        <div class="alert alert-danger d-none" role="alert" id="messageError"></div>
        {{--@if(count($bakeries_in_view)>0)--}}
        <div class="row m-1">
            <form action="/admin/bakery/list" method="GET" class="form-inline" name="category-form">
                <div class="form-group">
                    <label>Choose a category: </label>
                    <select name="categoryId" class="form-control m-3">
                        <option value="0">All</option>
                        {{--@foreach($categories as $category)--}}
                        {{--<option--}}
                        {{--value="{{$category->id}}" {{$category->id==$choosedCategoryId?'selected':''}}>{{$category->name}}</option>--}}
                        {{--@endforeach--}}
                    </select>
                </div>
            </form>
        </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-8 form-inline">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="" id="check-all">
                    <label class="form-check-label" for="defaultCheck1">
                        Check all
                    </label>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <select id="select-action" class="form-control">
                        <option selected value="0">Select action</option>
                        <option value="1">Delete all checked</option>
                        <option value="2">Another action</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2" id="btn-apply">Apply</button>
            </div>
            <div class="col-md-4">
                <div class="float-right">
                    {{--{{ $bakeries_in_view -> appends($_GET) -> links() }}--}}
                </div>
            </div>
        </div>
        {{--@else--}}
            {{--<div class="alert alert-info" role="alert">--}}
            {{--{!! __('message.tip_create_bakery') !!}--}}
            {{--</div>--}}
            {{--@endif--}}
    </div>
</div>
</body>
</html>
