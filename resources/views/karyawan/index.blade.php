@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title">
  Daftar Karyawan
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
            <th>Detail Karyawan</th>
			<th>Edit Data</th>
          </tr>
        </thead>
        <tbody>
          @foreach($karyawan as $key=>$karyawan)
          <tr>
            <td>{{ $karyawan->id}}</td>
            <td>{{ $karyawan->nama}}</td>
            <td>{{ $karyawan->alamat}}</td>
            <td>{{ $karyawan->jabatan}}</td>
            <td>{{ $karyawan->telepon}}</td>
            <td>	<a href="	{{url('/karyawan/'.$karyawan->id)}}">[SHOW]</a></td>
			<td>	<a href="	{{url('/karyawan/'.$karyawan->id.'/edit')}}">[EDIT]</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
