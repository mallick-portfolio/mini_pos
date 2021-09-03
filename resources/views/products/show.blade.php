@extends('layout.main')

@section('content')

<!-- Begin Page Content -->

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Category List</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a href="{{ url('/products') }}" class="btn btn-primary my-icon"><i class="fa fa-plus"></i>Back</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<tbody>
						<tr>
							<th>ID</th>
							<td>{{ $product->id }}</td>
						</tr>
						<tr>
							<th>Title</th>
							<td>{{ $product->title }}</td>
						</tr>
						<tr>
							<th>Category</th>
							<td>{{ $product->category->title }}</td>
						</tr>
						<tr>
							<th>Description</th>
							<td>{{ $product->description }}</td>
						</tr>
						<tr>
							<th>Cost Price</th>
							<td>{{ $product->cost_price }}</td>
						</tr>
						<tr>
							<th> Price</th>
							<td>{{ $product->price }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>



	@stop