
@extends('layout.main')

@section('content')

<!-- Begin Page Content -->

<!-- Page Heading -->
<div class="page-header-tab d-flex justify-content-between">
	<div class="page-heading">
		@yield('user-info')
	</div>
	<div class="card-header  d-flex justify-content-end">
		<a href="{{ url('/users') }}" class="btn btn-primary my-icon ml-2 mr-2"><i class="fa fa-plus"></i>New Sale</a>
		<!-- Button trigger modal -->		<a href="{{ url('/users') }}" class="btn btn-primary my-icon ml-2 mr-2"><i class="fa fa-plus"></i>New Purchase</a>
		<button type="button" class="btn btn-primary my-icon ml-2 mr-2" data-toggle="modal" data-target="#paymentModal">
		  <i class="fa fa-plus"></i>New Payment 
		</button>
		<button type="button" class="btn btn-primary my-icon ml-2 mr-2" data-toggle="modal" data-target="#receiptsModal">
		  <i class="fa fa-plus"></i>New Receipt
		</button>
	</div>
</div>
<!-- DataTales Example -->
<div class="row">
	<div class="col-md-3">
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<a class="nav-link @if($menu_active == 'users') active  @endif" href="{{ route('users.show', $user->id)}}">User Info</a>
			<a class="nav-link @if($menu_active == 'sales') active  @endif" href="{{ route('users.sales', $user->id)}}">Sales</a>
			<a class="nav-link @if($menu_active == 'purchases') active  @endif" href="{{ route('users.purchases', $user->id)}}">Purchases</a>
			<a class="nav-link @if($menu_active == 'payments') active  @endif" href="{{ route('users.payments', $user->id)}}">Payments</a>
			<a class="nav-link @if($menu_active == 'receipts') active  @endif" href="{{ route('users.receipts', $user->id)}}">Receipts</a>
		</div>
	</div>
	<div class="col-md-9">
		<div class="card shadow mb-4">
			<div class="card-body">

				@yield('user-content')


			</div>
		</div>
	</div>
</div>





@stop