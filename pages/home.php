<!--<div class="bg-image" 
    style="background-image: url('dist/img/dinas2.jpg');
          height: 120vh">-->

<!-- Content Header (Page header) -->
<div class="content-header" style="background-color: #112B3C;">
  <div class="container-fluid">
    <div class="row mb-2" style="border: 1px solid #fff;">
      <div class="col-sm-6">
        <h3 class="text-white mt-2"><i class="fas fa-home"></i> Beranda</h3>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- Main content -->

<div class="content" style="background-color: #112B3C;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
          <div class="info-box-content">
            <?php
            include "koneksi.php";
            $sql = "SELECT * FROM tbl_suratmasuk";
            $data = mysqli_query($koneksi, $sql);
            $produk = mysqli_num_rows($data);
            ?>
            <span class="info-box-text">Surat Masuk</span>
            <a href="?page=suratmasukread"><span class="info-box-number"><?php echo $produk; ?></span></a>
            <span class="info-box-number"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <div class="col-md-6 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="far fa-envelope-open"></i></span>
          <div class="info-box-content">
            <?php
            include "koneksi.php";
            $sql = "SELECT * FROM tbl_suratkeluar";
            $data = mysqli_query($koneksi, $sql);
            $produk = mysqli_num_rows($data);
            ?>
            <span class="info-box-text">Surat Keluar</span>
            <a href="?page=suratkeluarread"><span class="info-box-number"><?php echo $produk; ?></span></a>
            <span class="info-box-number"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    
    <!-- /.info-box -->
  </div> -->

  <!-- /.info-box -->

</div>
</div>
</div>
</div>
</div>
<?php
include "partials/scripts.php"
?>