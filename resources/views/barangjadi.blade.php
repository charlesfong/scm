@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title">
  List Barang Jadi
</h3>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Id Barang Jadi</th>
            <th>Id SPK</th>
            <th>Nama</th>
          </tr>
        </thead>
        <tbody>
          @foreach($karyawans as $kary)
          <tr>
            <td>{{ $kary->jabatan}}</td>
            <td>{{ $kary->alamat}}</td>
            <td>{{ $kary->telepon}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection