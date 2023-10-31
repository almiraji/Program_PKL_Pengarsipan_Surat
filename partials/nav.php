<!-- Navbar -->

<nav class="main-header navbar navbar-expand navbar-light" style="background-color: #112B3C;">

  <!-- warna nav bar -->
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->

  <ul class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block"></div>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small ">
          <strong><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i></strong> <span style="text-transform: capitalize;">Selamat Datang, <?php echo $_SESSION['level']; ?>
          </span>
          <img class="img-profile rounded-circle" />
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda mau keluar dari sesi ini?');">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>
  </ul>
</nav>



<!--  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-th-large"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">Profil Dinas</span>
          <a href="profil.php" class="dropdown-item">
          <i class="fas fa-home"></i> Profil
          </a>
        </div>
      </li>-->
</ul>
</nav>
<!-- /.navbar -->