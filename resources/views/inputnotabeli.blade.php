@extends('layout.layout')
@section('content')
      <h4>Nota Beli</h4>
           <form class="well form-horizontal" method="post" action="{{ route('storenotabeli') }}">
            
            {{ csrf_field() }}
              <fieldset>
                <div class="form-group">
                    <label class="col-md-1 control-label">Nomor Nota</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="text" id="nomornota" name="nomornota" class="form-control">
                       </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label">Tanggal Nota</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="date" id="tanggal" name="tanggal" class="form-control">
                       </div>
                    </div>
                </div>

                 <div class="form-group">
                    <label class="col-md-1 control-label">Supplier</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <select id="supplier" name="supplier" class="form-control">
                          <option selected="selected" disabled="disabled">Pilih Supplier</option>
                          @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id_supplier}}">{{$supplier->nama}}</option>
                          @endforeach
                        </select>
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Id Permintaan Bahan Baku</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <select id="pbb" name="pbb" class="form-control">
                          <option selected="selected" disabled="disabled">Pilih Permintaan Bahan Baku</option>
                          @foreach ($pbb as $data)
                            <option value="{{$data->no_permintaan_bahan}}">{{$data->no_permintaan_bahan}}</option>
                          @endforeach
                        </select>
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Total</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="number" id="Total" name="harga_total" class="form-control" readonly="">
                       </div>
                    </div>
                </div>                 
                 <!-- <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">List Barang</h4>
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>
                              Nama Bahan Baku
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
                              Sub Total
                            </th>
                          </tr>
                        </thead>
                        <tbody id="list_bb">
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <br>
                <input type="button" id="btAdd" value="Tambah Bahan Baku" class="btn btn-success btn-sm" />
                <input type="button" id="btRemove" value="Hapus Bahan Baku Terahkir" class="btn btn-danger btn-sm" />

                <br>
                <br>
                <div class="form-group">
                    <label class="col-md-1 control-label">Total Beli</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="number" id="nomornota" class="form-control">
                       </div>
                    </div>
                </div> -->

                <input type="submit" value="simpan" name="simpan" class="btn btn-success btn-sm" style="float: right;" />
           </form>

<div class="modal fade" id="modal-view" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="top: 30vh;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                    
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                
                
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
@section('script')

<script type="text/javascript">
  $(document).ready(function() {

        $('#pbb').change(function(){
              var id = $(this).val();
              $.ajax({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type: 'post',
                  url: "{{route('bbdetail')}}",
                  data: {
                      'id_bb': id,
                      _token: '{!! csrf_token() !!}'
                  },
                  success: function (data) {
                      var data = data['result'];
                      sisa     = data['stok'];
                      $("#sisa_stok").val(sisa);
                      $("#modal-view").modal("show");
                  },
              });
            });
            
        });



        var iCnt = 0;
        if (iCnt==0)
        {
            iCnt = iCnt + 1;
                $('#list_bb').append('<tr id="'+iCnt+'"><td><input name="namabb[]" placeholder="Nama Bahan Baku" class="form-control" required="true" value="" type="text"></td><td><input name="jumlah[]" class="form-control" required="true" value="" type="number" placeholder="Jumlah" MIN="1"></td><td><input name="satuan[]" class="form-control" required="true" value="" type="text" placeholder="Satuan"></td><td><input name="hargasatuan[]" class="form-control" required="true" value="" type="number" placeholder="Harga Satuan" MIN="1"></td><td><input name="subtotal[]" class="form-control" required="true" value="" type="number" placeholder="Sub Total" MIN="1"></td></tr>');
        }
        
            $('#btAdd').click(function() {
                iCnt = iCnt + 1;
                $('#list_bb').append('<tr id="'+iCnt+'"><td><input name="namabb[]" placeholder="Nama Bahan Baku" class="form-control" required="true" value="" type="text"></td><td><input name="jumlah[]" class="form-control" required="true" value="" type="number" placeholder="Jumlah" MIN="1"></td><td><input name="satuan[]" class="form-control" required="true" value="" type="text" placeholder="Satuan"></td><td><input name="hargasatuan[]" class="form-control" required="true" value="" type="number" placeholder="Harga Satuan" MIN="1"></td><td><input name="subtotal[]" class="form-control" required="true" value="" type="number" placeholder="Sub Total" MIN="1"></td></tr>');
        });
        
        $('#btRemove').click(function() {
            if (iCnt != 1) { $('#' + iCnt).remove(); iCnt = iCnt - 1; }
            else if (iCnt ==1)
            {
                alert("Tidak bisa menghapus, minimal barang harus 1");
            }            
        });
    });
</script>

@endsection
@endsection