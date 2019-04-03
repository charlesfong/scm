@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title" style="position:fixed;">
  List Barang Jadi
</h3>
</div>
<div class="row" style="position:fixed;">
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
          @foreach($bjadi as $val)
          <tr>
            <td>{{ $val->id_barang_jadi}}</td>
            <td>{{ $val->spk_id_spk}}</td>
            <td>{{ $val->nama}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection