@extends('layout.layout')
@section('content')
      <h4>Permintaan Bahan Baku</h4>
           <form class="well form-horizontal" method="post" action="{{ route('storepermintaanbahanbaku') }}">
            
            {{ csrf_field() }}
              <fieldset>
                 <div class="form-group">
                    <label class="col-md-1 control-label">No Permintaan Bahan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="text" id="id" name="id" class="form-control">
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Bahan Baku</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <select id="id_bb" name="id_bb" class="form-control">
                          <option selected="selected" disabled="disabled">Pilih Order</option>
                          @foreach ($bbs as $bb)
                            <option value="{{$bb->id_bahan_baku}}">{{$bb->nama}}</option>
                          @endforeach
                        </select>
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Id SPK</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <select id="id_spk" name="id_spk" class="form-control">
                          <option selected="selected" disabled="disabled">Pilih Order</option>
                          @foreach ($spks as $spk)
                            <option value="{{$spk->id_spk}}">{{$spk->id_spk}}</option>
                          @endforeach
                        </select>
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Tanggal</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="date" id="tanggal" name="tanggal" class="form-control">
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">No Revisi</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="text" id="no_revisi" name="no_revisi" class="form-control">
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Jenis</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="text" id="jenis" name="jenis"class="form-control">
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Jumlah</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="number" id="jumlah" name="jumlah" class="form-control" min="1">
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Harga Satuan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="number" id="hargasatuan" name="hargasatuan" class="form-control" readonly>
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Total Harga</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="number" id="total" name="total" class="form-control" readonly>
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Keterangan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="text" id="keterangan" name="keterangan" class="form-control">
                       </div>
                    </div>
                 </div>
                
                <br>
                
                <input type="submit" value="simpan" name="simpan" class="btn btn-success btn-sm" style="float: right;" />
           </form>
@section('script')

<script type="text/javascript">
  $(document).ready(function() {
    $('#jumlah').change(function(){
        var harga=$('#hargasatuan').val();
        $("#total").val(harga*$('#jumlah').val());
    });
    $('#id_bb').change(function(){
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
                  $("#hargasatuan").val(data['harga']);
              },
          });
        });
    });
</script>

@endsection
@endsection