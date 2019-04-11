@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title" style="position:fixed;">
  List SPK
</h3>
</div>
<div class="row" style="position:fixed;">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th style="text-align: center;">SPK Id</th>
              <th style="text-align: center;">Order Detail Id</th>
              <th style="text-align: center;">Tanggal Pembuatan SPK</th>
              <th style="text-align: center;">Lama Kerja</th>
              <th style="text-align: center;">Sisa Waktu Kerja</th>
              <th style="text-align: center;">Biaya</th>
              <th style="text-align: center;">Lokasi Tempat Customer</th>
              <th style="text-align: center;">Deskripsi</th>
              <th style="text-align: center;">BOM</th>
              <th style="text-align: center;">View Progress</th>
            </tr>
          </thead>
          <tbody>
            @foreach($spks as $spk)
            <tr>
              <td style="text-align: center;">{{ $spk->id_spk}}</td>
              <td style="text-align: center;">{{ $spk->order_detail_id}}</td>
              <td style="text-align: center;">{{date('d F, Y', strtotime($spk->tanggal))}}</td>
              <td style="text-align: center;">{{ $spk->lama_kerja}} Hari</td>
              <td style="text-align: center;">
              @if ((date('d', strtotime($spk->tanggal))+$spk->lama_kerja-date('d'))>=0)
              {{ date('d', strtotime($spk->tanggal))+$spk->lama_kerja-date('d') }} Hari
              @else
              <label class="badge badge-danger">Waktu Habis</label>
              @endif
              </td>
              <td style="text-align: center;">{{ $spk->biaya}}</td>
              <td style="text-align: center;">{{ $spk->lokasi_tempat_customer}}</td>
              <td style="text-align: center;">{{ $spk->deskripsi}}</td>
              <td style="text-align: center;">
                  <button type="button" class="btn btn-warning btn-sm btn-bom" id="btn-bom" value="{{$spk->id_spk}}"><i class="fa fa-eye"></i></button>
              </td>
              <td style="text-align: center;">
                  <button type="button" class="btn btn-secondary btn-sm btn-view" value="{{$spk->id_spk}}" data-toggle="modal" data-target="#modal-view"><i class="fa fa-eye"></i></button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-bom" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" style="top: 30vh;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p style="text-align: center; color: black;">
                    <strong id="model-change-status-questions">BOM Detail</strong>
                </p>
                <div class="clearfix"></div>
            </div>
            <form id="frmEdit" method="post" action="#">
                    {{csrf_field()}}
                    <div class="modal-body" >
                      <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <!-- <h4 class="card-title">Nama Barang : <strong id="nama_barang"></strong></h4> -->
                            <!-- <p class="card-description">
                              Add class <code>.table-striped</code>
                            </p> -->
                            <table class="table table-striped">
                              <thead>
                                <tr><th>No</th><th>Bahan Baku</th><th>Bagian</th><th>Ukuran Mentah</th><th>Ukuran Jadi</th><th>Ukuran Luasan</th><th>Jumlah Bagian</th><th>Jumlah Satuan Bahan</th><th>Harga Satuan</th></tr>
                              </thead>
                              <tbody id="loop">

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div> 
                    </div>
                    <div class="modal-footer" style="margin-top: 40px;">
                        <!-- <button class="btn btn-light" type="button" data-dismiss="modal">Close</button> -->
                        <!-- <button class="btn btn-primary" type="submit" id="btn-confirmUpdate" value="-">SAVE</button> -->
                    </div>
                </form>
            <div class="modal-footer">
                
                
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
@endsection
@section('script')

<script type="text/javascript">
    $(".btn-delete").click(function(e) {
        $("#frmDelete").attr("action",  $(this).val());
    });
    $(".btn-view").click(function(e) {
        var val=$(this).val();
        window.location.href = "{{ route('showprogress') }}" + "?id_spk=" + val;
    });
    $(".btn-bom").click(function (e) {
        var id = $(this).val();
        $("#loop").html("");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: "{{route('getdetailbom')}}",
            data: {
                'id': id,
                _token: '{!! csrf_token() !!}'
            },
            success: function (data) {
                var datas = data['result'];
                var bb    = data['bb'];
                var nama_b    ="";
                var harga_b   ="";
                for(var i = 0; i < datas.length; i++){
                    for(var x = 0; x < bb.length; x++){
                        if (bb[x]["id_bahan_baku"]==datas[i]["bahan_baku_id_bahan_baku"])
                        {
                          nama_b=bb[x]["nama"];
                          harga_b=bb[x]["harga"];
                        }
                    }
                    $("#loop").append('<tr><td>'+(i+1)+'</td><td>'+nama_b+'</td><td>'+datas[i]["bagian"]+'</td><td>'+datas[i]["ukuran_mentah"]+'</td><td>'+datas[i]["ukuran_jadi"]+'</td><td>'+datas[i]["ukuran_luasan"]+'</td><td>'+datas[i]["jumlah_bagian"]+'</td><td>'+datas[i]["jumlah_satuan_bahan"]+'</td><td>'+harga_b+'</td></tr>');
                }
                $("#modal-bom").modal("show");
            },
        });
    });
</script>

@endsection