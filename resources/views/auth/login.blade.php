<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "100000",
        "hideDuration": "100000",
        "timeOut": "100000",
        "extendedTimeOut": "100000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    </script>
  <style>
    *{
      font-family: 'Jost', sans-serif;
    }
  </style>
</head>
<body class="hold-transition login-page" style="background-image: url('/img/login.jpg'); background-size: cover; background-position: center">
  @if (session()->has('loginError'))
    <script>
        toastr.error("{!! Session::get('loginError') !!}")
    </script>
  @endif
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-info">
    <div class="card-header text-center">
      {{-- <a href="/adminlte/index2.html" class="h1"><b>Admin</b>LTE</a> --}}
      <img src="/img/logo.png" alt="" width="100px">
    </div>
    <div class="card-body">
      {{-- <p class="login-box-msg">Please sign in to continue</p> --}}

      <form action="/" method="post">
        @csrf
        <div class="input-group mb-4">
          <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" autofocus name="username"  value="{{ old('username') }}" autocomplete="off" id="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <ion-icon name="person"></ion-icon>
            </div>
          </div>
          @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="input-group mb-4">
          <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" autofocus name="password" value="{{ old('password') }}" autocomplete="off" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-info btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->

<script src="https://unpkg.com/ionicons@latest/dist/ionicons.js"></script>

<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
