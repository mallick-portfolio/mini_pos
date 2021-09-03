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
                <th>Total = {{ $user->receipts->sum('amount') }}</th>
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
                            <form action="{{ route('users.receipts.destroy', ['id' => $user->id, 'receipt_id' => $receipt->id]) }}" method="post">
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
    {!! Form::open(['route' => ['users.receipts.store', $user->id], 'method' => 'post']) !!}
    <div class="mb-3">
        {{ Form::label('amount', NULL) }}
        {{ Form::text('amount', NULL, ['class' => 'form-control']); }}
        @error('amount')
        <div class="alert alert-danger my-2">{{ $message }}
        </div>
        @enderror
    </div>


    <div class="mb-3">
        {{ Form::label('note', NULL) }}
        {{  Form::textarea('note', null, [
            'class'         => 'form-control',
            'rows'          => 5,
            'placeholder'   => 'Note Here',
            'onkeypress'    => "return nameFunction(event);"
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