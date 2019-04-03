@extends('layout.layout')
@section('content')
<table class="table table-striped">
  <tbody>
    <tr>
      <td><h4>Tambah Data Mesin</h4></td>
    </tr>
     <tr>
        <td colspan="1">
           <form class="well form-horizontal" method="post" action="{{ route('storemesin') }}">
            
            {{ csrf_field() }}
              <fieldset>
                 <div class="form-group">
                    <label class="col-md-2 control-label">Nama Mesin</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="name" name="nama_mesin" placeholder="Nama Mesin" class="form-control" required="true" value="" type="text"></div>
                    </div>
                 </div>
              </fieldset>
              
                <input type="submit" value="Simpan" name="simpan" class="btn btn-success btn-sm" style="float: right;" />
              
           </form>
        </td>                
     </tr>
      <tr>
        
      </tr>
  </tbody>
</table>
@endsection
