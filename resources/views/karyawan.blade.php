@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title">
  List Karyawan
</h3>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Alamat</th>
            <th>No Telp</th>
          </tr>
        </thead>
        <tbody>
          @foreach($karyawans as $kary)
          <tr>
            <td>{{ $kary->nama}}</td>
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