@extends('users.user_layout')
@section('user-info')
<h1 class="h3 text-gray-800"><strong>{{ $user->name }}</strong> information</h1>
@stop



@section('user-content')
<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
	<tbody>
		<tr>
			<th>ID</th>
			<td>{{ $user->id }}</td>
		</tr>
		<tr>
			<th>Name</th>
			<td>{{ $user->name }}</td>
		</tr>
		<tr>
			<th>Group</th>
			<td>{{ $user->group->title }}</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{ $user->email }}</td>
		</tr>
		<tr>
			<th>Phone</th>
			<td>{{ $user->phone }}</td>
		</tr>
		<tr>
			<th> Address</th>
			<td>{{ $user->address }}</td>
		</tr>
	</tbody>
</table>




	@stop