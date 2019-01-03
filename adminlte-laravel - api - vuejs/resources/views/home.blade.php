@extends('layouts.master') 
@section('content')

@if (session()->get('sucess'))
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


@endsection