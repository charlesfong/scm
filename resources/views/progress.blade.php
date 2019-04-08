@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title">
  Daftar Progress Produksi
</h3>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>No Dokumen</th>
            <th>Tanggal Pembuatan</th>
            <th>No Revisi</th>
            <th>Id SPK</th>
            <th style="text-align: center;">View/Edit/Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pros as $key=>$pro)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $pro->no_dokumen}}</td>
            <td>{{ $pro->tgl_buat}}</td>
            <td>{{ $pro->no_revisi}}</td>
            <td>{{ $pro->id_spk}}</td>
            <td style="text-align: center;">
                <span><button type="button" class="btn btn-secondary btn-sm btn-edit" value=""><i class="fa fa-eye"></i></button></span>&nbsp;
                <span>
                <button type="button" data-toggle="modal" data-target="#modal-edit" 
                class="btn btn-primary btn-sm btn-edit" value="{{$pro->no_dokumen}}"><i class="fa fa-edit"></i></button></span>&nbsp;
                <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-sm btn-delete" value=""><i class="fa fa-trash-o"></i></button></span>
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
                        <strong id="model-change-status-questions">Hapus Progress ini?</strong>
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
                        <strong id="model-change-status-questions">Edit Progress Produksi</strong>
                    </p>
                
                <div class="clearfix"></div>
            </div>
            <form id="frmEdit" method="post" action="{{ route('updateprogress') }}">
                    {{csrf_field()}}
                    <div class="modal-body contact-form2">

                      <div class="form-group">
                          <span>No Dokumen</span>
                          <input id="edit-id" type="text" name="no_dokumen" class="form-control"  value="" required>
                          <span class="invalid-feedback">
                              <strong></strong>
                          </span>
                      </div>
                      <div class="form-group">
                          <span>No Revisi</span>
                          <input id="edit-revisi" type="text" name="no_revisi" class="form-control"  value="" required>
                          <span class="invalid-feedback">
                              <strong></strong>
                          </span>
                      </div>
                      <div class="form-group">
                          <span>ID SPK</span>
                          <select name="edit_spk" id="edit_spk" class="form-control">
                             <option disabled="disabled" selected="selected">Pilih SPK</option>
                             @foreach ($spks as $spk)
                                <option value="{{$spk->id_spk}}">
                                @foreach ($order_d as $od)
                                  @if($od->id==$spk->order_detail_id)
                                    Kode Barang:{{$od->kode_barang}}, Nama Barang:{{$od->nama_barang}}, Id SPK: {{$spk->id_spk}}
                                  @endif
                                @endforeach
                                </option>
                              @endforeach
                           </select>
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
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: "{{route('detailprogress')}}",
            data: {
                'id': id,
                _token: '{!! csrf_token() !!}'
            },
            success: function (data) {
                var data = data['result'];
                var id = data['no_dokumen'];
                var no_revisi = data['no_revisi'];
                var id_spk = data['id_spk'];
                $("#edit-id").val(id);
                $("#edit-revisi").val(no_revisi);
                $("#edit-spk").val(id_spk);
            },
        });
    });
</script>

@endsection
