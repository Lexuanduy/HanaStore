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
<form action="#" method="POST">
{{ csrf_field() }}
<div class="form-group">
<label>Mã Sản Phẩm</label>
<input class="form-control" name="ProductSKU" placeholder="Mã Sản Phẩm" value="" />
</div>
<div class="form-group">
<label>Tên Sản Phẩm</label>
<input class="form-control" name="ProductName" placeholder="Tên Sản Phẩm" value=""/>
</div>
<div class="form-group">
<label>Giá</label>
<input class="form-control" name="ProductPrice" placeholder="Giá" value=""/>
</div>
<div class="form-group">
<label>Mô Tả</label>
<textarea class="form-control" rows="3" name="ProductLongDesc" placeholder="Mô Tả"></textarea>
</div>
<div class="form-group">
<label>Mô Tả Ngắn Gọn</label>
<textarea class="form-control" rows="3" name="ProductShortDesc" placeholder="Mô Tả Ngắn Gọn""></textarea>
</div>
<div class="form-group">
<label>Hình Ảnh</label>
<input type="file" name="ProductImage" value="">
</div>
<div class="form-group">
<label>Danh Mục</label>
<input class="form-control" name="ProductCategoryID" placeholder="Danh Mục" value="" />
</div>
<div class="form-group">
<label>Nhập Về</label>
<input class="form-control" name="ProductStock" placeholder="Nhập Về" value=""/>
</div>
<div class="form-group">
<label>Còn Tồn</label>
<input class="form-control" name="ProductLive" placeholder="Còn Tồn" value=""/>
</div>
 
<button type="submit" class="btn btn-default">Sửa</button>
<button type="reset" class="btn btn-default">Làm Mới</button>
<form>
</div>
<!-- /.container-fluid -->
</div>
 
@endsection