@extends('layout.main')

@section('content')
    <!-- Page Heading -->
    <h2 class="h3 mb-2 text-gray-800">Table</h2>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ url('/users/create') }}" class="btn btn-primary my-icon"><i class="fa fa-plus"></i>Add User</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Group</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Group</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->group->title }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td class="text-center">
                                <div class="my-btn d-flex">
                                    <div class="center">
                                        <a class="btn btn-success my-icon btn-sm" href="{{ route('users.show', ['user' => $user->id]) }}"><i class="fa fa-eye"></i>Show
                                        </a> 
                                    </div>
                                    <div class="left">
                                        <a class="btn btn-warning my-icon btn-sm" href="{{ route('users.edit', ['user' => $user->id]) }}"><i class="fa fa-edit"></i>Edit
                                        </a> 
                                    </div>
                                    <div class="right">
                                        <form action="{{ url('users/' . $user->id) }}" method="post">
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