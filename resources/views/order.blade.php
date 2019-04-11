@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title" >
  List Order
</h3>
</div>
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Order Id</th>
            <th>Customer</th>
            <th>Karyawan</th>
            <th>Tanggal</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">View Order Detail</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $key => $order)
          <tr>
            <td>{{ $order->id_order}}</td>
            <td>
            @foreach($customers as $customer)
              @if ($customer->id_customer==$order->customer_id_customer)
                {{$customer->nama}}
              @endif
            @endforeach
            </td>
            <td>
            @foreach($karyawans as $karyawan)
              @if ($karyawan->id_karyawan==$order->karyawan_id_karyawan)
                {{$karyawan->nama}}
              @endif
            @endforeach
            </td>
            <td>{{ $order->created_at}}</td>
            <td style="text-align: center;">
                @if ($order->status=="In progress")
                <label class="badge badge-warning">In progress</label>
                @endif
            </td>
            <td style="text-align: center;"><button type="button" class="btn btn-secondary btn-sm btn-view" value="{{$order->id_order}}" data-toggle="modal" data-target="#modal-view"><i class="fa fa-eye"></i></button></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

<div class="modal fade" id="modal-view" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content" style="top: 30vh;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                    <p style="text-align: center; color: black;">
                        <strong id="model-change-status-questions">Order Detail</strong>
                    </p>
                    
                    <div id="list_barang">

                    </div>    
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
@section('script')

<script type="text/javascript">
    var detail_order_id="<?php echo (isset($_GET["detail_order_id"]) ? "detail_order_id=".$_GET["detail_order_id"] : "") ?>";
    $(document).on('click', '.button-spk', function(){
        var id = $(this).val();
        detail_order_id = $(this).val();
        console.log(detail_order_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: "{{route('checkSPK')}}",
            data: {
                'id': id,
                _token: '{!! csrf_token() !!}'
            },
            success: function (data) {
                var data = data['result'];
                if (data)
                {
                  window.location.href = "{{ route('showallspk') }}" + mergeUrlParam();
                }
                else
                {
                  window.location.href = "{{ route('showaddspk') }}" + mergeUrlParam();
                }
            },
        });

    });

    $(".btn-view").click(function (e) {
        var id = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: "{{route('getdetails_order')}}",
            data: {
                'id_order': id,
                _token: '{!! csrf_token() !!}'
            },
            success: function (data) {
                var data = data['result'];
                  $('#list_barang').empty();
                  $('#list_barang').html('<th style="vertical-align: middle;">Kode Barang</th><th style="vertical-align: middle;">Nama Barang</th><th style="vertical-align: middle;">Jumlah</th><th style="vertical-align: middle;">Satuan</th><th style="vertical-align: middle;">Harga Satuan</th><th style="vertical-align: middle;">Biaya Transport</th><th style="vertical-align: middle;">Subtotal</th><th style="vertical-align: middle;">Tanggal</th><th style="vertical-align: middle;">Keterangan</th><th style="text-align: center;">View SPK</th>');
                for (var i = 0; i < data.length; i++) {
                  $('#list_barang').append('<tr><td><input class="form-control" value="'+data[i]['kode_barang']+'" type="text" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['nama_barang']+'" type="text" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['jumlah']+'" type="text" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['satuan']+'" type="text" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['harga_satuan']+'" type="text" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['biaya_transport']+'" type="text" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['subtotal']+'" type="text" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['tanggal']+'" type="date" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['keterangan']+'" type="text" disabled="disabled"></td><td style="text-align: center;"><button type="button" class="btn btn-secondary btn-sm btn-view button-spk" value="'+data[i]['id']+'"><i class="fa fa-eye button-spk"></i></button></td></tr>');
                }
                // $("#modal-view").modal("show");
            },
        });
    });

    function mergeUrlParam(){
        
        var urlParamArray = new Array();
        var urlParamStr = "";
        if (detail_order_id!=="") {
            urlParamArray.push(detail_order_id);
        }
        for (var i = 0; i < urlParamArray.length; i++) {
            if (i === 0) {
                urlParamStr += "?detail_order_id=" + urlParamArray[i]
            } else {
                urlParamStr += "&" + urlParamArray[i]
            }
        }
        return urlParamStr;
    }
</script>

@endsection