@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title" style="position:fixed;">
  List Supplier
</h3>
</div>
<div class="row" style="position:fixed;">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Unit</th>
            <th>No Telp</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach($customers as $cust)
          <tr>
            <td>{{ $cust->nama}}</td>
            <td>{{ $cust->alamat}}</td>
            <td>{{ $cust->unit}}</td>
            <td>{{ $cust->no_telp}}</td>
            <td>{{ $cust->email}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection