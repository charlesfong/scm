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
            <th>Jenis</th>
            <th>No Telp</th>
          </tr>
        </thead>
        <tbody>
          @foreach($supplierz as $supp)
          <tr>
            <td>{{ $supp->nama}}</td>
            <td>{{ $supp->alamat}}</td>
            <td>{{ $supp->jenis}}</td>
            <td>{{ $supp->no_telp}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection