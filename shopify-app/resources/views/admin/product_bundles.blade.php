@extends('layouts.master') 
@section('content')
<link rel="stylesheet" href="{{asset('css/app_react.css')}}">

<section class="content-header">
  <h1>Product Bundle Groups</h1>
  <form action="{{route('bundles.create')}}">
    <input type="submit" value="Create" class="btn btn-info"></input>
  </form>
</section>

<div id="root">
  {{-- <section class="content container-fluid">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">
          Responsive Hover Table
        </h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th>
                <div class="checkbox">
                  <label><input type="checkbox" value="">Name</label>
                </div>
              </th>
              <th></th>
              <th>Stats (30 days)</th>
              <th></th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            <tr>
              <td>183</td>
              <td>John Doe</td>
              <td>11-7-2014</td>
              <td><span class="label label-success">Approved</span></td>
              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


  </section> --}}
  <div class="overlay">
    <i class="fa fa-refresh fa-spin"></i>
  </div>
  <script src={{asset( 'js/app_react.js')}}></script>
</div>
@endsection