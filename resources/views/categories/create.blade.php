@extends('layout.main')

@section('content')

<!-- Begin Page Content -->

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Add New Category</h1>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<a href="{{ url('/categories') }}" class="btn btn-primary my-icon"><i class="fa fa-arrow-left"></i>Back</a>
		</div>
		<div class="card-body">
			<div class="row justify-content-center">
				<div class="col-md-6">
					{!! Form::open(['route' => 'categories.store', 'method' => 'post']) !!}
					    {{ Form::label('title', NULL) }}
					    {{ Form::text('title', NULL, ['class' => 'form-control']); }}
					    @error('title')
						    <div class="alert alert-danger my-2">{{ $message }}</div>
						@enderror
					    <button type="submit" class="btn btn-primary my-2">Submit</button>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>



	@stop