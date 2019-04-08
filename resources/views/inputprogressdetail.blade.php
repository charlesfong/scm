@extends('layout.layout')
@section('content')
<table class="table table-striped">
  <tbody>
    <tr>
      <td><h4>Tambah Progress Produksi</h4></td>
    </tr>
     <tr>
        <td colspan="1">
           <form class="well form-horizontal" method="post" action="{{ route('storeprogressdetail') }}">
            
            {{ csrf_field() }}
              <fieldset>
                 
                 <div class="form-group">
                    <label class="col-md-1 control-label">No Dokumen</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <select name="no_dokumen" class="form-control">
                         <option disabled="disabled" selected="selected">Pilih No Dokumen</option>
                         @foreach ($progress as $pro)
                            <option value="{{$pro->no_dokumen}}">
                              {{$pro->no_dokumen}}
                            </option>
                          @endforeach
                       </select></div>
                    </div>
                 </div>  
                 <div class="form-group">
                    <label class="col-md-1 control-label">Mesin</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <select name="id_mesin" class="form-control">
                         <option disabled="disabled" selected="selected">Pilih Mesin</option>
                         @foreach ($mesins as $mesin)
                            <option value="{{$mesin->id_mesin}}">
                              {{$mesin->nama}}
                            </option>
                          @endforeach
                       </select></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Karyawan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <select name="id_karyawan" class="form-control">
                         <option disabled="disabled" selected="selected">Pilih Karyawan</option>
                         @foreach ($karyawans as $karyawan)
                            <option value="{{$karyawan->id_karyawan}}">
                              {{$karyawan->nama}}
                            </option>
                          @endforeach
                       </select></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Tanggal Rencana</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                          <input name="tgl_rencana" class="form-control" required="true" value="" type="date">
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Tanggal Progress</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span><input name="tgl_progress" class="form-control" value="" type="date"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Hasil</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span><input name="hasil" class="form-control" value="" type="text"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Keterangan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span><input name="keterangan" class="form-control" value="" type="text"></div>
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