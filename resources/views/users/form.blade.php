@extends('layout.main')

@section('content')
	<!-- Page Heading -->
    
    @if($mode == 'edit')
        <h2 class="h3 mb-2 text-gray-800">Update <strong>{{ $user->name }}</strong> Information</h2>
    @else
        <h2 class="h3 mb-2 text-gray-800">Create New User</h2>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ url('/users') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    @if($mode == 'edit')
                        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put'] ) !!}
                    @else
                        {!! Form::open(['route' => 'users.store', 'method' => 'post']) !!}
                    @endif

                      <div class="mb-3">
                        {{ Form::label('group', NULL, ['class' => 'form-label', 'for' => 'group']) }}
                        {{ Form::select('group_id', $groups, NULL, ['class' => 'form-control', 'placeholder' => 'Select Group']) }}
                        @error('group_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        {{ Form::label('name', NULL, ['class' => 'form-label', 'for' => 'name']) }}
                        {{ Form::text('name', NULL, ['class' => 'form-control', 'id' => 'name']) }}
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        {{ Form::label('email', NULL, ['class' => 'form-label', 'for' => 'email']) }}
                        {{ Form::email('email', NULL, ['class' => 'form-control', 'id' => 'email']) }}
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        {{ Form::label('phone', NULL, ['class' => 'form-label', 'for' => 'phone']) }}
                        {{ Form::text('phone', NULL, ['class' => 'form-control', 'id' => 'phone']) }}
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        {{ Form::label('address', NULL, ['class' => 'form-label', 'for' => 'address']) }}
                        {{ Form::text('address', NULL, ['class' => 'form-control', 'id' => 'address']) }}
                      </div>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop