@extends('layouts.master') 
@section('content') @if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div><br /> @endif
<form method="post" action="{{ route('student.update', $student->id) }}">
  <div class="form-group">
    @method('PATCH') @csrf
    <label for="first_name">First name:</label>
    <input type="text" class="form-control" name="first_name" value="{{$student->first_name}}" />
  </div>
  <div class="form-group">
    <label for="last_name">Last Name :</label>
    <input type="text" class="form-control" name="last_name" value="{{$student->last_name}}" />
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="text" class="form-control" name="email" value="{{$student->email}}" />
  </div>
  <button type="submit" class="btn btn-warning">Update</button>
</form>
@endsection