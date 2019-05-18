@extends('layout.layout')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">List Barang Jadi</h4>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>
              No
            </th>
            <th>
              Nama Barang
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($barangjadi as $key => $val)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $val->nama }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  </div>
@endsection