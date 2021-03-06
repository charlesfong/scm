@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title" style="position:fixed;">
  List Supplier
</h3>
</div>
<div class="row" style="position:fixed;">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis</th>
            <th>No Telp</th>
            <th>Edit/Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($supplierz as $supp)
          <tr>
            <td>{{ $supp->nama}}</td>
            <td>{{ $supp->alamat}}</td>
            <td>{{ $supp->jenis}}</td>
            <td>{{ $supp->no_telp}}</td>
            <td style="text-align: center;">
                <span><button type="button" data-toggle="modal" data-target="#modal-edit" 
                class="btn btn-primary btn-sm btn-edit" value="{{$supp->id_supplier}}"><i class="fa fa-edit"></i></button></span>&nbsp;
                <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-sm btn-delete" value="{{route('delete_supplier', ['id_supplier' => $supp->id_supplier])}}"><i class="fa fa-trash-o"></i></button></span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
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
                        <strong id="model-change-status-questions">Hapus Supplier ini?</strong>
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
                        <strong id="model-change-status-questions">Edit Data Supplier</strong>
                    </p>
                
                <div class="clearfix"></div>
            </div>
            <form id="frmEdit" method="post" action="{{ route('updatesupplier') }}">
                    {{csrf_field()}}
                    <div class="modal-body contact-form2">

                      <div class="form-group">
                          <span>Nama</span>
                          <input id="edit-id" name="id_supplier" hidden/>
                          <input id="edit-nama" type="text" name="nama" class="form-control"  value="" required>
                          <span class="invalid-feedback">
                              <strong></strong>
                          </span>
                      </div>
                      <div class="form-group">
                          <span>Alamat</span>
                          <input id="edit-alamat" type="text" name="alamat" class="form-control"  value="" required>
                          <span class="invalid-feedback">
                              <strong></strong>
                          </span>
                      </div>
                      <div class="form-group">
                          <span>Jenis</span>
                          <input id="edit-jenis" type="text" name="jenis" class="form-control"  value="" required>
                          <span class="invalid-feedback">
                              <strong></strong>
                          </span>
                      </div>
                      <div class="form-group">
                          <span>No Telepon</span>
                          <input id="edit-telp" type="text" name="no_telp" class="form-control"  value="" required>
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

    $(".btn-edit").click(function (e) {
        var id = $(this).val();
        console.log(id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: "{{route('getdetails_supplier')}}",
            data: {
                'id_supplier': id,
                _token: '{!! csrf_token() !!}'
            },
            success: function (data) {
                console.log(data);
                var data = data['result'];
                var nama = data['nama'];
                var alamat = data['alamat'];
                var jenis = data['jenis'];
                var telp = data['no_telp'];
                $("#edit-id").val(id);
                $("#edit-nama").val(nama);
                $("#edit-alamat").val(alamat);
                $("#edit-jenis").val(jenis);
                $("#edit-telp").val(telp);
            },
        });
    });


</script>

@endsection