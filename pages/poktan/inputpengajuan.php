<?php
if (isset($_POST['button_create1'])) {
    $database = new Database();
    $db = $database->getConnection();

    $validateSQL = " SELECT * FROM desa WHERE nama_desa = ?";
    $stmt = $db->prepare($validateSQL);
    $stmt->bindParam(1, $_POST['nama_desa']);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
?>
        <div class = "alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h5><i class="icon fas fa-ban"></i>Gagal</h5>
            Nama Desa sama sudah ada
        </div>
<?php
    } else {
        $insertSql = " INSERT INTO leaves SET name = ?, department = ?, leavedate = ?";
        $stmt = $db->prepare($insertSql);
        $stmt->bindParam(1, $_POST['name']);
        $stmt->bindParam(2, $_POST['department']);
        $stmt->bindParam(3, $_POST['leavedate']);
        
        if ($stmt->execute()) {
            $_SESSION['hasil'] = true;
            $_SESSION['pesan'] = "Berhasil simpan data";
        } else {
            $_SESSION['hasil'] = false;
            $_SESSION['pesan'] = "Gagal simpan data";
        }
        echo "<meta http-equiv='refresh' content='0;url=?page=datapengajuan'>"; //ubah nama sesuai php
    
    }
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1>Tambah Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=desaread">approve</a></li> <!-- //ubah sesuai nama php -->
                    <li class="breadcrumb-item active">Tambah Data</li>
                </ol>
            </div>
        </div>
    </div>
    
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah</h3>
        </div>
        <div class="card-body">
            <form method="POST">     
                    <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label for="department">Department</label>
                    <select type="text" class="form-control" name="department">
                        <option value="">-- Pilih --</option>
                        <option>HR</option>
						<option>Marketing</option>
			            <option>Development</option>
						<option>UX</option>
								<option>Test Team</option>
								<option>Finance</option>
								<option>Customer Support</option>
                   
                        <?php
                        $database = new Database();
                        $db = $database->getConnection();
                        
                        $selectSql = "SELECT * FROM leaves ";
                       ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="leavedate">Leave Date</label>
                    <input type="date" class="form-control" name="leavedate">
                </div>

                <div class="form-group">
							<label>Reason For Leave</label>
							<textarea name="editor1" class="form-control"></textarea>
						</div>
                
                <a href="?page=desaread" class="btn btn-danger btn-sm float-right">
                    <i class="fa fa-times"></i> Batal 
                </a>
                <button type="submit" name="button_create1" class="btn btn-success btn-sm float-right">
                    <i class="fa fa-save"></i> Simpan 
                </button>
            </form>
        </div>
    </div>
</section>
<?php include_once "partials/scripts.php" ?>

<!-- /*onkeypress='return (event.charCode > 47 && event.charcode < 58) || event.charCode == 46'*/ tanyakan dosen--> 


