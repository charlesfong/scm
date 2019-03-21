@extends('layout.layout')
@section('content')
<table class="table table-striped">
  <tbody>
    <tr>
      <td><h4>Tambah Order</h4></td>
    </tr>
     <tr>
        <td colspan="1">
           <form class="well form-horizontal" method="post" action="{{ url('/storeorder') }}">
            
            {{ csrf_field() }}
              <fieldset>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Customer</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span>
                        <select name="customer" class="form-control">
                          <option selected="selected" disabled="disabled">Pilih Customer</option>
                          @foreach ($customer as $cust)
                            <option value="{{$cust->id_customer}}">{{$cust->nama}}</option>
                          @endforeach
                        </select>
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
                 <div class="form-group">
                    <label class="col-md-1 control-label">Unit Pemesanan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span><input name="unitpemesanan" placeholder="Unit Pemesanan" class="form-control" required="true" value="" type="number">
                      </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Kode Barang</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span><input name="kodebarang" placeholder="Kode barang" class="form-control" required="true" value="" type="text"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Nama Barang</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span><input name="namabarang" placeholder="Nama barang" class="form-control" required="true" value="" type="text"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Jumlah</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span><input name="jumlah" class="form-control" required="true" value="" type="number"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Satuan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span><input name="satuan" class="form-control" required="true" value="" type="number"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Harga Satuan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"></span><input name="hargasatuan" class="form-control" required="true" value="" type="number"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Keterangan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input name="keterangan" placeholder="Keterangan" class="form-control" required="true" value="" type="text"></div>
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