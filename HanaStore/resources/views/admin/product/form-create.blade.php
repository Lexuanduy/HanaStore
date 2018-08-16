@extends('admin.layout.master', ['currentPage'=>'form-create'])
@section('page-title', 'Create new flower')
@section('content')
    <div class="container">
        <!-- Horizontal Form -->
        <div class="panel panel-default margin-bottom-40">
            <div class="panel-heading">
                <h4 class="panel-title margin-bottom-0"><i class="fab fa-pagelines fa-2x text-danger">New Flowers</i></h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputName" class="col-lg-2 control-label">Name</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="inputName" placeholder="Name" type="text" required>
                        </div>
                    </div>

                    <!-- props name of categories by id-->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Category</label>
                        <div class="col-lg-10">
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
                    <!-- props name of categories by id-->

                    <!-- props name of collections by id-->
                    <div class="form-group mb-3">
                        <label class="col-lg-2 control-label">Collection</label>
                        <div class="col-lg-10">
                            <select class="form-control" required>
                                <option value="">Open this select menu</option>
                                <option value="1">Xuân - Spring</option>
                                <option value="2">Hạ - Summer</option>
                                <option value="3">Thu - Autumn</option>
                                <option value="4">Đông - Winter</option>
                            </select>
                        </div>
                    </div>
                    <!-- props name of collections by id-->

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputPrice">Price</label>
                        <div class="input-group col-md-10">
                            <input type="text" class="form-control" required>
                            <span class="input-group-addon">VND</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputPrice">Images</label>
                        <div class="custom-file mb-3 col-md-10">
                            <input type="file" class="custom-file-input" required>
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">Sale</label>
                        <div class="input-group col-md-10">
                            <input type="text" class="form-control" placeholder="sale" required>
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputDescription" class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="inputDescription" placeholder="Description" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDetail" class="col-lg-2 control-label">Detail</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" id="inputDetail" placeholder="Detail" type="text" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Horizontal Form -->
    </div>
@endsection
