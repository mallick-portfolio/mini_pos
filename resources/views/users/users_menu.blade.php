@extends('users.user_layout')
@section('user-info')
<h1 class="h3 text-gray-800"><strong>{{ $user->name }}</strong> information</h1>
@stop



@section('user-content')





<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="paymentModalLabel">New Payment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['route' => ['users.payments.store', $user->id], 'method' => 'post']) !!}
				<div class="mb-3">
					{{ Form::label('amount', NULL) }}
					{{ Form::text('amount', NULL, ['class' => 'form-control']); }}
					@error('amount')
					<div class="alert alert-danger my-2">{{ $message }}</div>
					@enderror
				</div>


				<div class="mb-3">
					{{ Form::label('note', NULL) }}
					{{  Form::textarea('note', null, [
						'class'      	=> 'form-control',
						'rows'       	=> 5,
						'placeholder' 	=> 'Note Here',
						'onkeypress' 	=> "return nameFunction(event);"
						]) }}
					</div>


					<div class="mb-3">
						{{ Form::label('date', NULL) }}
						{{ Form::date('date', NULL, ['class' => 'form-control']); }}
						@error('date')
						<div class="alert alert-danger my-2">{{ $message }}</div>
						@enderror
					</div>


					

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						{{ Form::submit('Submit', ['class' => 'btn btn-primary my-icon']) }}
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>





	@stop