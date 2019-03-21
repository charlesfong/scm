<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('../asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../asset/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('../asset/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('../asset/images/favicon.png') }}" />
  <style type="text/css">
  .spinner {
  width: 40px;
  height: 40px;

  position: relative;
  margin: 100px auto;
  }

  .double-bounce1, .double-bounce2 {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-color: #333;
    opacity: 0.6;
    position: absolute;
    top: 0;
    left: 0;
    
    -webkit-animation: sk-bounce 2.0s infinite ease-in-out;
    animation: sk-bounce 2.0s infinite ease-in-out;
  }

  .double-bounce2 {
    -webkit-animation-delay: -1.0s;
    animation-delay: -1.0s;
  }

  @-webkit-keyframes sk-bounce {
    0%, 100% { -webkit-transform: scale(0.0) }
    50% { -webkit-transform: scale(1.0) }
  }

  @keyframes sk-bounce {
    0%, 100% { 
      transform: scale(0.0);
      -webkit-transform: scale(0.0);
    } 50% { 
      transform: scale(1.0);
      -webkit-transform: scale(1.0);
    }
  }
  </style>
</head>
<body>
  
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <!-- <a class="navbar-brand brand-logo" href="index.html"><img src="{{ asset('../asset/images/logo.svg') }}" alt="logo"/></a> -->
        <!-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('../asset/images/logo-mini.svg') }}" alt="logo"/></a> -->
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">Tes User</span>
                <span class="text-secondary text-small">Ini Rolenya</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showallorder')}}">
              <span class="menu-title">Order</span>
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showaddorder')}}">
              <span class="menu-title">Tambah Order</span>
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showallspk')}}">
              <span class="menu-title">SPK</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showaddspk')}}">
              <span class="menu-title">Tambah SPK</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showaddbarangjadi')}}">
              <span class="menu-title">Tambah Bahan Jadi</span>
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <span class="menu-title">Seluruh Bahan Jadi</span>
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('inputbb')}}">
              <span class="menu-title">Tambah Bahan Baku</span>
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('inputstokbb')}}">
              <span class="menu-title">Ubah Stok Bahan Baku</span>
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('supplier')}}">
              <span class="menu-title">Supplier</span>
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showallcustomer')}}">
              <span class="menu-title">Seluruh Customer</span>
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showaddcustomer')}}">
              <span class="menu-title">Tambah Customer</span>
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showallkaryawan')}}">
              <span class="menu-title">Seluruh Karyawan</span>
              <i class="mdi menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('showaddkaryawan')}}">
              <span class="menu-title">Tambah Karyawan</span>
              <i class="mdi menu-icon"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper" id="contents">
          <div class="spinner" id="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
          </div>
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('../asset/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('../asset/vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('../asset/js/off-canvas.js') }}"></script>
  <script src="{{ asset('../asset/js/misc.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('../asset/js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->
  <script language="javascript" type="text/javascript">
  document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
  document.getElementById('contents').style.visibility="hidden";
  } 
  else if (state == 'complete') {
        setTimeout(function(){
           document.getElementById('interactive');
           $('#spinner').remove();
           // document.getElementById('spinner').style.visibility="hidden";
           document.getElementById('contents').style.visibility="visible";
        },1000);
    }
  }
  </script>
  @yield('script')
</body>

</html>