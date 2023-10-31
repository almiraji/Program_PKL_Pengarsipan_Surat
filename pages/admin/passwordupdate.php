<?php
if (isset($_GET['id'])) {
    
    $database = new Database();
    $db = $database->getConnection();

    $id = $_GET['id'];
    $findSql = " SELECT * FROM pengguna WHERE id = ?";
    $stmt = $db->prepare($findSql);
    $stmt->bindParam(1, $_GET['id']);
    $stmt->execute();
    $row = $stmt->fetch();
    if (isset($row['id'])) {
        if (isset($_POST['button_update'])) {

            $database = new Database();
            $db = $database->getConnection();
        
            $validateSQL = " SELECT * FROM pengguna WHERE id = ? AND id != ?";
            $stmt = $db->prepare($validateSQL);
            $stmt->bindParam(1, $_POST['id']);
            $stmt->bindParam(2, $_POST['id']);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
        ?>
                <div class = "alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h5><i class="icon fas fa-ban"></i>Gagal</h5>
                    sudah ada
                </div>
        <?php
            } else {
                $updateSQL = "UPDATE pengguna SET password = ? WHERE id = ?";
                $stmt = $db->prepare($updateSQL);
                $stmt->bindParam(1, $_POST['password']);
                $stmt->bindParam(2, $_POST['id']);
                if ($stmt->execute()) {
                    $_SESSION['hasil'] = true;
                    $_SESSION['pesan'] = "Berhasil Ubah data";
                } else {
                    $_SESSION['hasil'] = false;
                    $_SESSION['pesan'] = "Gagal Ubah data";
                }
                echo "<meta http-equiv='refresh' content='0;url=?page=passwordread'>"; 
            
            }
        }
        
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb2">
            <div class="col-sm-6">
                <h1 class="text-white">Ubah Data Password</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                    <li class="breadcrumb-item"><a href="?page=passwordread" class="text-white">Mengelola Akun</a></li>
                    <li class="breadcrumb-item active text-white">Ubah Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Password</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" value="<?php echo $row['password'] ?>">
                </div>
                
                <a href="?page=passwordread" class="btn btn-danger btn-sm float-right m-2">
                    <i class="fa fa-times"></i> Batal 
                </a>
                <button type="submit" name="button_update" class="btn btn-success btn-sm float-right m-2">
                    <i class="fa fa-save"></i> Simpan 
                </button>
            </form>
        </div>
    </div>
</section>

<?php
    } else {
        echo "<meta http-equiv='refresh' content='0;url=?page=passwordread'>"; 
    } 
    
} else {
    echo "<meta http-equiv='refresh' content='0;url=?page=passwordread'>"; 
    }

?>
