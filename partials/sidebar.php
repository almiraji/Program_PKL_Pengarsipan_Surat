<!-- Main Sidebar Container -->
<aside class="main-sidebar">
  <!-- Brand Logo -->
  <a href="?page=home" class="brand-link ">
    <img src="dist/img/logodkp3.png" alt="Logo" class="brand-image img-circle elevation-4">
    <span class="brand-text font-weight-bold text-white"> &nbsp;&nbsp; DKP3 SURAT </span>
  </a>


  <!-- Sidebar -->
  <div class="sidebar" style="background-color: #112B3C;">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel ">

    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column accordion" id="accordionSidebar">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <i class=""></i>
          </span>
          <p></p>
          </a>
        </li>

        <li class="nav-item">
          <a href="?page=home" class="nav-link text-light">
            <!-- <span style="color: Dodgerblue;"> -->
            <i class="nav-icon fas fa-home"></i>
            </span>
            <p>
              Beranda
            </p>
          </a>
        </li>

        <?php if ($_SESSION['level'] == 'Admin') : ?>
          <li class="nav-item">
            <a href="?page=penggunaread" class="nav-link text-light">
              <!-- <span style="color: Dodgerblue;"> -->
              <i class="nav-icon fas fa-users"></i>
              </span>
              <p>
                Mengelola Akun
              </p>
            </a>
          </li>
       
          <li class="nav-item">
            <a href="?page=bidangread" class="nav-link text-light">
              <!-- <span style="color: Dodgerblue;"> -->
              <i class="nav-icon fas fa-user-tie"></i>
              </span>
              <p>
                Bidang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=perihalread" class="nav-link text-light">
              <!-- <span style="color: Dodgerblue;"> -->
              <i class="nav-icon fas fa-exclamation-circle"></i>
              </span>
              <p>
                Perihal
              </p>
            </a>
          </li>
        <?php endif; ?>

        <?php if ($_SESSION['level'] == 'Admin' or $_SESSION['level'] == 'Pegawai') : ?>
        <li class="nav-item">
          <a href="#" class="nav-link collapsed text-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="nav-icon fas fa-envelope"></i>
            <p>Jenis Surat
              <i class="fas fa-ang le-left right"></i>
            </p>
          </a>
          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="collapse-inner">
              <a href="?page=suratmasukread" class="nav-link collapse-item text-light">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Masuk</p>
              </a>
              <a href="?page=suratkeluarread" class="nav-link collapse-item text-light">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Keluar</p>
              </a>
              <!-- <a href="?page=disposisiread2" class="nav-link collapse-item text-light">
                <i class="far fa-circle nav-icon"></i>
                <p>Disposisi</p>
              </a> -->
            </div>
          </div>
          <?php endif; ?>

      <li class="nav-item">
        <a href="#" class="nav-link collapsed text-light" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="nav-icon fas fa-folder"></i>
          <p>Laporan
            <i class="fas fa-ang le-left right"></i>
          </p>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="collapse-inner">
            <a href="?page=laporansuratmasuk" class="nav-link collapse-item text-light">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan Data Surat Masuk</p>
            </a>
            <a href="?page=laporansuratkeluar" class="nav-link collapse-item text-light">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan Data Surat Keluar</p>
            </a>
            <!-- <a href="?page=laporandisposisi" class="nav-link collapse-item text-light">
              <i class="far fa-circle nav-icon"></i>
              <p>Laporan Data Disposisi</p>
            </a> -->
          </div>
        </div>
      </ul>
      </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>