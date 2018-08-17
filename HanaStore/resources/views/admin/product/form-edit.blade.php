@extends('admin.layout.master', ['currentPage' => 'form-edit'])
@section('page-title', 'Edit products')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!--main form -->
            <div class="card">
                <form method="post" action="/admin/product" class="form-horizontal bg-info">
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
@endsection
