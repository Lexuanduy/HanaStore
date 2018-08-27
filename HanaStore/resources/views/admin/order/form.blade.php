@extends('admin.layout.master', [
'currentPage' => 'form',
'current_menu' => 'order_manager',
'current_sub_menu' => 'create_new',
])
@section('page-title', 'Create new order')
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
            <form method="POST" action="/admin/order" class="form-horizontal bg-info"
            enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-header card-header-text text-center" data-background-color="green">
                <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> Create Order</h4>
            </div>

            <!--form edit flowers-->
            <div class="card-content">
                <div class="row">
                    <label class="col-sm-2 label-on-left" for="inputSuccess">Thành tiền</label>
                    <div class="col-sm-8">
                        <div class="form-group label-floating" {{$errors->has('totalPrice')?' has-error':''}}>
                            <input type="text" name="totalPrice" class="form-control" required>
                            <span class="material-input"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 label-on-left" for="inputSuccess">Tên người nhận</label>
                    <div class="col-sm-4">
                        <div class="input-group label-floating">
                            <input type="text" name="shipName" class="form-control" required>
                            @if($errors->has('shipName'))
                            <label class="text-danger">*{{$errors->first('shipName')}}</label>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="row">
                    <label class="col-sm-2 label-on-left" for="inputSuccess">Địa chỉ</label>
                    <div class="col-sm-4">
                        <div class="input-group label-floating">
                            <input type="text" name="shipAddress" class="form-control" required>
                            <span class="input-group-addon">%</span>
                            @if($errors->has('shipAddress'))
                            <label class="text-danger">*{{$errors->first('shipAddress')}}</label>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                   <div class="form-group">
                       <label class="col-sm-2 label-on-left" for="inputSuccess">Ghi chú</label>
                       <div class="col-sm-4">
                          <textarea class="form-control" rows="5" id="comment"></textarea>
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
