@extends('admin.layout.master', [
    'currentPage' => 'form',
    'current_menu' => 'collection_manager',
    'current_sub_menu' => 'create_new',
])
@section('page-title', 'Create New Collection ')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <!--main form -->
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        Vui lòng sửa các lỗi bên dưới và thử lại.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="/admin/collection" class="form-horizontal bg-info"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="card-header card-header-text text-center" data-background-color="green">
                        <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> Create collection </h4>
                    </div>

                    <!--form edit flowers-->
                    <div class="card-content">
                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Name</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating" {{$errors->has('name')?' has-error':''}}>
                                    <input type="text" name="name" class="form-control" required>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Image</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <button type="button" class="btn btn-info btn-sm">
                                        <input type="file" name="images" class="form-control" required>Chọn tệp ...</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Description</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <input type="text" name="description" class="form-control" required>
                                    @if($errors->has('description'))
                                        <label class="text-danger">*{{$errors->first('description')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" value="Submit" class="btn btn-fill btn-instagram">Create
                                    <div class="ripple-container"></div>
                                </button>
                                <button type="reset" value="Reset" class="btn btn-fill btn-danger">Reset
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}
            {{--<div class="card">--}}
                {{--@if ($errors->any())--}}
                    {{--<div class="alert alert-danger">--}}
                        {{--Vui lòng sửa các lỗi bên dưới và thử lại.--}}
                        {{--<ul>--}}
                            {{--@foreach ($errors->all() as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div>--}}
            {{--@endif--}}
            {{--<!--main form -->--}}
            {{--<div class="card">--}}
                {{--<form method="post" action="/admin/collection" class="form-horizontal">--}}
                    {{--{{csrf_field()}}--}}
                    {{--<div class="card-header card-header-text text-center" data-background-color="green">--}}
                        {{--<h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> Create Collection</h4>--}}
                    {{--</div>--}}


                    {{--<!--form new flowers-->--}}
                    {{--<div class="card-content">--}}
                        {{--<div class="row">--}}
                            {{--<label class="col-sm-2 label-on-left" for="inputSuccess">Name</label>--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<div class="form-group label-floating">--}}
                                    {{--<input type="text" name="name" class="form-control" required>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row">--}}
                            {{--<label class="col-sm-2 label-on-left" for="inputSuccess">Image</label>--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<div class="form-group label-floating">--}}
                                    {{--<button type="button" class="btn btn-info btn-sm">--}}
                                        {{--<input type="file" name="images" class="form-control" required>Chọn tệp ...</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- feature is developing, optional-->--}}
                        {{--<div class="row">--}}
                            {{--<label class="col-sm-2 label-on-left" for="inputSuccess">Description</label>--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<div class="form-group label-floating">--}}
                                    {{--<input type="text" name="description" class="form-control "  required>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-sm-4"></div>--}}
                            {{--<div class="col-sm-8">--}}
                                {{--<button type="submit" value="Submit" class="btn btn-fill btn-instagram" style="margin-right: 50px">Create--}}
                                    {{--<div class="ripple-container"></div>--}}
                                {{--</button>--}}
                                {{--<button type="reset" value="Reset" class="btn btn-fill btn-danger">Reset--}}
                                    {{--<div class="ripple-container"></div>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection
