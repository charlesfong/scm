@extends('layout.layout')
@section('content')
<h1>	Daftar Supplier</h1>

<table border="1">
		<tr>	
				<th>	ID Supplier</th>
				<th>	Nama Supplier</th>
				<th>	</th>
				<th>	</th>
		</tr>
		@foreach($karyawan as $key=>$karyawan)
		<tr>	
				<td>	{{ ($key+1)}}</td>
				<td>	{{ $karyawan->nama}}</td>
				<td>	<a href="	{{url('/karyawan/'.$karyawan->id)}}">[SHOW]</a></td>
				<td>	<a href="	{{url('/karyawan/'.$karyawan->id.'/edit')}}">[EDIT]</a></td>
		</tr>
		@endforeach
</table>

@endsection