@extends('admin.layout.master', ['currentPage' => 'form-create'])
@section('page-title', 'Create new products')
@section('content')
    <style>
        .btn-file {
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        #img-upload{
            width: 100%;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
                <!--main form -->
            <div class="card">
                <form method="post" action="/admin/product" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="card-header card-header text-center" data-background-color="green">
                        <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> New Flowers</h4>
                    </div>

                    <!--form new flowers-->
                    <div class="card-content">
                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Name</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <input type="text" class="form-control" required>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>

                        <!-- props name of categories by id-->
                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Category</label>
                            <div class="col-sm-4">
                                <div class="form-group label-floating">
                                    <select class="form-control" required>
                                        <option value="">Open this select menu</option>
                                        <option value="1">Hoa sinh nhật</option>
                                        <option value="2">Hoa khai trương</option>
                                        <option value="3">Hoa giỏ</option>
                                        <option value="4">Hoa nhập khẩu</option>
                                        <option value="5">Hoa bó</option>
                                        <option value="6">Hoa cưới</option>
                                        <option value="7">Hoa chúc mừng</option>
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
                                    <select class="form-control" required>
                                        <option value="">Open this select menu</option>
                                        <option value="1">Xuân - Spring</option>
                                        <option value="2">Hạ - Summer</option>
                                        <option value="3">Thu - Autumn</option>
                                        <option value="4">Đông - Winter</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- props name of collections by id-->

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Price</label>
                            <div class="col-sm-4">
                                <div class="input-group label-floating">
                                    <input type="text" class="form-control" required>
                                    <span class="input-group-addon">VND</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Image</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <!-- feature is developing, optional-->
                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Upload image</label>
                            <div class="col-sm-8">
                                <div class=" col-sm-12 custom-file" style="margin-bottom:20px;">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                Browse… <input type="file" id="imgInp">
                                            </span>
                                        </span>
                                        <input type="text" class="form-control" readonly required>
                                    </div>
                                    <img class="img-rounded" id='img-upload'/>
                                </div>
                            </div>
                        </div>
                        <!-- feature is developing, optional-->

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Sale</label>
                            <div class="col-sm-4">
                                <div class="input-group label-floating">
                                    <input type="text" class="form-control" required>
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Description</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Detail</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <textarea class="form-control" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Checkboxes</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <div class="form-check">
                                        <label>
                                            <input type="checkbox" name="check" checked required> <span class="label-text">Option 01</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label>
                                            <input type="checkbox" name="check" required> <span class="label-text">Option 02</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label>
                                            <input type="checkbox" name="check" required> <span class="label-text">Option 03</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left" for="inputSuccess">Radio Buttons</label>
                            <div class="col-sm-8">
                                <div class="form-group label-floating">
                                    <div class="form-check">
                                        <label class="toggle">
                                            <input type="radio" name="toggle" checked required> <span class="label-text">Option 01</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="toggle">
                                            <input type="radio" name="toggle" required> <span class="label-text">Option 02</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="toggle">
                                            <input type="radio" name="toggle" required> <span class="label-text">Option 03</span>
                                        </label>
                                    </div>
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

    <!-- preview image upload, developing feature -->
    <script>
        $(document).ready( function() {
            $(document).on('change', '.btn-file :file', function() {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function(){
                readURL(this);
            });
        });
    </script>
@endsection
