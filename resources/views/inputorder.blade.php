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
                        <select name="customer" id="cust_opt" class="form-control">
                          <option selected="selected" disabled="disabled">Pilih Customer</option>
                          @foreach ($customer as $cust)
                            <option value="{{$cust->id_customer}}">{{$cust->nama}}</option>
                          @endforeach
                        </select>
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Unit Pemesanan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="text" id="unit_pemesanan" disabled="disabled" class="form-control">
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
                 <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">List Barang</h4>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>
                              Kode Barang
                            </th>
                            <th>
                              Nama Barang
                            </th>
                            <th>
                              Unit Pemesanan
                            </th>
                            <th>
                              Jumlah
                            </th>
                            <th>
                              Satuan
                            </th>
                            <th>
                              Harga Satuan
                            </th>
                            <th>
                              Alamat Pengiriman
                            </th>
                            <th>
                              Biaya Transport
                            </th>
                            <th>
                              Keterangan
                            </th>
                          </tr>
                        </thead>
                        <tbody id="list_barang">
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <br>
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