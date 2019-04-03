@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title">
  Daftar Pelanggan
</h3>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Id Pelanggan</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Unit</th>
            <th>Telepon</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach($customer as $key=>$customer)
          <tr>
            <td>{{ $customer->id_customer }}</td>
            <td>{{ $customer->nama}}</td>
            <td>{{ $customer->alamat}}</td>
            <td>{{ $customer->unit}}</td>
            <td>{{ $customer->no_telp}}</td>
            <td>{{ $customer->email}}</td>
            <td style="text-align: center;">
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
