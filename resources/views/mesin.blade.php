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
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach($mesins as $msn)
          <tr>
            <td>{{ $msn->id_mesin }}</td>
            <td>{{ $msn->nama }}</td>
            <td style="text-align: center;">
                <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-sm btn-delete" value="{{route('delete_mesin', ['id_mesin' => $msn->id_mesin])}}"><i class="fa fa-trash-o"></i></button></span>
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

@section('script')

<script type="text/javascript">
    $(".btn-delete").click(function(e) {
        $("#frmDelete").attr("action",  $(this).val());
    });
</script>

@endsection