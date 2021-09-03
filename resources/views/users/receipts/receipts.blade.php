@extends('users.user_layout')

@section('user-info')
<h1 class="h3 text-gray-800"><strong>{{ $user->name }}</strong> receipts Info</h1> 
@stop
@section('user-content')
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Note</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Customer</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Note</th>
                <th class="text-center">Action</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($user->receipts as $receipt)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $receipt->amount }}</td>
                <td>{{ $receipt->date }}</td>
                <td>{{ $receipt->note }}</td>
                <td class="text-center">
                    <div class="my-btn d-flex">
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
<!-- Modal -->

<div class="modal fade" id="receiptsModal" tabindex="-1" role="dialog" aria-labelledby="receiptsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="receiptsModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


@stop