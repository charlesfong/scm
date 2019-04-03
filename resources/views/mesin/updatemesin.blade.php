@extends('layout.layout')
@section('content')
<table class="table table-striped">
  <tbody>
    <tr>
      <td><h4>Ubah Nama Mesin</h4></td>
    </tr>
     <tr>
        <td colspan="1">
           <form class="well form-horizontal" method="post" action="{{ route('updatemesin') }}">
            
            {{ csrf_field() }}
              <table id="" class="table table-bordered">
                <tr class="attendance-cell " >
                  <th class="attendance-cell " >ID</th>
                  <th class="attendance-cell " >Nama</th>
                </tr>
                @foreach($mesin as $zz => $data)
                <tr>
                    <td class='attendance-cell'>{{$data['id_mesin']}}</td>
                    <td class='attendance-cell' id="quantity" style="width: 200px"><input type="text" name="{{$data['id_mesin']}}" value="{{$data['nama']}}" class="form-control"></td>
                @endforeach

                <tbody>
                </tfoot>
              </table>
              
                <input type="submit" value="simpan" class="btn btn-success btn-sm" style="float: right;" />
              
           </form>
        </td>                
     </tr>
      <tr>
        
      </tr>
  </tbody>
</table>
@endsection
@section('script')
<script src="{{ asset('js/admin/tags-input.js') }}"></script>
<script src="{{ asset('js/admin/metisMenu.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.number.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.tablesorter.js') }}"></script>
<script src="{{ asset('js/admin/jquery.tablesorter.widgets.js') }}"></script>

<script>

</script>
@endsection