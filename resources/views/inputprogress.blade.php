@extends('layout.layout')
@section('content')
<table class="table table-striped">
  <tbody>
    <tr>
      <td><h4>Tambah Progress Produksi</h4></td>
    </tr>
     <tr>
        <td colspan="1">
           <form class="well form-horizontal" method="post" action="{{ route('storeprogress') }}">
            
            {{ csrf_field() }}
              <fieldset>
                 <div class="form-group">
                    <label class="col-md-1 control-label">No Dokumen</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                          <input name="no_dokumen" class="form-control" required="true" value="" type="text">
                       </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">No Revisi</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span><input name="no_revisi" class="form-control" value="" type="text"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Id SPK</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <select name="id_spk" class="form-control">
                         <option disabled="disabled" selected="selected">Pilih SPK</option>
                         @foreach ($spks as $spk)
                            <option value="{{$spk->id_spk}}">
                            @foreach ($order_d as $od)
                              @if($od->id==$spk->order_detail_id)
                                Kode Barang:{{$od->kode_barang}}, Nama Barang:{{$od->nama_barang}}, Id SPK: {{$spk->id_spk}}
                              @endif
                            @endforeach
                            </option>
                          @endforeach
                       </select></div>
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