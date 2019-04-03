@extends('layout.layout')
@section('content')
<table class="table table-striped">
  <tbody>
    <tr>
      <td><h4>Tambah SPK</h4></td>
    </tr>
     <tr>
        <td colspan="1">
           <form class="well form-horizontal" method="post" action="{{ url('/storespk') }}">
            
            {{ csrf_field() }}
              <fieldset>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Order</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <select id="order_id" name="order" class="form-control">
                          <option selected="selected" disabled="disabled">Pilih Order</option>
                          @foreach ($orders as $order)
                            <option value="{{$order->id_order}}">{{$order->kode_barang}}-{{$order->nama_barang}}</option>
                          @endforeach
                        </select>
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Lama Kerja</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                          <input name="lamakerja" placeholder="Lama Kerja (Dalam Hari)" class="form-control" required="true" value="" type="number">
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Biaya</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                          <input name="biaya" placeholder="Biaya" class="form-control" required="true" value="" type="number">
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Lokasi Tempat Customer</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span><input name="lokasi" placeholder="Alamat" class="form-control" required="true" value="" type="text"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Deskripsi</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span><input name="deskripsi" placeholder="Deskripsi" class="form-control" required="true" value="" type="text"></div>
                    </div>
                 </div>
              </fieldset>
              
                <input type="submit" value="simpan" name="simpan" class="btn btn-success btn-sm" style="float: right;" />
              
           </form>
        </td>                
     </tr>
      <tr>
        
      </tr>
  </tbody>
</table>
@endsection

<div class="modal fade" id="modal-bom" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" style="top: 30vh;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                    <p style="text-align: center; color: black;">
                        <strong id="model-change-status-questions">Input BOM</strong>
                    </p>
                
                <div class="clearfix"></div>
            </div>
            <form id="frmEdit" method="post" action="{{ route('storebom') }}">
                    {{csrf_field()}}
                    <div class="modal-body contact-form2">
                      <input id="modal_id_order" name="id_order" hidden/>
                      <table class="table table-bordered" style="border: 1px solid">
                            <span id="list_barang">
                              
                            </span>
                      </table>
                      <br>
                        <input type="button" id="btAdd" value="Tambah Barang" class="btn btn-success btn-sm" />
                        <input type="button" id="btRemove" value="Hapus Barang Terahkir" class="btn btn-danger btn-sm" />
                    </div>
                    <div class="modal-footer" style="margin-top: 40px;">

                        <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" id="btn-confirmUpdate" value="-">SAVE</button>
                    </div>
                </form>
            <div class="modal-footer">
                
                
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>

@section('script')

<script type="text/javascript">
    var iCnt = 0;
    $("#order_id").change(function(e) {
        $("#modal_id_order").val($(this).val());
        
        if (iCnt==0)
        {
            iCnt = iCnt + 1;
                $('#list_barang').append('<tr id="'+iCnt+'"><td><select class="form-control" name="id_bahan_baku[]"><option disabled="disabled">Pilih Bahan Baku</option>@foreach ($bb as $b)<option value="{{$b->id_bahan_baku}}">{{$b->id_bahan_baku}}-{{$b->nama}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHarga : {{$b->harga}}</option>@endforeach</select></td><td><input name="bagian[]" placeholder="Bagian" class="form-control" required="true" value="" type="text"></td><td><input name="ukuran_mentah[]" placeholder="ukuran mentah" class="form-control" required="true" value="" type="number"></td><td><input name="ukuran_jadi[]" placeholder="ukuran jadi" class="form-control" required="true" value="" type="number"></td><td><input name="ukuran_luasan[]" placeholder="ukuran luasan" class="form-control" required="true" value="" type="number"></td><td><input name="jumlah_bagian[]" placeholder="jumlah bagian" class="form-control" required="true" value="" type="number"></td><td><input name="jumlah_satuan_bahan[]" placeholder="jumlah satuan bahan" class="form-control" required="true" value="" type="number"></td></tr>');
        }
        
            $('#btAdd').click(function() {
                iCnt = iCnt + 1;
                $('#list_barang').append('<tr id="'+iCnt+'"><td><select class="form-control" name="id_bahan_baku[]"><option disabled="disabled">Pilih Bahan Baku</option>@foreach ($bb as $b)<option value="{{$b->id_bahan_baku}}">{{$b->id_bahan_baku}}-{{$b->nama}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHarga : {{$b->harga}}</option>@endforeach</select></td><td><input name="bagian[]" placeholder="Bagian" class="form-control" required="true" value="" type="text"></td><td><input name="ukuran_mentah[]" placeholder="ukuran mentah" class="form-control" required="true" value="" type="number"></td><td><input name="ukuran_jadi[]" placeholder="ukuran jadi" class="form-control" required="true" value="" type="number"></td><td><input name="ukuran_luasan[]" placeholder="ukuran luasan" class="form-control" required="true" value="" type="number"></td><td><input name="jumlah_bagian[]" placeholder="jumlah bagian" class="form-control" required="true" value="" type="number"></td><td><input name="jumlah_satuan_bahan[]" placeholder="jumlah satuan bahan" class="form-control" required="true" value="" type="number"></td></tr>');
        });
        
        $('#btRemove').click(function() {
            if (iCnt != 1) { $('#' + iCnt).remove(); iCnt = iCnt - 1; }
            else if (iCnt ==1)
            {
                alert("Tidak bisa menghapus, minimal bom harus 1");
            }            
        });
        $("#modal-bom").modal("show");
    });


</script>

@endsection