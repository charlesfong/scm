@extends('layout.layout')
@section('content')
<table class="table table-striped">
  <tbody>
    <tr>
      <td><h4>Seluruh Bahan Baku</h4></td>
    </tr>
     <tr>
        <td colspan="1">
            <input type="button" value="tambah" data-toggle="modal" data-target="#modal-add" class="btn btn-success btn-sm" style="float: right;" />
           <form class="well form-horizontal" method="post" action="{{ url('/storestokbahanbaku') }}">
            
            {{ csrf_field() }}
              <table id="" class="table table-bordered">
                <tr class="attendance-cell " >
                  <th class="attendance-cell " >Kode</th>
                  <th class="attendance-cell " >Nama</th>
                  <th class="attendance-cell " style="text-align: center;">Edit/Delete</th>
                </tr>
                @foreach($bb as $zz => $data)
                <tr>
                    <td class='attendance-cell'>{{$data['id_bahan_baku']}}</td>
                    <td class='attendance-cell'>{{$data['nama']}}</td>
                    <td class='attendance-cell' style="text-align: center;">
                      <span><button type="button" data-toggle="modal" data-target="#modal-edit" 
                      class="btn btn-primary btn-sm btn-edit" value="{{$data['id_bahan_baku']}}"><i class="fa fa-edit"></i></button></span>&nbsp;
                      <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-sm btn-delete" value="{{route('delete_bb', ['id_bahan_baku' => $data['id_bahan_baku']])}}"><i class="fa fa-trash-o"></i></button></span>
                  </td>
                @endforeach
                <tbody>
                </tfoot>
              </table>

                <input type="submit" value="simpan" class="btn btn-success btn-sm" style="float: right;" />
           </form>
        </td>                
     </tr>
      <tr>
        
      </tr>
  </tbody>
</table>
@endsection
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="top: 30vh;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                    <p style="text-align: center; color: black;">
                        <strong id="model-change-status-questions">Hapus Bahan Baku ini?</strong>
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
                        <strong id="model-change-status-questions">Ubah Nama Bahan Baku</strong>
                    </p>
                
                <div class="clearfix"></div>
            </div>
            <form id="frmEdit" method="post" action="{{ route('updatebb') }}">
                    {{csrf_field()}}
                    <div class="modal-body contact-form2">

                      <div class="form-group">
                          <span>Nama Bahan Baku</span>
                          <input id="edit-id" name="id_bahan_baku" hidden/>
                          <input id="edit-nama" type="text" name="nama" class="form-control"  value="" required>
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

<div class="modal fade" id="modal-add" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="top: 30vh;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                    <p style="text-align: center; color: black;">
                        <strong id="model-change-status-questions">Tambah Bahan Baku</strong>
                    </p>
                
                <div class="clearfix"></div>
            </div>
            <form id="frmEdit" method="post" action="{{ route('storebahanbakuparent') }}">
                    {{csrf_field()}}
                    <div class="modal-body contact-form2">

                      <div class="form-group">
                          <span>Nama Bahan Baku</span>
                          <input id="edit-id" name="id_bahan_baku" hidden/>
                          <input id="edit-nama" type="text" name="nama" class="form-control"  value="" required>
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
<script src="{{ asset('js/admin/tags-input.js') }}"></script>
<script src="{{ asset('js/admin/metisMenu.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.number.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.tablesorter.js') }}"></script>
<script src="{{ asset('js/admin/jquery.tablesorter.widgets.js') }}"></script>

<script type="text/javascript">
    $(".btn-delete").click(function(e) {
        $("#frmDelete").attr("action",  $(this).val());
    });
    $(".btn-edit").click(function (e) {
        var id = $(this).val();
        console.log(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: "{{route('getdetails_bb')}}",
            data: {
                'id_bahan_baku': id,
                _token: '{!! csrf_token() !!}'
            },
            success: function (data) {
                console.log(data);
                var data = data['result'];
                var id = data['id_bahan_baku'];
                var name = data['nama'];
                var harga = data['harga'];
                $("#edit-id").val(id);
                $("#edit-nama").val(name);
                $("#edit-harga").val(harga);
                // $("#modal-Update").modal("show");
            },
        });
    });
</script>
@endsection