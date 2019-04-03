@extends('layout.layout')
@section('content')
      <h4>Tambah Order</h4>
           <form class="well form-horizontal" method="post" action="{{ url('/storeorder') }}">
            
            {{ csrf_field() }}
              <fieldset>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Customer</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <select name="customer" class="form-control">
                          <option selected="selected" disabled="disabled">Pilih Customer</option>
                          @foreach ($customer as $cust)
                            <option value="{{$cust->id_customer}}">{{$cust->nama}}</option>
                          @endforeach
                        </select>
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Karyawan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <select name="karyawan" class="form-control">
                          <option selected="selected" disabled="disabled">Pilih Karyawan</option>
                          @foreach ($karyawan as $kary)
                            <option value="{{$kary->id_karyawan}}">{{$kary->nama}}</option>
                          @endforeach
                        </select>
                       </div>
                    </div>
                 </div>

                    <label class="col-md-1 control-label">List Barang :</label>
                    <table class="table table-bordered" style="border: 1px solid">
                            <span id="list_barang"></span>
                            <!-- <tr>
                                <td>asdf</td>
                                <td>asdf</td>
                                <td>asdf</td>
                                <td>asdf</td>
                                <td>asdf</td>
                                <td>asdf</td>
                                <td>asdf</td>
                            </tr>   -->      
                    </table><br>
                <input type="button" id="btAdd" value="Tambah Barang" class="btn btn-success btn-sm" />
                <input type="button" id="btRemove" value="Hapus Barang Terahkir" class="btn btn-danger btn-sm" />
                <input type="submit" value="simpan" name="simpan" class="btn btn-success btn-sm" style="float: right;" />
              
           </form>
@section('script')

<script type="text/javascript">
  $(document).ready(function() {

        var iCnt = 0;
        if (iCnt==0)
        {
            iCnt = iCnt + 1;
                $('#list_barang').append('<tr id="'+iCnt+'"><td><input name="unitpemesanan[]" placeholder="Unit Pemesanan" class="form-control" required="true" value="" type="number"></td><td><input name="kodebarang[]" placeholder="Kode barang" class="form-control" required="true" value="" type="text"></td><td><input name="namabarang[]" placeholder="Nama barang" class="form-control" required="true" value="" type="text"></td><td><input name="jumlah[]" class="form-control" required="true" value="" type="number" placeholder="jumlah"></td><td><input name="satuan[]" class="form-control" required="true" value="" type="number" placeholder="satuan"></td><td><input name="hargasatuan[]" class="form-control" required="true" value="" type="number" placeholder="harga satuan"></td><td><input name="keterangan[]" placeholder="Keterangan" class="form-control" required="true" value="" type="text"></td></tr>');
        }
        
            $('#btAdd').click(function() {
                iCnt = iCnt + 1;
                $('#list_barang').append('<tr id="'+iCnt+'"><td><input name="unitpemesanan[]" placeholder="Unit Pemesanan" class="form-control" required="true" value="" type="number"></td><td><input name="kodebarang[]" placeholder="Kode barang" class="form-control" required="true" value="" type="text"></td><td><input name="namabarang[]" placeholder="Nama barang" class="form-control" required="true" value="" type="text"></td><td><input name="jumlah[]" class="form-control" required="true" value="" type="number" placeholder="jumlah"></td><td><input name="satuan[]" class="form-control" required="true" value="" type="number" placeholder="satuan"></td><td><input name="hargasatuan[]" class="form-control" required="true" value="" type="number" placeholder="harga satuan"></td><td><input name="keterangan[]" placeholder="Keterangan" class="form-control" required="true" value="" type="text"></td></tr>');
        });
        
        $('#btRemove').click(function() {
            if (iCnt != 1) { $('#' + iCnt).remove(); iCnt = iCnt - 1; }
            else if (iCnt ==1)
            {
                alert("Tidak bisa menghapus, minimal misi harus 1");
            }            
        });
    });
</script>

@endsection
@endsection