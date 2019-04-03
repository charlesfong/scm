@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title">
  Data Karyawan {{ $karyawan->nama}}
</h3>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Id Karyawan</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jabatan</th>
            <th>Telepon</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
         
          <tr>
            <td>{{ $karyawan->id}}</td>
            <td>{{ $karyawan->nama}}</td>
            <td>{{ $karyawan->alamat}}</td>
            <td>{{ $karyawan->jabatan}}</td>
            <td>{{ $karyawan->telepon}}</td>
            <td><a href="	{{url('/karyawan/')}}">[BACK]</a>	</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection