@extends('layout.layout')
@section('content')
EDIT DATA SUPPLIER
@foreach ($errors->all() as $error)
<div style="background-color: red; color:white; margin-bottom: 5px">{{ $error }}</div>
@endforeach

@if(session('status'))
<div style="background-color: green; color:white">	
	{{ session('status')}}
</div>
@endif
<form method="post" action="{{url('/karyawan/'.$karyawan->id)}}">
	<input type="hidden" name="_method" value="PUT">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<table>
		<tr>
			<td>Nama Supplier</td>
			<td>
				<input type="text" name="nama" value="{{$karyawan->nama}}">
			</td>
		</tr>
		
		<tr>
			<td>Alamat</td>
			<td>
				<textarea name="alamat">{{$karyawan->alamat}}</textarea>
			</td>
		</tr>
		<tr>
			<td><a href="	{{url('/karyawan/')}}">[BACK]</a></td>
			<td>
				<input type="submit" name="Submit">
			</td>
		</tr>
	</table>
		
</form>

@endsection