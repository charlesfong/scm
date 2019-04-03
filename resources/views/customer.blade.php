@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title" style="position:fixed;">
  List Pelanggan
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
            <th>Unit</th>
            <th>No Telp</th>
            <th>Email</th>
            <th>Edit/Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($customers as $cust)
          <tr>
            <td>{{ $cust->nama}}</td>
            <td>{{ $cust->alamat}}</td>
            <td>{{ $cust->unit}}</td>
            <td>{{ $cust->no_telp}}</td>
            <td>{{ $cust->email}}</td>
            <td style="text-align: center;">
                <span><button type="button" data-toggle="modal" data-target="#modal-edit" 
                class="btn btn-primary btn-sm btn-edit" value="{{$cust->id_customer}}"><i class="fa fa-edit"></i></button></span>&nbsp;
                <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-sm btn-delete" value="{{route('delete_customer', ['id_customer' => $cust->id_customer])}}"><i class="fa fa-trash-o"></i></button></span>
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
                        <strong id="model-change-status-questions">Hapus Customer ini?</strong>
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
                        <strong id="model-change-status-questions">Edit Data Customer</strong>
                    </p>
                
                <div class="clearfix"></div>
            </div>
            <form id="frmEdit" method="post" action="{{ route('updatecustomer') }}">
                    {{csrf_field()}}
                    <div class="modal-body contact-form2">

                      <div class="form-group">
                          <span>Nama</span>
                          <input id="edit-id" name="id_customer" hidden/>
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
                          <span>Unit</span>
                          <input id="edit-unit" type="text" name="unit" class="form-control"  value="">
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
                      <div class="form-group">
                          <span>Email</span>
                          <input id="edit-email" type="email" name="email" class="form-control"  value="">
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
            url: "{{route('getdetails_customer')}}",
            data: {
                'id_customer': id,
                _token: '{!! csrf_token() !!}'
            },
            success: function (data) {
                console.log(data);
                var data = data['result'];
                var nama = data['nama'];
                var alamat = data['alamat'];
                var unit = data['unit'];
                var no_telp = data['no_telp'];
                var email = data['email'];
                $("#edit-id").val(id);
                $("#edit-nama").val(nama);
                $("#edit-alamat").val(alamat);
                $("#edit-unit").val(unit);
                $("#edit-telp").val(no_telp);
                $("#edit-email").val(email);
            },
        });
    });


</script>

@endsection