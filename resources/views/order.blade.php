@extends('layout.layout')
@section('content')
<div class="page-header">
<h3 class="page-title" style="position:fixed;">
  List Order
</h3>
</div>
<div class="row" style="position:fixed;">
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
            <th>View Order Detail</th>
            <th>View SPK</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
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
            <td>{{ $order->tanggal}}</td>
            <td style="text-align: center;"><button type="button" class="btn btn-secondary btn-sm btn-view" value="{{$order->tanggal}}" data-toggle="modal" data-target="#modal-view"><i class="fa fa-eye"></i></button></td>
            <td style="text-align: center;"><button type="button" class="btn btn-danger btn-sm btn-view" value="{{$order->tanggal}}" data-toggle="modal" data-target="#modal-view"><i class="fa fa-eye"></i></button></td>
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
    $(".btn-view").click(function (e) {
        var tanggal = $(this).val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: "{{route('getdetails_order')}}",
            data: {
                'tanggal': tanggal,
                _token: '{!! csrf_token() !!}'
            },
            success: function (data) {
                var data = data['result'];
                  $('#list_barang').empty();
                  $('#list_barang').html('<th style="vertical-align: middle;">Kode Barang</th><th style="vertical-align: middle;">Nama Barang</th><th style="vertical-align: middle;">Unit Pemesanan</th><th style="vertical-align: middle;">Jumlah</th><th style="vertical-align: middle;">Satuan</th><th style="vertical-align: middle;">Harga Satuan</th><th style="vertical-align: middle;">Keterangan</th>');
                for (var i = 0; i < data.length; i++) {
                  $('#list_barang').append('<tr><td><input class="form-control" value="'+data[i]['kode_barang']+'" type="text" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['nama_barang']+'" type="text" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['unit_pemesanan']+'" type="text" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['jumlah']+'" type="text" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['satuan']+'" type="text" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['harga_satuan']+'" type="text" disabled="disabled"></td><td><input class="form-control" value="'+data[i]['keterangan']+'" type="text" disabled="disabled"></td></tr>');
                }
                // $("#modal-view").modal("show");
            },
        });
    });
</script>

@endsection