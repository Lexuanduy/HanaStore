@extends('admin.layout.app', [
    'currentPage' => 'form',
    'current_menu' => 'product_manager',
    'current_sub_menu' => 'create_new',
])
@section('page-title', 'Create new flower')
@section('content')
    <style>

        /* Style Three */

        img.broken {
            position: relative;
            min-height: 40px;
        }

        img.broken:before {
            content: " ";
            display: block;

            position: absolute;
            left: 0;
            height: calc(100% + 10px);
            width: 100%;
            background-color: rgb(235, 235, 235);
            border: 2px dotted rgb(200, 200, 200);
            border-radius: 5px;
        }

        img.broken:after {
            content: attr(alt);
            display: block;
            font-size: 16px;
            font-style: normal;
            color: rgb(100, 100, 100);

            position: absolute;
            top: 5px;
            left: 0;
            width: 100%;
            text-align: center;
        }
    </style>

    <div class="row">
        <div class="col-lg-12">
            <!--main form -->
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">Vui lòng sửa các lỗi bên dưới và thử lại.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-header card-header-text" style="background: url('{{ asset('img/hanastore.png') }}')">
                    <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> Create Product</h4>
                </div>

                <!--form edit flowers-->
                <div class="card-body container">
                    <form method="POST" action="/admin/product" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group row" style="margin-bottom: -5px;">
                            <label class="col-md-2 label-on-left" for="inputSuccess">Name</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating" {{$errors->has('name')?' has-error':''}}>
                                    <input
                                        type="text" name="name" class="form-control" required> <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <!-- props name of categories by id-->
                        <div class="form-group row">
                            <label class="col-md-2 label-on-left" for="inputSuccess">Category</label>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <select name="categoryId" class="form-control">
                                        <option value="">Select category...</option>
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- props name of categories by id-->
                        <!-- props name of collections by id-->
                        <div class="form-group row">
                            <label class="col-md-2 label-on-left" for="inputSuccess">Collection</label>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <select class="form-control" name="collectionId">
                                        <option value="">Select collection...</option>
                                        @foreach($collections as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- props name of collections by id-->
                        <div class="form-group row">
                            <label class="col-md-2 label-on-left" for="inputSuccess">Price</label>
                            <div class="col-md-4">
                                <div class="input-group label-floating">
                                    <input type="text" name="price" class="form-control" required>
                                    <span class="input-group-addon">VND</span>
                                    @if($errors->has('price'))
                                        <label class="text-danger">*{{$errors->first('price')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 label-on-left" for="inputSuccess">Upload image</label>
                            <div class="form-group text-center">
                                <div class="row ml-1 custom-file">
                                    <div class="col-md-3">
                                        <input type="file" name="images" class="mr-2" accept="image/*" onchange="readURL(this);">
                                        <span class="badge">Choose image...</span>
                                        <img id="upload-image" class="broken"
                                             src="#" alt="Choose image here">
                                    </div>
                                    @if($errors->has('images'))
                                        <label class="text-danger">*{{$errors->first('images')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 label-on-left" for="inputSuccess">Sale</label>
                            <div class="col-md-4">
                                <div class="input-group label-floating">
                                    <input type="text" name="sale" class="form-control" required>
                                    <span class="input-group-addon">%</span>
                                    @if($errors->has('sale'))
                                        <label class="text-danger">*{{$errors->first('sale')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 label-on-left" for="inputSuccess">Description</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <input type="text" name="description" class="form-control" required>
                                    @if($errors->has('description'))
                                        <label class="text-danger">*{{$errors->first('description')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 label-on-left" for="inputSuccess">Detail</label>
                            <div class="col-md-8">
                                <div class="form-group label-floating">
                                    <textarea class="form-control" name="detail" rows="3" required></textarea>
                                    @if($errors->has('detail'))
                                        <label class="text-danger">*{{$errors->first('detail')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <button type="submit" value="Submit" class="btn btn-primary">Create
                                    <div class="ripple-container"></div>
                                </button>
                                <button type="reset" value="Reset" class="btn btn-reset btn-danger">Reset
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--preview image after selected from storage-->
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#upload-image')
                        .attr('src', e.target.result)
                        .addClass("img-thumbnail")
                        .width(140)
                        .height(140);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <!--preview image after selected from storage-->

    <!--Reset-->
    <script>
        $('.btn-reset').click( function () {
            $('.broken').attr('src', '').removeClass('img-thumbnail');
        })
    </script>
    <!--Reset-->
@endsection
