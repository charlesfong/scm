@extends('layout.layout')
@section('content')
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>                 
              </span>
              Dashboard
            </h3>
            <!-- <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <span></span>Teaching Industry Ubaya
                </li>
              </ul>
            </nav> -->
          </div>
          <div class="row">
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  
                  <h4 class="font-weight-normal mb-3">Orderan Terdekat
                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">{{$orderan_terdekat->created_at}}</h2>
                  @foreach ($order_d as $val)
                  <h6 class="card-text">{{$val->nama_barang}}</h6>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="col-md-6 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                                    
                  <h4 class="font-weight-normal mb-3">Bahan Baku Hampir Habis
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">{{$bb->nama}}</h2>
                  <h6 class="card-text">Sisa Stok : {{$bb->stok}} pcs </h6>
                  <h6 class="card-text">Supplier : 
                    @foreach ($supps as $supp) 
                      @if($supp->id_supplier==$bb->supplier_id_supplier)
                        {{$supp->nama}}
                      @endif 
                    @endforeach
                  </h6>
                  
                </div>
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Status Order</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Nama Customer
                          </th>
                          <th>
                            Tanggal Order
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($orders as $key => $val)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>
                            @foreach($custs as $cust)
                              @if ($cust->id_customer==$val->customer_id_customer)
                                {{$cust->nama}}
                              @endif
                            @endforeach
                          </td>
                          <td>{{$val->created_at}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
     @endsection


       
