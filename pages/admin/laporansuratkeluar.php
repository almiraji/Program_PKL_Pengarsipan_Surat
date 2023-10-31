<?php include_once "partials/cssdatatables.php" ?>
<?php
error_reporting(E_ALL);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<head>
    <!-- Load file CSS Bootstrap dan Select2 melalui CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- Load file JS untuk JQuery dan Selec2.js melalui CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    
</head>
<body>
<br>
<div class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Laporan Data Surat Keluar</h3>
        </div>

        <div class="col">
        <form  id="form" method="GET">
            <div class="row mt-4 g-6 align-items-center">
                    <div class="col-auto">
                        <label class="col-form-label">Periode</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="dari" required>
                    </div>
                    <div class="col-auto">
                        -
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="ke" required>
                    </div>
                    <div class="col-auto">
                    <input type="button" type="submit" name="submit" class="btn btn-info" id="Pilih" value="Cari">
                    </div>
                    <a href="export/cetak_datasuratkeluar.php" target="_blank" class="btn btn-info float-right">Cetak Semua Data Disetujui</a>
                    </div>
                    <br>
                </div>
            </form>
        </div>

       


    <div id="tampil">
    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            $("#Pilih").click(function(){

                var data = $('#form').serialize();
                $.ajax({
                    type	: 'GET',
                    url	: "pages/admin/ambil_suratkeluar.php",
                    data: data,
                    cache	: false,
                    success	: function(data){
                        $("#tampil").html(data);
                    }
                });
            });
        });

    </script>
</div>
</body>
<?php include_once "partials/scripts.php" ?>
<?php include_once "partials/scriptsdatatables.php" ?>
