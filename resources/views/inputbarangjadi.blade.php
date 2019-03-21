@extends('layout.layout')
@section('content')
<table class="table table-striped">
  <tbody>
    <tr>
      <td><h4>Tambah Barang Jadi</h4></td>
    </tr>
     <tr>
        <td colspan="1">
           <form class="well form-horizontal" method="post" action="{{ url('/storebarangjadi') }}">
            
            {{ csrf_field() }}
              <fieldset>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Id SPK</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <select name="spk" class="form-control">
                          <option disabled selected value> -- Pilih SPK -- </option>
                          @foreach($spk as $spkz)
                          <option value="{{$spkz->id_spk}}">{{$spkz->id_spk}}</option>
                          @endforeach
                        </select></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Nama</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span><input name="nama" class="form-control" required="true" value="" type="number"></div>
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