@extends('layouts.master') 
@section('content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-student">
  Add more student
</button> @if (session()->get('sucess'))
<div class="alert alert-success">
  {{session()->get('sucess')}}
</div>
@endif @if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<students></students>

<div id="modal-add-student" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add student</h4>
      </div>
      <form method="post" action="{{ route('student.store') }}">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="first_name">First name :</label>
            <input type="text" class="form-control" name="first_name" />
          </div>
          <div class="form-group">
            <label for="last_name">Last name:</label>
            <input type="text" class="form-control" name="last_name" />
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="modal-edit-student" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit student</h4>
      </div>
      <form method="post" action="">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="first_name">First name :</label>
            <input type="text" class="form-control" name="first_name" />
          </div>
          <div class="form-group">
            <label for="last_name">Last name:</label>
            <input type="text" class="form-control" name="last_name" />
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection