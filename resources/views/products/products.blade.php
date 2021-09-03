@extends('layout.main')

@section('content')

<!-- Begin Page Content -->

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Product List</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a href="{{ url('/products/create') }}" class="btn btn-primary my-icon"><i class="fa fa-plus"></i>Add New Product</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Product Title</th>
							<th>Category ID</th>
							<th>Cost Price</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Product Title</th>
							<th>Category ID</th>
							<th>Cost Price</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>
						@foreach($products as $product)
						<tr>
							<td>{{ $product->id }}</td>
							<td>{{ $product->title }}</td>
							<td>{{ $product->category->title }}</td>
							<td>{{ $product->cost_price }}</td>
							<td>{{ $product->price }}</td>
							<td class="text-center">
                                <div class="my-btn d-flex">
                                    <div class="left">
                                        <a class="btn btn-success my-icon btn-sm" href="{{ route('products.show', ['product' => $product->id]) }}"><i class="fa fa-eye"></i>Show
                                        </a> 
                                    </div>
                                    <div class="center">
                                        <a class="btn btn-warning my-icon btn-sm" href="{{ route('products.edit', ['product' => $product->id]) }}"><i class="fa fa-edit"></i>Edit
                                        </a> 
                                    </div>
                                    <div class="right">
                                        <form action="{{ url('products/' . $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure')" type="submit" class="btn btn-danger my-icon btn-sm">
                                                <i class="fa fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>



	@stop