@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title">
  List SPK
</h3>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>SPK Id</th>
            <th>Order Id</th>
            <th>Lama Kerja</th>
            <th>Biaya</th>
            <th>Lokasi Tempat Customer</th>
            <th>Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($spks as $spk)
          <tr>
            <td>{{ $spk->id_spk}}</td>
            <td>{{ $spk->order_id_order}}</td>
            <td>{{ $spk->lama_kerja}}</td>
            <td>{{ $spk->biaya}}</td>
            <td>{{ $spk->lokasi_tempat_customer}}</td>
            <td>{{ $spk->deskripsi}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection