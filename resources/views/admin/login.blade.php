@extends('layout.primary')

@section('main-body')

<div class="container mt-5">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-10 col-lg-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
								</div>

								{!! Form::open(['route' => 'confirmLogin', 'method' => 'post', 'class' => 'user']) !!}

								<div class="form-group">
			                        {{ Form::email('email', NULL, ['class' => 'form-control form-control-user', 'placeholder' => 'Enter Email Address...']) }}
			                        @error('email')
									    <div class="alert alert-danger my-2">{{ $message }}</div>
									@enderror
								</div>

								<div class="form-group">
			                        {{	Form::password('password', ['class' => 'form-control form-control-user', 'placeholder' => 'Password']) }}
			                        @error('password')
									    <div class="alert alert-danger my-2">{{ $message }}</div>
									@enderror
								</div>
								{{ Form::submit('Login', ['class' => 'btn btn-primary btn-user btn-block']) }}
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

@stop