@extends('layout.layout')
@section('content')
      <h4>Detail SPK</h4>
           <form class="well form-horizontal" method="post" action="{{ url('/storeorder') }}">
            
            {{ csrf_field() }}
              <fieldset>
                 <div class="form-group">
                    <label class="col-md-1 control-label">ID Order</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        {{$spks->order_detail_id}}
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">ID SPK</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        {{$spks->id_spk}}
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Nama Customer</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        {{$cust->nama}}
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Nama Barang</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        {{$order_d->nama_barang}}
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Tanggal Mulai Kerja</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        {{$order->created_at}}
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Lama Kerja</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        {{$spks->lama_kerja}}
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Biaya</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        {{$spks->biaya}}
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Nama Karyawan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        {{$kary->nama}}
                       </div>
                    </div>
                 </div>
                <br>
                <input type="button" id="permintaan" value="Buat Permintaan Bahan Baku" class="btn btn-success btn-sm" />
                <input type="button" id="notabeli" value="Input Nota Beli" class="btn btn-danger btn-sm" />
                <input type="button" id="penggunaan" value="Input Penggunaan Bahan Baku" name="Input Penggunaan Bahan Baku" class="btn btn-success btn-sm" style="float: right;" />
           </form>
@section('script')

<script type="text/javascript">
  $(document).ready(function() {

        var iCnt = 0;
        if (iCnt==0)
        {
            iCnt = iCnt + 1;
                $('#list_barang').append('<tr id="'+iCnt+'"><td><input name="kodebarang[]" placeholder="Kode barang" class="form-control" required="true" value="" type="text"></td><td><input name="namabarang[]" placeholder="Nama barang" class="form-control" required="true" value="" type="text"></td><td><input name="unitpemesanan[]" placeholder="Unit Pemesanan" class="form-control" required="true" value="" type="number" MIN="1"></td><td><input name="jumlah[]" class="form-control" required="true" value="" type="number" placeholder="jumlah" MIN="1"></td><td><input name="satuan[]" class="form-control" required="true" value="" type="text" placeholder="satuan"></td><td><input name="hargasatuan[]" class="form-control" required="true" value="" type="number" placeholder="harga satuan" MIN="1"></td><td><input name="alamat_pengiriman[]" class="form-control" required="true" value="" type="text" placeholder="alamat pengiriman"></td><td><input name="biaya_transport[]" class="form-control" required="true" value="" type="number" placeholder="biaya transport" MIN="1"></td><td><input name="keterangan[]" placeholder="Keterangan" class="form-control" required="true" value="" type="text"></td></tr>');
        }
        
            $('#btAdd').click(function() {
                iCnt = iCnt + 1;
                $('#list_barang').append('<tr id="'+iCnt+'"><td><input name="kodebarang[]" placeholder="Kode barang" class="form-control" required="true" value="" type="text"></td><td><input name="namabarang[]" placeholder="Nama barang" class="form-control" required="true" value="" type="text"></td><td><input name="unitpemesanan[]" placeholder="Unit Pemesanan" class="form-control" required="true" value="" type="number" MIN="1"></td><td><input name="jumlah[]" class="form-control" required="true" value="" type="number" placeholder="jumlah" MIN="1"></td><td><input name="satuan[]" class="form-control" required="true" value="" type="text" placeholder="satuan"></td><td><input name="hargasatuan[]" class="form-control" required="true" value="" type="number" placeholder="harga satuan" MIN="1"></td><td><input name="alamat_pengiriman[]" class="form-control" required="true" value="" type="text" placeholder="alamat pengiriman"></td><td><input name="biaya_transport[]" class="form-control" required="true" value="" type="number" placeholder="biaya transport" MIN="1"></td><td><input name="keterangan[]" placeholder="Keterangan" class="form-control" required="true" value="" type="text"></td></tr>');
        });
        
        $('#btRemove').click(function() {
            if (iCnt != 1) { $('#' + iCnt).remove(); iCnt = iCnt - 1; }
            else if (iCnt ==1)
            {
                alert("Tidak bisa menghapus, minimal barang harus 1");
            }            
        });
        $('#cust_opt').change(function(){
          var id = $(this).val();
          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'post',
              url: "{{route('getdetails_customer')}}",
              data: {
                  'id_customer': id,
                  _token: '{!! csrf_token() !!}'
              },
              success: function (data) {
                  var data = data['result'];
                  var unit = data['unit'];
                  $("#unit_pemesanan").val(unit);
              },
          });
        });
    });
</script>

@endsection
@endsection