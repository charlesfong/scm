@extends('layout.layout')
@section('content')
Tambah Customer
@foreach ($errors->all() as $error)
<div style="background-color: red; color:white; margin-bottom: 5px">{{ $error }}</div>
@endforeach

@if(session('status'))
<div style="background-color: green; color:white">	
	{{ session('status')}}
</div>
@endif
<form method="post" action="{{url('/customer')}}">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<table>
		<tr>
			<td>Nama</td>
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

		<tr>
			<td>Unit</td>
			<td>
				<input type="text" name="unit">
			</td>
		</tr>

		<tr>
			<td>Nomor Telepon</td>
			<td>
				<input type="text" name="no_telp">
			</td>
		</tr>

		<tr>
			<td>Email</td>
			<td>
				<input type="email" name="email">
			</td>
		</tr>

		<tr>
			<td>Password</td>
			<td>
				<input type="text" name="pass">
			</td>
		</tr>

			<td colspan=2>
				<input type="submit" name="Submit">
			</td>
		</tr>
	</table>
		
</form>

@endsection