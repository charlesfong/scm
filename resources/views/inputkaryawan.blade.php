@extends('layout.layout')
@section('content')
<table class="table table-striped">
  <tbody>
    <tr>
      <td><h4>Tambah Karyawan</h4></td>
    </tr>
     <tr>
        <td colspan="1">
           <form class="well form-horizontal" method="post" action="{{ url('/storekaryawan') }}">
            
            {{ csrf_field() }}
              <fieldset>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Nama</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="username" name="nama" placeholder="Nama" class="form-control" required="true" value="" type="text"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Jabatan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <select name="jabatan" class="form-control">
                          <option selected="selected" disabled="disabled">Pilih Jabatan</option>
                          <option value="admin">Admin</option>
                          <option value="operator mesin besi">Operator Mesin Besi</option>
                          <option value="operator mesin kayu">Operator Mesin kayu</option>
                          <option value="keuangan">Keuangan</option>
                        </select>
                      </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Alamat</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="full_name" name="alamat" placeholder="Alamat" class="form-control" required="true" value="" type="text"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Telp</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="full_name" name="no_telp" placeholder="No Telepon" class="form-control" required="true" value="" type="text"></div>
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