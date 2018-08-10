@extends('adminlayouts/master')
@section('content')
<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">Product
<small>List</small>
</h1>
</div>
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr align="center">
<th>ID</th>
<th>Mã Sản Phẩm</th>
<th>Tên Sản Phẩm</th>
<th>Giá</th>
<th>Mô Tả</th>
<th>Hình Ảnh</th>
<th>Danh Mục</th>
<th>Nhập Về</th>
<th>Còn Tồn</th>
<th>Ngày Tạo</th>
<th>Delete</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
//Mình sẽ lặp ở đây
<tr class="odd gradeX" align="center">
<td>Đây là ID</td>
<td>Mã sản phẩm</td>
<td>Tên SP</td>
<td>Giá</td>
<td>Mô Tả</td>
<td>Hình Ảnh</td>
<td>Category Name</td>
<td>Tồn</td>
<td>Còn</td>
<td>Ngày update</td>
<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/sanpham/xoa/#"> Delete</a></td>
<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/#">Edit</a></td>
</tr>
 
 
</tbody>
</table>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection