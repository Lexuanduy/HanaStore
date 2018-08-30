@extends('admin.layout.app', [
    'currentPage' => 'edit',
    'current_menu' => 'product_manager',
    'current_sub_menu' => 'edit',
])
@section('page-title', 'Edit products')
@section('content')
    <style>

        /* Style Three */

        img.broken {
            position: relative;
            min-height: 30px;
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
                <form method="post" action="/admin/product/{{ $product->id }}" class="form-horizontal bg-info" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}
                    <div class="card-header card-header-text text-center" data-background-color="green">
                        <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> Edit Flower</h4>
                    </div>

                    <!--form edit flowers-->
                    <div class="card-content">
                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Name</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <input type="text" name="name" class="form-control" value="{{$product->name}}"
                                           required>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>

                        <!-- props name of categories by id-->
                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Category</label>
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <select class="form-control" name="categoryId">
                                        @foreach($categories as $item)
                                            <option
                                                value="{{$item->id}}" {{$product -> categoryId == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- props name of categories by id-->

                        <!-- props name of collections by id-->
                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Collection</label>
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <select class="form-control" name="collectionId">
                                        @foreach($collections as $item)
                                            <option
                                                value="{{$item->id}}" {{$product -> collectionId == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- props name of collections by id-->

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Price</label>
                            <div class="col-sm-4">
                                <div class="input-group label-floating">
                                    <input type="text" name="price" class="form-control" value="{{$product->price}}"
                                           required>
                                    <span class="input-group-addon">VND</span>
                                </div>
                            </div>
                        </div>

                        <div class="row  text-center">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Upload image</label>
                            <div class="form-group">
                                <div class="row ml-1">
                                    <div class="col-sm-3">
                                        <input type="file" name="images" class="mr-2" accept="image/*" onchange="readURL(this);">
                                        <span class="badge">Choose new image...</span>
                                        <img id="upload-image" class="broken" src="#" alt="New image here" />
                                    </div>
                                    <div class="col-sm-3">
                                        <span class="badge">Previous Image</span>
                                        <img src="{{ $product->images }}" class="img-thumbnail" style="width: 150px; height: 150px;"/>
                                    </div>
                                    @if($errors->has('images'))
                                    <label class="text-danger">*{{$errors->first('images')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Sale</label>
                            <div class="col-sm-4">
                                <div class="input-group label-floating">
                                    <input type="text" name="sale" class="form-control" value="{{$product->sale}}"
                                           required>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Description</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <input type="text" name="description" class="form-control"
                                           value="{{$product->description}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Detail</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <textarea class="form-control" name="detail" rows="3"
                                              required>{{$product->detail}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" value="Submit" class="btn btn-fill btn-instagram">Update
                                    <div class="ripple-container"></div>
                                </button>
                                <button type="reset" value="Reset" class="btn btn-reset btn-fill btn-danger">Reset
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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

    <!--reset-->
    <script>
        $('.btn-reset').click(function(){
            /* Single line Reset function executes on click of Reset Button */
            $('.broken').attr('src', '').removeClass('img-thumbnail');
        });
    </script>
    <!--reset-->
@endsection
