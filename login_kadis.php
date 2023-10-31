<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DKP3 Surat App | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="dist/img/logodkp3.png">


</head>

<body class="hold-transition login-page" style="background-color: #112B3C;">
  <div class="login-box">
    <div class="login-logo">
      <a href="index.php"><b></b></a>
    </div>

    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <!-- <center><img width="170px" src="dist/img/Logo.png"></center> -->
        <?php
        if (isset($_GET['pesan'])) {
          if ($_GET['pesan'] == 'berhasil') {
            echo '<div class="alert alert-success alert-dismissible">
          Akun berhasil dibuat
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          </div>';
          }
        }
        ?>
        <center>
          <p class="login-box-msg mt-2">Sistem Inventarisir Surat Masuk dan Keluar Dinas Ketahanan Pangan, Perikanan, dan Pertanian Banjarmasin</p>
          <img src="dist/img/logodkp3.png" alt="dkp3" width="90" class="mb-3">
        </center>
        <form action="proses_login_kadis.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="#">
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p> Login sebagai admin? <a href="login.php">Admin</a></p>
        <p> Login sebagai pegawai? <a href="login_pegawai.php">Pegawai</a></p>

      </div>



      <!-- jQuery -->
      <script src="plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- AdminLTE App -->
      <script src=".dist/js/adminlte.min.js"></script>
</body>

</html>