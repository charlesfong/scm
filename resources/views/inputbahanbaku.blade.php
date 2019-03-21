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
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="username" name="namabb" placeholder="Nama Bahan Baku" class="form-control" required="true" value="" type="text"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Harga</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="full_name" name="hargabb" placeholder="Harga" class="form-control" required="true" value="" type="number"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-1 control-label">Supplier</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <select name="id_supz" id="category" class="form-control">
                      <option disabled selected value> -- Pilih Supplier -- </option>
                      @foreach($supplierz as $supp)
                      <option value="{{$supp->id_supplier}}">{{$supp->nama}}</option>
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