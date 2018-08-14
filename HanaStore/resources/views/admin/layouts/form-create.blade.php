@extends('admin.layouts.master', ['currentPage'=>'form-create'])
@section('page-title', 'Create new product')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Forms</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!--form layout-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fas fa-smile fa-2x text-danger"></i> New Flowers <i class="fas fa-smile fa-2x text-danger"></i>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form role="form">
                            <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">Name</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control">
                                    <option>Hoa sinh nhật</option>
                                    <option>Hoa khai trương</option>
                                    <option>Hoa giỏ</option>
                                    <option>Hoa nhập khẩu</option>
                                    <option>Hoa bó</option>
                                    <option>Hoa cưới</option>
                                    <option>Hoa chúc mừng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Collection</label>
                                <select class="form-control">
                                    <option>Xuân - Spring</option>
                                    <option>Hạ - Summer</option>
                                    <option>Thu - Autumn</option>
                                    <option>Đông - Winter</option>
                                </select>
                            </div>
                            <div class="form-group has-error">
                                <label class="control-label" for="inputError">Price</label>
                                <div class="form-group input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon">VND</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <div class="row">
                                    <input type="file" class="col-md-4">
                                    <label class="col-md-2">Or link address</label>
                                    <input type="text" placeholder="url">
                                </div>
                            </div>
                            <div class="form-group has-warning">
                                <label class="control-label" for="inputWarning">Sale</label>
                                <div class="form-group input-group">
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon">%</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Detail</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Checkboxes</label>
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="check" checked> <span class="label-text">Option 01</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="check"> <span class="label-text">Option 02</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="check"> <span class="label-text">Option 03</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Radio Buttons</label>
                                <div class="form-check">
                                    <label class="toggle">
                                        <input type="radio" name="toggle" checked> <span class="label-text">Option 01</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="toggle">
                                        <input type="radio" name="toggle"> <span class="label-text">Option 02</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="toggle">
                                        <input type="radio" name="toggle"> <span class="label-text">Option 03</span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>
                        </form>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection
