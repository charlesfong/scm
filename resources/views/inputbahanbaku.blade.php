@extends('layout.layout')
@section('content')
<table class="table table-striped">
  <tbody>
    <tr>
      <td><h4>Tambah Bahan Baku</h4></td>
    </tr>
     <tr>
        <td colspan="1">
           <form class="well form-horizontal" method="post" action="{{ url('/storebahanbaku') }}">
            
            {{ csrf_field() }}
              <fieldset>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Nama</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="namabb" name="namabb" placeholder="Nama Bahan Baku" class="form-control" required="true" value="" type="text"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Kategori</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                       <select id="id_bb" name="id_bb" class="form-control">
                          <option selected="selected" disabled="disabled">Pilih Kategori</option>
                          @foreach ($bbs as $bb)
                            <option value="{{$bb->id_bahan_baku}}">{{$bb->nama}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Harga</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="hargabb" name="hargabb" placeholder="Harga" class="form-control" required="true" value="" type="number"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Satuan</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="satuan" name="satuan" placeholder="Satuan" class="form-control" required="true" value="" type="text"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Supplier</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <select name="id_supz" id="id_supz" class="form-control">
                      <option disabled selected value> -- Pilih Supplier -- </option>
                      @foreach($supplierz as $supp)
                      <option value="{{$supp->id_supplier}}">{{$supp->nama}}</option>
                      @endforeach
                    </select></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Deskripsi</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><textarea id="description" name="description" placeholder="Deskripsi" class="form-control" value=""></textarea>
                       </div>
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