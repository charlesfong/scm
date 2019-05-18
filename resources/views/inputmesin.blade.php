@extends('layout.layout')
@section('content')
<table class="table table-striped">
  <tbody>
    <tr>
      <td><h4>Tambah Data Mesin</h4></td>
    </tr>
     <tr>
        <td colspan="1">
           <form class="well form-horizontal" method="post" action="{{ route('storemesin') }}" enctype="multipart/form-data">
            
            {{ csrf_field() }}
              <fieldset>
                 <div class="form-group">
                    <label class="col-md-2 control-label">Nama Mesin</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="name" name="nama_mesin" placeholder="Nama Mesin" class="form-control" required="true" value="" type="text"></div>
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-2 control-label">Tanggal Beli</label>
                    <div class="col-md-11 inputGroupContainer">
                       <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="tgl_beli" name="tgl_beli" class="form-control" required="true" value="" type="date"></div>
                    </div>
                 </div>
                <div class="form-group">
                  <span>Upload foto mesin</span>
                  <!-- <input id="gambars" class="form-control" type="file" name="arr_image" multiple> -->
                  <div class="col-xs-12 col-sm-4 imgUp" style="padding-left: 0.5em;">
                      <div class="imagePreview"></div>
                          <label class="btn btn-primary">Upload
                          <input name="image" id="image" type="file" accept=".jpg,.jpeg,.png" class="uploadFile img" value="Upload Icon" style="width: 0px;height: 0px;overflow: hidden;">
                          <i class="fa fa-upload"></i>
                          </label>
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
@section('script')
<script>
$(function() {
    $(document).on("change",".uploadFile", function()
    {

        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
      
    });
});
</script>
@endsection