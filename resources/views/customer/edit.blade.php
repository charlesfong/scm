@extends('layout.layout')
@section('content')
<div class="page-header">
            <h3 class="page-title">
              Edit Customer
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
                  <h4 class="card-title">Data Customer</h4>
                  <p class="card-description">
                    Teaching Industry Ubaya
                  </p>
                  <form class="forms-sample" method="post" action="{{url('/customer/'.$customer->id)}}">
                  	<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="nama" value="{{$customer->nama}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="alamat" value="{{$customer->alamat}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Unit</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="unit" value="{{$customer->unit}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Nomor Telepon</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="no_telp" value="{{$customer->no_telp}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="email" value="{{$customer->email}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" name="password" value="{{$customer->password}}">
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
    @endsection