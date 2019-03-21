@extends('layout.layout')
@section('content')
<table class="table table-striped">
  <tbody>
    <tr>
      <td><h4>Ubah Stok Bahan Baku</h4></td>
    </tr>
     <tr>
        <td colspan="1">
           <form class="well form-horizontal" method="post" action="{{ url('/storestokbahanbaku') }}">
            
            {{ csrf_field() }}
              <table id="" class="table table-bordered">
                <tr class="attendance-cell " >
                  <th class="attendance-cell " >Kode</th>
                  <th class="attendance-cell " >Nama</th>
                  <th class="attendance-cell " >Stok</th>
                  <th class="attendance-cell " >Harga</th>
                  <th class="attendance-cell " >Supplier</th>
                </tr>
                @foreach($bb as $zz => $data)
                <tr>
                    <td class='attendance-cell'>{{$data['id_bahan_baku']}}</td>
                    <td class='attendance-cell'>{{$data['nama']}}</td>
                    <td class='attendance-cell' id="quantity" style="width: 200px"><input type="number" name="{{$data['id_bahan_baku']}}" value="{{$data['stok']}}" class="form-control"></td>
                    <td class='attendance-cell'>{{$data['harga']}}</td>
                    <td class='attendance-cell'>{{$data['supplier_id_supplier']}}</td>
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