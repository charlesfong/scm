<form method="post" action="{{url('/customer/'.$customer->id)}}">
	<input type="hidden" name="_method" value="DELETE">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<table>
		<tr>
			<td>Apakah Anda Akan Menghapus Customer Ini ?</td>
			
		</tr>
		<tr>
			<td>
				<input type="submit" name="YA">
			</td>
		</tr>
	</table>
		
</form>