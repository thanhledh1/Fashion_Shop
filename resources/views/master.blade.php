
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Spica Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png')}}" />
</head>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:partials/_sidebar.html -->
    @include('includes.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
     @include('includes.header')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
           @yield('content')

          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      @include('includes.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('admin/js/jquery.cookie.js')}}" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('admin/js/off-canvas.js')}}"></script>
  <script src="{{ asset('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('admin/js/template.js')}}"></script>
  <!-- endinject -->
  <!-- End custom js for this page-->
</body>

</html>
