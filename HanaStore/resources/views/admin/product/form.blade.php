@extends('admin.layout.master', [
    'currentPage' => 'form',
    'current_menu' => 'product_manager',
    'current_sub_menu' => 'create_new',
])
@section('page-title', 'Create new flower')
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
                <div class="card-header card-header-text">
                    <h4 class="mb-0"><i class="fab fa-pagelines text-danger"></i> NHẬP HOA MỚI</h4>
                </div>

                <!--form edit flowers-->
                <div class="card-body container bg-color">
                    <!--main form -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <form class="needs-validation" role="form" novalidate method="POST" action="/admin/product" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <label class="col-sm-2">Tên loài hoa</label>
                                        <div class="col-sm-6 form-group mb-3">
                                            <div class="input-group" {{$errors->has('name')?' has-error':''}}>
                                                <input type="text" name="name" class="form-control" placeholder="Tên gọi" required>
                                                <div class="invalid-feedback">
                                                    Vui lòng chọn tên gọi loài hoa.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- props name of categories by id-->
                                    <div class="row">
                                        <label class="col-sm-2">Danh mục</label>
                                        <div class="col-sm-4 form-group mb-3">
                                            <select name="categoryId" class="form-control" required>
                                                <option value="">Chọn danh mục...</option>
                                                @foreach($categories as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Vui lòng chọn danh mục hoa.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- props name of categories by id-->

                                    <!-- props name of collections by id-->
                                    <div class="row">
                                        <label class="col-sm-2">Bộ sưu tập</label>
                                        <div class="col-sm-4 form-group mb-3">
                                            <select name="collectionId" class="form-control" required>
                                                <option value="">Chọn bộ sưu tập...</option>
                                                @foreach($collections as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Vui lòng chọn bộ sưu tập hoa.
                                            </div>
                                        </div>
                                    </div>
                                    <!-- props name of collections by id-->

                                    <div class="row">
                                        <label class="col-sm-2">Giá thành</label>
                                        <div class="col-sm-6 form-group mb-3">
                                            <div class="input-group">
                                                <div class="form-group input-group-prepend">
                                                    <span class="input-group-text">Giá</span>
                                                </div>
                                                <input type="text" name="price" class="form-control" required>
                                                <div class="form-group input-group-append">
                                                    <span class="input-group-text">VND</span>
                                                </div>
                                                @if($errors->has('price'))
                                                    <label class="text-danger">*{{$errors->first('price')}}</label>
                                                @endif
                                                <div class="invalid-feedback">
                                                    Vui lòng chọn mức giá thành hợp lí.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2">Ảnh</label>
                                        <div class="form-group">
                                            <div class="row ml-1 custom-file">
                                                <div class="col-sm-10">
                                                    <input type="file" name="images" class="mr-2" accept="image/*" onchange="readURL(this);">
                                                    <span class="badge badge-info">Chọn ảnh...</span>
                                                    <img id="upload-image" class="broken" src="#" alt="Xem trước" />
                                                </div>
                                                @if($errors->has('images'))
                                                    <label class="text-danger">*{{$errors->first('images')}}</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2">Khuyến mãi</label>
                                        <div class="col-sm-6 form-group mb-3">
                                            <div class="input-group">
                                                <input type="text" name="sale" class="form-control" required>
                                                <div class="form-group input-group-prepend">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                @if($errors->has('sale'))
                                                    <label class="text-danger">*{{$errors->first('sale')}}</label>
                                                @endif
                                                <div class="invalid-feedback">
                                                    Vui lòng chọn mức giảm giá.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2">Mô tả</label>
                                        <div class="col-sm-6 form-group mb-3">
                                            <input name="description" type="text" class="form-control" required>
                                            @if($errors->has('description'))
                                                <label class="text-danger">*{{$errors->first('description')}}</label>
                                            @endif
                                            <div class="invalid-feedback">
                                                Vui lòng thêm mô tả.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2">Chi tiết</label>
                                        <div class="col-sm-6 form-group mb-3">
                                            <textarea name="detail" class="form-control" rows="3" required></textarea>
                                            @if($errors->has('detail'))
                                                <label class="text-danger">*{{$errors->first('detail')}}</label>
                                            @endif
                                            <div class="invalid-feedback">
                                                Vui lòng thêm chi tiết.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Tạo mới</button>
                                            <button type="reset" class="btn btn-reset btn-danger">Đặt lại</button>
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

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

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
    <script type="text/javascript">
        window.onbeforeunload = confirmExit;
        function confirmExit()
        {
            return "Bạn có muốn rời đi dù chưa lưu lại?";
        }
    </script>
@endsection
