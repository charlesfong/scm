@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title">
  Data Customer {{ $customer->nama}}
</h3>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Id Customer</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Unit</th>
            <th>Telepon</th>
            <th>Email</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
         
          <tr>
            <td>{{ $customer->id}}</td>
            <td>{{ $customer->nama}}</td>
            <td>{{ $customer->alamat}}</td>
            <td>{{ $customer->unit}}</td>
            <td>{{ $customer->no_telp}}</td>
            <td>{{ $customer->email}}</td>
            <td><a href="	{{url('/customer/')}}">[BACK]</a>	</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection