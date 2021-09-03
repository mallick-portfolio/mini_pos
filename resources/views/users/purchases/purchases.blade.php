@extends('users.user_layout')

@section('user-info')
    <h1 class="h3 text-gray-800"><strong>{{ $user->name }}</strong> purchases Info</h1> 
@stop
@section('user-content')
<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Challan No</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Challan No</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($user->purchases as $purchase)
                        <tr>
                            <td>{{ $purchase->challan_no }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $purchase->date }}</td>
                            <td>200</td>
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
@stop