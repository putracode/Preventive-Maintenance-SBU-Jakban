<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Preventive Maintenance</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/css/style.css">
  @yield('style')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  
  <style>
    *{
      font-family: 'Roboto', sans-serif;
      
    }
    @media print{@page {size: auto},}
  </style>
</head>
<body class="hold-transition sidebar-collapse  layout-top-nav">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    {{-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul> --}}
    <img src="/img/logo.png" alt="" width="100px">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          {{-- <span class="d-none d-md-inline mr-2" style="font-size: 14px">{{ Auth()->user()->name }}</span> --}}
          <img src="/img/avatar.jpg" class="user-image img-circle elevation-2" alt="User Image">
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="/img/avatar.jpg" class="img-circle elevation-2" alt="User Image">

            <p>
              {{-- Alexander Pierce - Web Developer --}}
              {{-- {{ auth()->user()->name }} --}}
              {{-- <small>Member since Nov. 2012</small> --}}
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            {{-- <a href="#" class="btn btn-default btn-flat">Profile</a> --}}
            {{-- <a href="#" class="btn btn-danger btn-flat float-right p-auto" style="font-size: 14px">Sign out</a> --}}
            <form action="/logout" method="post" class="form-class m-0">
              @csrf
              
              <button type="submit" class="btn btn-danger btn-flat float-right p-auto btn-sm px-3" style="font-size: 12px"><i class="bx bx-power-off me-2"></i><span class="align-middle">Logout</span></button>
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      {{-- <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8" > --}}
      <div class="bungkus d-flex justify-content-start align-items-center">        
        <span class="brand-image img-circle elevation-3">
          <ion-icon name="build-outline" style="opacity: .8"></ion-icon>
        </span>
        <span class="brand-text font-weight-light" style="font-size: 16px">Preventive Maintenance</span>
      </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ Request::is('/dashboard') ? 'active' : '' }}" >
                <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          {{-- <li class="nav-header">EXAMPLES</li> --}}
          <li class="nav-item">
            <a href="/jadwal" class="nav-link {{ Request::is('jadwal*') ? 'active' : '' }}">
                <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Jadwal
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/improvement" class="nav-link {{ Request::is('improvement*') ? 'active' : '' }}">
              <span class="d-flex align-items-center">
                <ion-icon name="cellular-outline" class="nav-icon mr-2"></ion-icon>
                <p>
                  Improvement
                </p>
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
              <span class="d-flex align-items-center">
                <ion-icon name="people-outline" class="nav-icon mr-2"></ion-icon>
                <p>
                  User
                </p>
              </span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h5>@yield('title')</h5>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @yield('content')
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
{{-- Sweet Alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="/adminlte/dist/js/demo.js"></script> --}}
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": true, 
      "autoWidth": false,
      "buttons": ["excel", "print", "colvis"],  
      "columnDefs": [
        { "visible": false, "targets": 'hidden' }
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    
    $('#submitButton').on('click', function (e) {
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        icon: "warning",
        title: "Are you sure?",
        text: "Apakah Anda yakin ingin menyimpan data ini?",
        buttons: true,
        dangerMode: true
    }).then((isConfirm) => {
        if (isConfirm) {
            form.submit();
            swal({
                icon: "success",
                title: 'successfully created!',
            });
            }
        });
    });
  });
  const buttonConfirmResource = document.querySelectorAll('.confirmdelete');
          for( let i = 0; i < buttonConfirmResource.length; i++){
            $(buttonConfirmResource[i]).on('click', function (e) {
                e.preventDefault();
                let data = $('#confirmbutton').attr('data-name')
                var form = $(this).parents('form');
                swal({
                    icon: "warning",
                    title: "Are you sure?",
                    text: "Apakah Anda yakin ingin menghapus data ini?",
                    buttons: true,
                    dangerMode: true
                }).then((isConfirm) => {
                    if (isConfirm) {
                        form.submit();
                        swal({
                            icon: "success",
                            title: data + ' successfully deleted!',
                        });
                    }
                });
            });
          }
</script>
@yield('script')
</body>
</html>
