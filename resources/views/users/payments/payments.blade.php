@extends('users.user_layout')

@section('user-info')
<h1 class="h3 text-gray-800"><strong>{{ $user->name }}</strong> payments Info</h1> 
@stop
@section('user-content')
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>User</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Note</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>User</th>
                <th>Total = {{$user->payments->sum('amount')}}</th>
                <th>Date</th>
                <th>Note</th>
                <th class="text-center">Action</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($user->payments as $payment)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->date }}</td>
                <td>{{ $payment->note }}</td>
                <td class="text-center">
                    <div class="my-btn d-flex">
                        <div class="right">
                            <form action="{{ route('users.payments.destroy', ['id' => $user->id, 'payment_id' => $payment->id]) }}" method="post">
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