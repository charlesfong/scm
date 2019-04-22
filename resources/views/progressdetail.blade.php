@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title">
  Daftar Detail Progress Dari Progress Produksi Dengan No Dokumen : 
  @if (isset($pros_d))
  {{$pros->no_dokumen}}
  @else
  {{$pros}}
  @endif
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
            <th>Karyawan</th>
            <th>Mesin</th>
            <th style="text-align: center;">Tanggal Rencana</th>
            <th style="text-align: center;">Tanggal Progress</th>
            <th>Hasil</th>
            <th style="text-align: center;">Status</th>
            <th>Keterangan</th>
            <th style="text-align: center;">Confirm/Delete</th>
          </tr>
        </thead>
        <tbody>
          @if (isset($pros_d))
          @foreach($pros_d as $key=>$pro)
          <tr>
            <td style="text-align: center;">{{ $key+1 }}</td>
            <td>
            @foreach($Karyawans as $kary)
              @if($kary->id_karyawan==$pro->id_karyawan)
                {{$kary->nama}}
              @endif
            @endforeach
            </td>
            <td>
            @foreach($mesins as $mesin)
              @if($mesin->id_mesin==$pro->id_mesin)
                {{$mesin->nama}}
              @endif
            @endforeach
            </td>
            <td style="text-align: center;">{{ $pro->tanggal_rencana}}</td>
            <td style="text-align: center;">{{ $pro->tanggal_progress}}</td>
            <td>{{ $pro->hasil}}</td>
            <td style="text-align: center;">

            @if ($pro->status=="1")
            <label class="badge badge-secondary" style="display:inline-block; width:100px">
            @foreach ($order_status as $stat)
                @if ($stat->id==$pro->status)
                    {{$stat->name}}
                @endif
            @endforeach
            </label>
            @elseif ($pro->status=="2")
            <label class="badge badge-warning" style="display:inline-block; width:100px">
            @foreach ($order_status as $stat)
                @if ($stat->id==$pro->status)
                    {{$stat->name}}
                @endif
            @endforeach
            </label>
            @elseif ($pro->status=="4")
            <label class="badge badge-success" style="display:inline-block; width:100px">
            @foreach ($order_status as $stat)
                @if ($stat->id==$pro->status)
                    {{$stat->name}}
                @endif
            @endforeach    
            </label>
            @endif
            </td>
            <td style="text-align: center;">{{ $pro->keterangan}}</td>
            <td style="text-align: center;">
                @if ($pro->status=="2")
                <button type="button" data-toggle="modal" data-target="#modal-confirm" 
                class="btn btn-primary btn-sm btn-confirm" value="{{route('confirmprogressdetail', ['id' => $pro->id])}}"><i class="fa fa-check"></i></button>
                @else
                <button type="button" disabled="disabled" 
                class="btn btn-primary btn-sm btn-confirm"><i class="fa fa-check"></i></button>
                @endif
                </span>&nbsp;
                @if ($pro->status!="4")
                <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-sm btn-delete" value="{{route('deleteprogressdetail', ['id' => $pro->id])}}"><i class="fa fa-trash-o"></i></button>
                @else
                <button type="button" class="btn btn-danger btn-sm btn-delete" disabled="disabled"><i class="fa fa-trash-o"></i></button>
                @endif
              </span>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
    @if (isset($pros_d))
    <button type="button" id="btn-create"class="btn btn-success btn-lg" value="{{$pros->no_dokumen}}" style="float:right;">Tambah Detail Progress</button>
    @else
    <button type="button" id="btn-create"class="btn btn-success btn-lg" value="{{$pros}}" style="float:right;">Tambah Detail Progress</button>
    @endif
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
                        <strong id="model-change-status-questions">Hapus Detail Progress ini?</strong>
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

<div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="top: 30vh;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                    <p style="text-align: center; color: black;">
                        <strong id="model-change-status-questions">Ubah status detail progress ke selesai?</strong>
                    </p>
                
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <form id="frmConfirm" method="post" action="">
                    {{csrf_field()}}
                    <button id="btn-submit-delete-member" type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </form>
                
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>

<div class="modal fade" id="modal-create" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="top: 30vh;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                    <p style="text-align: center; color: black;">
                        <strong id="model-change-status-questions">Tambah Detail Progress</strong>
                    </p>
                
                <div class="clearfix"></div>
            </div>
            <div class="modal-body">
                <form id="frmCreate" method="post" action="{{ route('storeprogressdetail') }}">
                    {{csrf_field()}}
                    <input type="hidden" name="no_dokumen" id="cr_no_dk">
                    <select name="id_mesin" class="form-control">
                    <option disabled="disabled" selected="selected">Pilih Mesin</option>
                      @foreach ($mesins as $mesin)
                        <option value="{{$mesin->id_mesin}}">
                          {{$mesin->nama}}
                        </option>
                      @endforeach
                    </select>
                    <select name="id_karyawan" class="form-control">
                      <option disabled="disabled" selected="selected">Pilih Karyawan</option>
                      @foreach ($Karyawans as $karyawan)
                        <option value="{{$karyawan->id_karyawan}}">
                          {{$karyawan->nama}}
                        </option>
                      @endforeach
                    </select>
                    <input placeholder="Tanggal Rencana" name="tgl_rencana" class="form-control" required="true" value="" type="text" onfocus="(this.type='date')">
                    <input placeholder="Tanggal Progress" name="tgl_progress" class="form-control" required="true" value="" type="text" onfocus="(this.type='date')">
                    <input name="hasil" class="form-control" value="" type="text" placeholder="Hasil">
                    <input name="keterangan" class="form-control" value="" type="text" placeholder="Keterangan">
                    <button id="btn-submit-delete-member" type="submit" class="btn btn-primary col-md-12">Save</button>
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button> -->
                </form>
                
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
    $(".btn-confirm").click(function(e) {
        $("#frmConfirm").attr("action",  $(this).val());
    });
    $("#btn-create").click(function(e){
        $("#cr_no_dk").val($(this).val());
        console.log($("#cr_no_dk").val());
        $("#modal-create").modal("show");
    });
    // $(".btn-edit").click(function (e) {
    //     var id = $(this).val();
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: 'post',
    //         url: "{{route('detailprogress')}}",
    //         data: {
    //             'id': id,
    //             _token: '{!! csrf_token() !!}'
    //         },
    //         success: function (data) {
    //             var data = data['result'];
    //             var id = data['no_dokumen'];
    //             var no_revisi = data['no_revisi'];
    //             var id_spk = data['id_spk'];
    //             console.log(data);
    //             $("#edit-id").val(id);
    //             $("#edit-revisi").val(no_revisi);
    //             $("#edit-spk").val(id_spk);
    //         },
    //     });
    // });
</script>

@endsection
