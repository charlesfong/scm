@extends('layout.layout')
@section('content')
TAMBAH SUPPLIER
@foreach ($errors->all() as $error)
<div style="background-color: red; color:white; margin-bottom: 5px">{{ $error }}</div>
@endforeach

@if(session('status'))
<div style="background-color: green; color:white">	
	{{ session('status')}}
</div>
@endif
<form method="post" action="{{url('/karyawan')}}">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<table>
		<tr>
			<td>Nama Supplier</td>
			<td>
				<input type="text" name="nama">
			</td>
		</tr>
		
		<tr>
			<td>Alamat</td>
			<td>
				<textarea name="alamat"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan=2>
				<input type="submit" name="Submit">
			</td>
		</tr>
	</table>
		
</form>

@endsection