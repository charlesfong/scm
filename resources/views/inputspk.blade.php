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
                        <select name="order" class="form-control">
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