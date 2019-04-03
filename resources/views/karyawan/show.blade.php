@extends('layout.layout')
@section('content')
<h1>	Detail Supplier</h1>
<table>	
		<tr>	
				<td>	Nama</td>
				<td>	{{$karyawan->nama}}</td>
		</tr>
		<tr>	
				<td>	Alamat</td>
				<td>	{{$karyawan->alamat}}</td>
		</tr>
		<tr>	
				<td colspan="2"><a href="	{{url('/karyawan/')}}">[BACK]</a>	</td>
		</tr>
</table>
<form method="post" action="{!! action('KaryawanController@destroy', $karyawan->id) !!}" class="pull-left">
	<input type="hidden" name="_method" value="DELETE">
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<div class="form-group">
  <div>
    <button type="submit" class="btn btn-warning">Delete</button>
  </div>
</div>
</form>
<div class="clearfix"></div>
@endsection