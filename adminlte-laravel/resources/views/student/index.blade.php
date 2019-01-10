@extends('layouts.master') 
@section('content')
<style>
  .table.table-bordered {
    background-color: white!important;
  }
</style>

@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
</div><br /> @endif

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Students table</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-bordered">
      <tbody>
        <tr>
          <tr>
            <th>Id</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Email</th>
            <th colspan="2">Action</td>
          </tr>
          @foreach($students as $st)
          <tr>
            <td>{{$st->id}}</td>
            <td>{{$st->first_name}}</td>
            <td>{{$st->last_name}}</td>
            <td>{{$st->email}}</td>
            <td><a href="{{ route('student.edit',$st->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
              <form action="{{ route('student.destroy', $st->id)}}" method="post">
                @csrf @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
 
@endsection