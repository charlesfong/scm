@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title" style="position:fixed;">
  List SPK
</h3>
</div>
<div class="row" style="position:fixed;">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th style="text-align: center;">SPK Id</th>
            <th style="text-align: center;">Order Detail Id</th>
            <th style="text-align: center;">Tanggal Pembuatan SPK</th>
            <th style="text-align: center;">Lama Kerja</th>
            <th style="text-align: center;">Sisa Waktu Kerja</th>
            <th style="text-align: center;">Biaya</th>
            <th style="text-align: center;">Lokasi Tempat Customer</th>
            <th style="text-align: center;">Deskripsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($spks as $spk)
          <tr>
            <td style="text-align: center;">{{ $spk->id_spk}}</td>
            <td style="text-align: center;">{{ $spk->order_detail_id}}</td>
            <td style="text-align: center;">{{date('d F, Y', strtotime($spk->tanggal))}}</td>
            <td style="text-align: center;">{{ $spk->lama_kerja}} Hari</td>
            <td style="text-align: center;">
            @if ((date('d', strtotime($spk->tanggal))+$spk->lama_kerja-date('d'))>=0)
            {{ date('d', strtotime($spk->tanggal))+$spk->lama_kerja-date('d') }} Hari
            @else
            <label class="badge badge-danger">Waktu Habis</label>
            @endif
            </td>
            <td style="text-align: center;">{{ $spk->biaya}}</td>
            <td style="text-align: center;">{{ $spk->lokasi_tempat_customer}}</td>
            <td style="text-align: center;">{{ $spk->deskripsi}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection