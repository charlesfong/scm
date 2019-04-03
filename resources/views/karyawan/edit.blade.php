@extends('layout.layout')
@section('content')
<div class="page-header">
            <h3 class="page-title">
              Edit Karyawan
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Basic elements</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Karyawan</h4>
                  <p class="card-description">
                    Teaching Industry Ubaya
                  </p>
                  <form class="forms-sample" method="post" action="{{url('/karyawan/'.$karyawan->id)}}">
                  	<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="nama" value="{{$karyawan->nama}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="alamat" value="{{$karyawan->alamat}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Jabatan</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="jabatan" value="{{$karyawan->jabatan}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Telepon</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="telepon" value="{{$karyawan->telepon}}">
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        
        
    @endsection