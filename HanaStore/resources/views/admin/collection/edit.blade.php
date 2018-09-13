@extends('admin.layout.master', [
    'currentPage' => 'edit',
    'current_menu' => 'collection_manager',
    'current_sub_menu' => 'edit',
])
@section('page-title', 'Edit Collection')
@section('content')
    <style>

        /* Style Three */

        .bg-color{
            background: linear-gradient(to bottom right, #fdfcfb, #e2d1c3);
        }

        .form-group{
            margin-bottom: 0;
        }

        .form-group input[type=file] {
            opacity: 0;
            position: absolute;
        }

        .row{
            margin-bottom: 1rem;
        }

        img.broken {
            position: relative;
            vertical-align: baseline;
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
                <div class="card-header card-header-text">
                    <h4 class="mb-0"><i class="fab fa-pagelines text-danger"></i> Edit Collection</h4>
                </div>

                <!--form edit collections-->
                <div class="card-body container bg-color">
                    <!--main form -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <form class="needs-validation" novalidate role="form" method="POST" action="/admin/collection/{{ $collection->id }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    {{csrf_field()}}

                                    <div class="row">
                                        <label class="col-sm-2">Name</label>
                                        <div class="col-sm-6 form-group mb-3">
                                            <div class="input-group" {{$errors->has('name')?' has-error':''}}>
                                                <div class="form-group input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{$collection->name}}" required>
                                                <div class="invalid-feedback">
                                                    Please choose a username.
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
                                                    <span class="badge badge-info">Choose new image...</span>
                                                    <img id="upload-image" class="broken" src="#" alt="New image preview" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <span class="badge">Previous Image</span>
                                                    <img src="{{ $collection->images }}" class="img-thumbnail" style="width: 150px; height: 150px;"/>
                                                </div>
                                                @if($errors->has('images'))
                                                    <label class="text-danger">*{{$errors->first('images')}}</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2">Description</label>
                                        <div class="col-sm-6 form-group mb-3">
                                            <input name="description" type="text" class="form-control" value="{{$collection->description}}" required>
                                            @if($errors->has('description'))
                                                <label class="text-danger">*{{$errors->first('description')}}</label>
                                            @endif
                                            <div class="invalid-feedback">
                                                Please choose a description.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
                                            <button type="submit" value="Submit" class="btn btn-primary">Update</button>
                                            <button type="reset" value="Reset" class="btn btn-reset btn-danger">Reset</button>
                                        </div>
                                    </div>
                                </form>
                                <!--main form-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--form edit collections-->
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

    <!--reset-->
    <script>
        $('.btn-reset').click(function(){
            /* Single line Reset function executes on click of Reset Button */
            $('.broken').attr('src', '').removeClass('img-thumbnail');
        });
    </script>
    <!--reset-->
@endsection
