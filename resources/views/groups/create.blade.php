@extends('layout.main')

@section('content')
	<!-- Page Heading -->
    <h2 class="h3 mb-2 text-gray-800">Create New Group</h2>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ url('/groups') }}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form method="POST" action="{{ url('/groups') }}">
                        @csrf
                      <div class="mb-3">
                        <label for="user-group" class="form-label">User Group Title</label>
                        <input type="text" class="form-control" id="user-group" name="title">
                        <div class="form-text">Title of User Group</div>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop