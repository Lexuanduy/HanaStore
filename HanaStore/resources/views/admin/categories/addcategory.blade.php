@extends('adminlayouts/master')
@section('content')
 
<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Product
<small>Add</small>
</h1>
</div>
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
<form action="admin/danhmuc/them" method="POST">
{{ csrf_field() }}
<div class="form-group">
<label>Tên Danh Mục</label>
<input class="form-control" name="CategoryName" placeholder="Tên Sản Phẩm" />
</div>
<button type="submit" class="btn btn-default">Thêm</button>
<button type="reset" class="btn btn-default">Làm Mới</button>
<form>
</div>
<!-- /.container-fluid -->
</div>
 
@endsection