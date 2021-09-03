@extends('layout.main')

@section('content')

<!-- Begin Page Content -->

<!-- Page Heading -->
	@if($mode == 'edit')
		<h1 class="h3 mb-2 text-gray-800">Update Product</h1>
	@else
		<h1 class="h3 mb-2 text-gray-800">Add New Product</h1>
	@endif

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">

			<a href="{{ url('/products') }}" class="btn btn-primary my-icon"><i class="fa fa-arrow-left"></i>Back</a>
		</div>
		<div class="card-body">
			<div class="row justify-content-center">
				<div class="col-md-6">
					@if($mode == 'edit')
						{{ Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put']) }}
					@else
						{!! Form::open(['route' => 'products.store', 'method' => 'post']) !!}
					@endif
						<div class="mb-3">
						    {{ Form::label('title', NULL) }}
						    {{ Form::text('title', NULL, ['class' => 'form-control']); }}
						    @error('title')
							    <div class="alert alert-danger my-2">{{ $message }}</div>
							@enderror
						</div>

						<div class="mb-3">
						    {{ Form::label('Select Category', NULL) }}
						    {{ Form::select('category_id', $category, null, ['placeholder' => 'Select category...', 'class' => 'form-control']) }}
						    @error('category_id')
							    <div class="alert alert-danger my-2">{{ $message }}</div>
							@enderror
						</div>


						<div class="mb-3">
						    {{ Form::label('Description', NULL) }}
						    {{  Form::textarea('description', null, [
				                    'class'      	=> 'form-control',
				                    'rows'       	=> 8,
				                    'placeholder' 	=> 'Description Here',
				                    'onkeypress' 	=> "return nameFunction(event);"
				                ]) }}
						</div>

						<div class="mb-3">
						    {{ Form::label('Cost Price', NULL) }}
						    {{ Form::text('cost_price', NULL, ['class' => 'form-control']); }}
						</div>


						<div class="mb-3">
						    {{ Form::label('Price', NULL) }}
						    {{ Form::text('price', NULL, ['class' => 'form-control']); }}
						    @error('price')
							    <div class="alert alert-danger my-2">{{ $message }}</div>
							@enderror
						</div>


					    {{ Form::submit('Submit', ['class' => 'btn btn-primary my-icon']) }}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>



	@stop