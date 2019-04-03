@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title" style="position:fixed;">
  List Order
</h3>
</div>
<div class="row" style="position:fixed;">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Order Id</th>
            <th>Customer Id</th>
            <th>Karyawan Id</th>
            <th>Unit Pemesanan</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Harga Satuan</th>
            <th>Keterangan</th>
            <th>tanggal</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
          <tr>
            <td>{{ $order->id_order}}</td>
            <td>{{ $order->customer_id_customer}}</td>
            <td>{{ $order->karyawan_id_karyawan}}</td>
            <td>{{ $order->unit_pemesanan}}</td>
            <td>{{ $order->kode_barang}}</td>
            <td>{{ $order-> nama_barang}}</td>
            <td>{{ $order-> jumlah}}</td>
            <td>{{ $order->satuan}}</td>
            <td>{{ $order->harga_satuan}}</td>
            <td>{{ $order->keterangan}}</td>
            <td>{{ $order-> tanggal}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection