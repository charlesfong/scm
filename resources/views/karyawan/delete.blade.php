<form method="post" action="{{url('/karyawan/'.$karyawan->id)}}">
	<input type="hidden" name="_method" value="DELETE">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<table>
		<tr>
			<td>Anda yakin ingin menghapus jurusan ini?/td>
			
		</tr>
		<tr>
			<td>
				<input type="submit" name="YA">
			</td>
		</tr>
	</table>
		
</form>