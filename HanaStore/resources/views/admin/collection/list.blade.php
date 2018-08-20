@extends('admin.layout.master', ['currentPage' => 'list'])
@section('page-title', 'List Collection')
@section('content')



<h1>Collections</h1>

<table class="table">
	<thead class="black white-text">
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
    </div>
	@endif



	@endsection



