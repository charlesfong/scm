<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="{{url('/')}}" class="nav-link">
        <div class="nav-profile-text d-flex flex-column">
          <!-- <span class="font-weight-bold mb-2">Tes User</span> -->
          <!-- <span class="text-secondary text-small">Ini Rolenya</span> -->
        </div>
        <!-- <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> -->
      </a>
    </li>
    
    <div style="position:fixed;">
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic7" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Order</span>
        <i class="menu-arrow"></i>
        <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
      </a>
      <div class="collapse" id="ui-basic7">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('showallorder')}}">
              <!-- <span class="menu-title"> -->
              List Order
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showaddorder')}}">
              <!-- <span class="menu-title"> -->
                Tambah Order
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic6" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">SPK</span>
        <i class="menu-arrow"></i>
        <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
      </a>
      <div class="collapse" id="ui-basic6">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('showallspk')}}">
              <!-- <span class="menu-title"> -->
              List SPK
              <!-- </span> -->
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showaddspk')}}">
              <!-- <span class="menu-title"> -->
              Tambah SPK
              <!-- </span> -->
            </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basica" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Progress Produksi</span>
        <i class="menu-arrow"></i>
        <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
      </a>
      <div class="collapse" id="ui-basica">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('showprogress')}}">
              <!-- <span class="menu-title"> -->
              Seluruh Progress
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showinputprogress')}}">
              <!-- <span class="menu-title"> -->
              Tambah Progress
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="{{route('showinputprogressdetail')}}"> -->
              <!-- <span class="menu-title"> -->
              <!-- Tambah Detail Progress -->
              <!-- </span> -->
              <!-- <i class="mdi menu-icon"></i> -->
            <!-- </a> -->
          <!-- </li> -->
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic5" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Produk</span>
        <i class="menu-arrow"></i>
        <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
      </a>
      <div class="collapse" id="ui-basic5">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('showaddbarangjadi')}}">
              <!-- <span class="menu-title"> -->
              Tambah Barang Jadi
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <!-- <span class="menu-title"> -->
              Seluruh Barang Jadi
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('inputbb')}}">
              <!-- <span class="menu-title"> -->
              Tambah Bahan Baku
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('inputstokbb')}}">
              <!-- <span class="menu-title"> -->
              Seluruh Bahan Baku
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showinputpermintaanbahanbaku')}}">
              <!-- <span class="menu-title"> -->
              Permintaan Bahan Baku
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showinputpenggunaanbahanbaku')}}">
              <!-- <span class="menu-title"> -->
              Penggunaan Bahan Baku
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showinputnotabeli')}}">
              <!-- <span class="menu-title"> -->
              Nota Beli
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Supplier</span>
        <i class="menu-arrow"></i>
        <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
      </a>
      <div class="collapse" id="ui-basic4">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('showallsupplier')}}">
              <!-- <span class="menu-title"> -->
              Seluruh Supplier
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showaddsupplier')}}">
              <!-- <span class="menu-title"> -->
              Tambah Supplier
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Customer</span>
        <i class="menu-arrow"></i>
        <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
      </a>
      <div class="collapse" id="ui-basic3">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('showallcustomer')}}">
              <!-- <span class="menu-title"> -->
              Seluruh Customer
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showaddcustomer')}}">
              <!-- <span class="menu-title"> -->
              Tambah Customer
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Karyawan</span>
        <i class="menu-arrow"></i>
        <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
      </a>
      <div class="collapse" id="ui-basic2">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('showallkaryawan')}}">
              <!-- <span class="menu-title"> -->
              Seluruh Karyawan
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showaddkaryawan')}}">
              <!-- <span class="menu-title"> -->
              Tambah Karyawan
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Mesin</span>
        <i class="menu-arrow"></i>
        <!-- <i class="mdi mdi-crosshairs-gps menu-icon"></i> -->
      </a>
      <div class="collapse" id="ui-basic1">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('showallmesin')}}">
              <!-- <span class="menu-title"> -->
              Seluruh Mesin
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showaddmesin')}}">
              <!-- <span class="menu-title"> -->
              Tambah Mesin
              <!-- </span> -->
              <i class="mdi menu-icon"></i>
            </a>
          </li>
        </ul>
      </div>
    </li>
    </div>
  </ul>
</nav>