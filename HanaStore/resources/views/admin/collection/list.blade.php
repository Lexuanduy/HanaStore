@extends('admin.layout.master', [
    'currentPage' => 'list',
    'current_menu' => 'collection_manager',
    'current_sub_menu' => 'list_item',
])
@section('page-title','List Collection')
@section('content')
    <style type="text/css">
        .none a{
            text-decoration: none;
        }
        thead tr th{
            background-color: #117a8b;
            color: #fff;
        }
        .id-flower{
            background-color: #ffff00;
        }
    </style>
    <div class="card">
        <div class="card-content">
            <div class="row">
                <div class="card-header card-header-text text-center col-sm-3" data-background-color="green">
                    <h4 class="mb-0"><i class="fab fa-pagelines fa-2x text-danger"></i> COLLECTION CATALOGUE</h4>
                </div>
                <div class="ml-2">
                    <a href="/admin/collection/create" class="btn btn-twitter"><i class="far fa-plus-square"></i> Create New</a>
                </div>
            </div>
<<<<<<< HEAD
            @if($collection->count()>0)
                <table class="table  ">
                    <thead class="black white-text" >
                        <tr class="row">
                            <th class="col">{{__('Id')}}</th>
                            <th class="col">{{__('Image')}}</th>
                            <th class="col">{{__('Collection')}}</th>
                            <th class="col">{{__('Description')}}</th>
                            <th class="col">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collection as $item)
                            <tr class="row" id="row-item-{{$item->id}}">

<<<<<<< HEAD
=======
>>>>>>> 6b2ce2a5b7293851d7c19c62803732c26e223701

            <div class="row">
                <div class="form-group col-sm-4">
                    <label class="mr-3 badge">Search by name or id,...</label>
                    <form action="/admin/collection/search">
                        <div class="form-group">
                            <input type="text" name="records" id="search" class="form-control" placeholder="Search Collection Data" />
                        </div>
                    </form>
                </div>
            </div>

            <!--List Flower Table-->
            <div class="row">
                <div class="panel panel-default">
                    <div class="table-responsive">
                        @if($collection->count()>0)
                            <table class="table table-hover table-striped table-condensed table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" style="width: 1em">{{__('ID')}}</th>
                                    <th scope="col" style="width: 10em">{{__('Image')}}</th>
                                    <th class="col">{{__('Collection')}}</th>
                                    <th class="col">{{__('Description')}}</th>
                                    <th scope="col" style="width: 45px">{{__('Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($collection as $item)
                                    <tr>
                                        <th class="id-flower" scope="row">{{$item->id}}</th>
                                        <td>
                                            <div class="card" style="background-size: cover; height: 120px; width: 120px">
                                                <a href="/admin/collection/{{ $item->id }}">
                                                    <img src="{{$item->images}}" class="img-thumbnail" style="background-size: cover; height: 120px; width: 120px" alt="images"/></a>
                                            </div>
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->description}}</td>
                                        <td class="none">
                                            <a class="btn btn-info btn-sm" href="/admin/collection/{{$item -> id}}/edit" style="width: 96.06px"><i class="fas fa-edit"></i> <b>Edit</b></a>

<<<<<<< HEAD
<table class="table">
	<thead class="thead-dark">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Name</th>
			<th scope="col">Description</th>
			<th scope="col">Images</th>
		</tr>
	</thead>
	@foreach ($collections as $collection)
	<tbody>
		<tr>
			<th scope="row"> {{ $collection -> id }}</th>
			<td>{{ $collection -> name }}</td>
			<td>{{ $collection -> description }}</td>
			<td>{{ $collection -> images }}</td>
			<td><a href="{{ route('collections.edit', $collection->id) }}" class="btn btn-primary">Edit Collection</a></td>	
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<td>
				{!! Form::open([
					'method' => 'DELETE',
					'route' => ['collections.destroy', $collection->id],
					'onsubmit' => 'return confirm("Are you sure to delete this collection?")']) !!}
					{!! Form::submit('Delete Collection', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}
			</td>
			</tr>
		</tbody>
			@endforeach
	</table>
	@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
=======
                                <td class="col">{{$item->id}}</td>
                                <td class="col">
                                    <div class="card"
                                         style="background-image: url('{{$item->images}}'); background-size: cover; width: 60px; height: 60px;">
=======
                                            <a class="btn btn-delete btn-danger btn-sm" href="{{$item-> id}}"><i class="fas fa-trash-alt "></i> <b>Remove</b></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                @else
                                    <div class="alert alert-danger">Hiện tại không có bộ sưu tập nào. Vui lòng click <a
                                            href="/admin/collection/create" title="Thêm mới bộ sưu tập" class="btn-link">vào đây</a> để tạo mới.
>>>>>>> 6b2ce2a5b7293851d7c19c62803732c26e223701
                                    </div>
                                @endif
                            </table>
                    </div>
                </div>
            </div>
            <!--List Flower Table-->
            <div class="row float-right mr-2">
                {{$collection->links()}}
            </div>
        </div>
<<<<<<< HEAD
>>>>>>> 5f491f03c3925b082e0740a49a507f5ce7f04838
=======
>>>>>>> 6b2ce2a5b7293851d7c19c62803732c26e223701
    </div>

    <!--remove collection in view-->
    <script>
        $('.btn-delete').click(function () {
            var thisButton = $(this);
            swal({
                text: "Are you sure about this action?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Agree',
                cancelButtonText: 'Cancel',
                buttonsStyling: false
            }).then(function() {
                var id = thisButton.attr('href');
                $.ajax({
                    'url': '/admin/collection/' + id,
                    'method': 'DELETE',
                    'data':{
                        '_token':$('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        swal({
                            text: 'Collection has deleted.',
                            type: 'success',
                            confirmButtonClass: "btn btn-success",
                            buttonsStyling: false
                        })
                        setTimeout(function () {
                            window.location.reload();
                        }, 2*1000);
                    },
                    error: function () {
                        swal({
                            text: 'Error happened, try again please!',
                            type: 'warning',
                            confirmButtonClass: "btn btn-danger",
                            buttonsStyling: false
                        })
                    }
                });

            });
            return false;
        })
    </script>
    <!--remove collection in view-->
@endsection

