@extends('layout.layout')
@section('content')
      <h4>Penggunaan Bahan Baku</h4>
           <form class="well form-horizontal" method="post" action="{{ route('storepenggunaanbahanbaku') }}">
            
            {{ csrf_field() }}
              <fieldset>
                 <div class="form-group">
                    <label class="col-md-1 control-label">No Penggunaan Bahan</label>
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
                    <label class="col-md-1 control-label">Jumlah Masuk</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="number" id="jumlah_masuk" name="jumlah_masuk" class="form-control" min="1">
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Jumlah Keluar</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="number" id="jumlah_keluar" name="jumlah_keluar" class="form-control" min="1">
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Tanggal Keluar</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="date" id="tanggal_keluar" name="tanggal_keluar" class="form-control">
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Sisa Stok Sementara</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="number" id="sisa_stok" name="sisa_stok" class="form-control" readonly>
                       </div>
                    </div>
                 </div>
                <div class="form-group">
                    <label class="col-md-1 control-label">Stok Opname</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="number" id="stok_opname" name="stok_opname" class="form-control" min="1">
                       </div>
                    </div>
                 </div>
                <br>
                
                <input type="submit" value="simpan" name="simpan" class="btn btn-success btn-sm" style="float: right;" />
           </form>
@section('script')

<script type="text/javascript">
  var sisa=0;
  $(document).ready(function() {
    $('#jumlah_keluar').change(function(){
        var minus = $('#jumlah_keluar').val();
        var hasil = sisa-minus;
        $("#sisa_stok").val(hasil);
    });
    $('#jumlah_masuk').change(function(){
        var plus = $('#jumlah_masuk').val();
        var hasil = sisa+plus;
        $("#sisa_stok").val(hasil);
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
                  sisa     = data['stok'];
                  $("#sisa_stok").val(sisa);
              },
          });
        });
    });
</script>

@endsection
@endsection