@extends('admin.layout.master', [
    'currentPage' => 'edit',
    'current_menu' => 'product_manager',
    'current_sub_menu' => 'edit',
])
@section('page-title', 'Edit products')
@section('content')
    <style>

        /* Style Three */

        .bg-color{
            background: linear-gradient(to bottom right, #fdfcfb, #e2d1c3);
        }

        .form-group{
            margin-bottom: 0;
        }

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

                <div class="card-header card-header-text" style="background: url('{{ asset('img/hanastore.png') }}')">
                    <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> Edit Flower</h4>
                </div>

                <!--form edit flowers-->
                <div class="card-body container bg-color">
                    <!--main form -->
                    <div class="card-body"><div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <form class="needs-validation" role="form" novalidate method="post" action="/admin/product/{{ $product->id }}" enctype="multipart/form-data">
                                @method('PUT')
                                {{csrf_field()}}

                                    <div class="row">
                                        <label class="col-sm-2">Name</label>
                                        <div class="col-sm-6 form-group mb-3">
                                            <div class="input-group" {{$errors->has('name')?' has-error':''}}>
                                                <div class="form-group input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$product->name}}" required/>
                                                <div class="invalid-feedback">
                                                    Please choose a username.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- props name of categories by id-->
                                    <div class="row">
                                        <label class="col-sm-2">Category</label>
                                        <div class="col-sm-4 form-group mb-3">
                                            <select class="form-control" name="categoryId">
                                                @foreach($categories as $item)
                                                    <option
                                                        value="{{$item->id}}" {{$product -> categoryId == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please choose a category.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- props name of categories by id-->

                                    <!-- props name of collections by id-->
                                    <div class="row">
                                        <label class="col-sm-2">Collection</label>
                                        <div class="col-sm-4 form-group mb-3">
                                            <select class="form-control" name="collectionId">
                                                @foreach($collections as $item)
                                                    <option
                                                        value="{{$item->id}}" {{$product -> collectionId == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Please choose a collection.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- props name of collections by id-->

                                    <div class="row">
                                        <label class="col-sm-2">Price</label>
                                        <div class="col-sm-6 form-group mb-3">
                                            <div class="input-group">
                                                <div class="form-group input-group-prepend">
                                                    <span class="input-group-text">Price</span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$product->price}}" required>
                                                <div class="form-group input-group-append">
                                                    <span class="input-group-text">VND</span>
                                                </div>
                                                @if($errors->has('price'))
                                                    <label class="text-danger">*{{$errors->first('price')}}</label>
                                                @endif
                                                <div class="invalid-feedback">
                                                    Please choose a price.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2">Images</label>
                                        <div class="col-sm-6 form-group mb-3">
                                            <div class="row ml-1">
                                                <div class="col-sm-6">
                                                    <input type="file" name="images" class="mr-2" accept="image/*" onchange="readURL(this);">
                                                    <span class="badge">Choose new image...</span>
                                                    <img id="upload-image" class="broken" src="#" alt="New image here" />
                                                </div>
                                                <div class="col-sm-6">
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
                                        <label class="col-sm-2">Sale</label>
                                        <div class="col-sm-6 form-group mb-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{$product->sale}}" required>
                                                <div class="form-group input-group-prepend">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                @if($errors->has('sale'))
                                                    <label class="text-danger">*{{$errors->first('sale')}}</label>
                                                @endif
                                                <div class="invalid-feedback">
                                                    Please choose a sale.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2">Description</label>
                                        <div class="col-sm-6 form-group mb-3">
                                            <input name="description" type="text" class="form-control" value="{{$product->description}}" required>
                                            @if($errors->has('description'))
                                                <label class="text-danger">*{{$errors->first('description')}}</label>
                                            @endif
                                            <div class="invalid-feedback">
                                                Please choose a description.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2">Detail</label>
                                        <div class="col-sm-6 form-group mb-3">
                                            <textarea name="detail" class="form-control" rows="3" required>{{$product->detail}}</textarea>
                                            @if($errors->has('detail'))
                                                <label class="text-danger">*{{$errors->first('detail')}}</label>
                                            @endif
                                            <div class="invalid-feedback">
                                                Please choose a detail.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-reset btn-danger">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--form edit flowers-->
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
