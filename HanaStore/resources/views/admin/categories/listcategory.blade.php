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
<th>Tên Danh Mục</th>
<th>Delete</th>
<th>Edit</th>
</tr>
</thead>
<tbody>
<?php foreach ($danhmuc as $dm): ?>
<tr class="odd gradeX" align="center">
<td>{{$dm->CategoryID}}</td>
<td>{{$dm->CategoryName}}</td>
<td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/danhmuc/xoa/{{$dm->CategoryID}}"> Delete</a></td>
<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/danhmuc/sua/{{$dm->CategoryID}}">Edit</a></td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection