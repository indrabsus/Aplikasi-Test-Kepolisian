<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="{{asset('image/polri.png')}}">
  <title>Aplikasi E-Polri</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminv/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="adminv/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminv/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<!-- /.login-box -->
<div class="container">
  <div class="row mt-5 mb-5">
  <div class="col-md-3 align-self-center">
      <div class="card">
          <div class="card-header">
            <img src="{{ asset('image/polri.png')}}" width="40px" class="rounded mx-auto d-block mt-2"> <p class="text-center"><strong>Login E-Polri</strong></p>
          </div>
          <form action="{{url('proses_login')}}" method="POST" id="logForm">
              {{ csrf_field() }}
          <div class="card-body">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username">
          </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
        </div>
            <button type="submit" class="btn btn-primary btn-sm">Login</button>
          </div>
          </form>
        </div>
  </div>
  <div class="col-md-9">
      <img src="{{asset('image/bg_polri.jpg')}}" class="img-thumbnail shadow p-3 mb-5 bg-white rounded">
  </div>
  </div>
</div>

<!-- jQuery -->
<script src="adminv/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminv/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminv/dist/js/adminlte.min.js"></script>
</body>
</html>
