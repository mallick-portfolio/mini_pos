@extends('layout.main')

@section('content')

<!-- Begin Page Content -->

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Category List</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a href="{{ url('/categories/create') }}" class="btn btn-primary my-icon"><i class="fa fa-plus"></i>Add Category</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Category Title</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Category Title</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td>{{ $category->title }}</td>
							<td class="text-center">
								{!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
									{{ Form::submit('Delete', ['class' => 'btn btn-danger my-icon', 'onclick' => 'return confirm("Are you sure")']) }}
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>



	@stop