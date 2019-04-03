@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title">
  List Data Mesin
</h3>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <td></td>
          </tr>
        </thead>
        <tbody>
          @foreach($mesin as $msn)
          <tr>
            <td>{{ $msn->id_mesin }}</td>
            <td>{{ $msn->nama }}</td>
            <td><a href="{{url('/hapusmesin/'.$msn->id_mesin.'')}}">hapus</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection