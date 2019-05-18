@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title">
  Daftar Karyawan
</h3>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Id Karyawan</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jabatan</th>
            <th>Telepon</th>
            <th style="text-align: center;">Edit/Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($karyawan as $key=>$karyawan)
          <tr>
            <td>{{ $karyawan->id_karyawan }}</td>
            <td>{{ $karyawan->nama}}</td>
            <td>{{ $karyawan->alamat}}</td>
            <td>{{ $karyawan->jabatan}}</td>
            <td>{{ $karyawan->telepon}}</td>
            <td style="text-align: center;">
                <!-- <span><button type="button" class="btn btn-secondary btn-sm btn-edit" value="{{$karyawan->id}}"><i class="fa fa-eye"></i></button></span>&nbsp; -->
                <span><button type="button" data-toggle="modal" data-target="#modal-edit" 
                class="btn btn-outline-primary btn-sm btn-edit" value="{{$karyawan->id_karyawan}}"><i class="fa fa-edit"></i></button></span>&nbsp;
                <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-outline-danger btn-sm btn-delete" value="{{route('delete_karyawan', ['id_karyawan' => $karyawan->id_karyawan])}}"><i class="fa fa-trash-o"></i></button></span>
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
                        <strong id="model-change-status-questions">Hapus Karyawan ini?</strong>
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
                        <strong id="model-change-status-questions">Edit Data Karyawan</strong>
                    </p>
                
                <div class="clearfix"></div>
            </div>
            <form id="frmEdit" method="post" action="{{ route('updatekaryawan') }}">
                    {{csrf_field()}}
                    <div class="modal-body contact-form2">

                      <div class="form-group">
                          <span>Nama</span>
                          <input id="edit-id" name="id_karyawan" hidden/>
                          <input id="edit-nama" type="text" name="nama" class="form-control"  value="" required>
                          <span class="invalid-feedback">
                              <strong></strong>
                          </span>
                      </div>
                      <div class="form-group">
                          <span>Jabatan</span>
                          <select id="edit-jabatan" name="jabatan" class="form-control">
                              <option selected="selected" disabled="disabled">Pilih Jabatan</option>
                              <option value="admin">Admin</option>
                              <option value="operator_mesin_besi">Operator Mesin Besi</option>
                              <option value="operator_mesin_kayu">Operator Mesin kayu</option>
                              <option value="keuangan">Keuangan</option>
                            </select>
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
                          <span>Telepon</span>
                          <input id="edit-telepon" type="text" name="telepon" class="form-control"  value="" required>
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
            url: "{{route('getdetails_karyawan')}}",
            data: {
                'id_karyawan': id,
                _token: '{!! csrf_token() !!}'
            },
            success: function (data) {
                console.log(data);
                var data = data['result'];
                var id = data['id_karyawan'];
                var name = data['nama'];
                var jabatan = data['jabatan'];
                var alamat = data['alamat'];
                var telepon = data['telepon'];
                $("#edit-id").val(id);
                $("#edit-nama").val(name);
                $("#edit-jabatan").val(jabatan);
                $("#edit-alamat").val(alamat);
                $("#edit-telepon").val(telepon);
                // $("#modal-Update").modal("show");
            },
        });
    });
</script>

@endsection
