<?php 
require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('index1.php?page=indexkeg#') </script>";
    $koneksi->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if(empty($id)){
    $sql = "INSERT INTO `schedule_list` (`title`,`description`,`pelaksana`,`narsum`,`start_datetime`,`end_datetime`) VALUES ('$title','$description','$pelaksana','$narsum','$start_datetime','$end_datetime')";
}else{
    $sql = "UPDATE `schedule_list` set `title` = '{$title}', `description` = '{$description}',`pelaksana` = '{$pelaksana}', `narsum` = '{$narsum}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' where `id` = '{$id}'";
}
$save = $koneksi->query($sql);
if($save){
    echo "<script> alert('Schedule Successfully Saved.'); location.replace('index1.php?page=indexkeg#') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$koneksi->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$koneksi->close();
?>