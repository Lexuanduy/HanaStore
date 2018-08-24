@extends('admin.layout.master', [
    'currentPage' => 'edit',
    'current_menu' => 'category_manager',
    'current_sub_menu' => 'edit',
])
@section('page-title', 'Edit category')
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
                <form method="post" action="/admin/category/{{ $category->id }}" class="form-horizontal bg-info">
                    @method('PUT')
                    {{csrf_field()}}
                    <div class="card-header card-header-text text-center" data-background-color="green">
                        <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> Edit Category</h4>
                    </div>

                    <!--form edit flowers-->
                    <div class="card-content">
                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Name</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <input type="text" name="name" class="form-control" value="{{$category->name}}"
                                           required>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Upload image</label>
                            <div class="form-group">
                                <div class="row ml-1 custom-file">
                                    {{--<input type="file" name="images" class="mr-2"><span>Choose file...</span>--}}
                                    {{--<img src="{{ $product->images }}" class="img-thumbnail" style="width: 150px; height: 150px;"/>--}}
                                    {{--@if($errors->has('images'))--}}
                                    {{--<label class="text-danger">*{{$errors->first('images')}}</label>--}}
                                    {{--@endif--}}

                                    <input type="text" name="images" value="{{$category -> images}}">
                                    <img src="{{$category -> images}}" alt="" style="width:200px;">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Description</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <input type="text" name="description" class="form-control"
                                           value="{{$category->description}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" value="Submit" class="btn btn-fill btn-instagram">Update
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
@endsection

