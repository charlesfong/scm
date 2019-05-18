@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title">
  List Data Mesin
</h3>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Tanggal Beli</th>
            <th style="text-align: center;">View/Edit/Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($mesins as $key => $msn)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $msn->id_mesin }}</td>
            <td>{{ $msn->nama }}</td>
            <td>{{ $msn->tanggal_beli }}</td>
            <td style="text-align: center;">
                <button type="button" class="btn btn-outline-secondary btn-icon-text btn-sm btn-view" value="{{$msn->id_mesin}}" data-toggle="modal" data-target="#modal-view"><i class="fa fa-eye"></i></button>
                <span><button type="button" data-toggle="modal" data-target="#modal-edit" 
                class="btn btn-outline-primary btn-icon-text btn-sm btn-edit" value="{{$msn->id_mesin}}"><i class="fa fa-edit"></i></button></span>&nbsp;
                <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-outline-danger btn-sm btn-delete" value="{{route('delete_mesin', ['id_mesin' => $msn->id_mesin])}}"><i class="fa fa-trash-o"></i></button></span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
<div class="modal fade" id="modal-view" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="top: 30vh;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 imgUp" style="padding-left: 2.5em;">
                        <div class="imagePreview"></div>
                    </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                
                
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="top: 30vh;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                    <p style="text-align: center; color: black;">
                        <strong id="model-change-status-questions">Hapus Mesin ini?</strong>
                    </p>
                
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <form id="frmDelete" method="post" action="">
                    {{csrf_field()}}
                    <button id="btn-submit-delete-member" type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </form>
                
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="top: 30vh;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                    <p style="text-align: center; color: black;">
                        <strong id="model-change-status-questions">Edit Data Mesin</strong>
                    </p>
                
                <div class="clearfix"></div>
            </div>
            <form id="frmEdit" method="post" action="{{ route('updatemesin') }}">
                    {{csrf_field()}}
                    <div class="modal-body contact-form2">

                      <div class="form-group">
                          <span>Nama</span>
                          <input id="edit-id" name="id_mesin" hidden/>
                          <input id="edit-nama" type="text" name="nama" class="form-control"  value="" required>
                          <span class="invalid-feedback">
                              <strong></strong>
                          </span>
                      </div>
                      <div class="form-group">
                          <span>Tanggal Beli</span>
                          <input id="edit-tgl_beli" type="date" name="tgl_beli" class="form-control"  value="" required>
                          <span class="invalid-feedback">
                              <strong></strong>
                          </span>
                      </div>
                    </div>
                    <div class="modal-footer" style="margin-top: 40px;">
                        <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit" id="btn-confirmUpdate" value="-">SAVE</button>
                    </div>
                </form>
            <div class="modal-footer">
                
                
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>

@section('script')

<script type="text/javascript">
    $(".btn-delete").click(function(e) {
        $("#frmDelete").attr("action",  $(this).val());
    });

    $(".btn-view").click(function (e) {
        var id = $(this).val();
        console.log(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: "{{route('getdetails_mesin')}}",
            data: {
                'id_mesin': id,
                _token: '{!! csrf_token() !!}'
            },
            success: function (data) {
                var data = data['result'];
                var image = data['image'];
                // var image = data['image'].replace(new RegExp(' ', 'g'), "%20");
                if (image!=null && image!="")
                {
                    var urlNya = "<?php echo asset('sources/mesin/'); ?>";
                    $(".imgUp").find('.imagePreview').css({"width": "100%", "height": "100%"});
                    $(".imgUp").find('.imagePreview').css("background-image", "url("+urlNya+"/"+image+")");
                }
                else
                {
                    $(".imgUp").find('.imagePreview').css({"background-image": "url('sources/etc/blank.jpg')", "width": "250px", "height": "250px"});
                }
                
            },
        });
    });

    $(".btn-edit").click(function (e) {
        var id = $(this).val();
        console.log(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: "{{route('getdetails_mesin')}}",
            data: {
                'id_mesin': id,
                _token: '{!! csrf_token() !!}'
            },
            success: function (data) {
                var data = data['result'];
                var nama = data['nama'];
                var tgl_beli = data['tanggal_beli'];
                $("#edit-id").val(id);
                $("#edit-nama").val(nama);
                $("#edit-tgl_beli").val(tgl_beli);
            },
        });
    });


</script>

@endsection