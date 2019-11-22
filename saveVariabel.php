<?php 
session_start();
require_once('db.php');

$data_id = $_POST["id_variabel"];
$data_nama = $_POST["nama_variabel"];
$data_batas_bawah = $_POST["batas_bawah_variabel"];
$data_batas_atas = $_POST["batas_atas_variabel"];
$data_jenis = $_POST["jenis_variabel"];

$sql = "";

$sql = "UPDATE variables SET deleted=1";
mysqli_query($link,$sql); 


for ($i = 0; $i < count($data_id); $i++) {
    $sql = "UPDATE variables SET namaVariable='".$data_nama[$i]."',batasAtas=".$data_batas_atas[$i].",batasBawah=".$data_batas_bawah[$i].",jenis=".$data_jenis[$i].",deleted=0 WHERE id = $data_id[$i]";
    echo $sql;
    mysqli_query($link,$sql);
}
print_r($_POST["id_variabel"]);
print_r($_POST["nama_variabel"]);
print_r($_POST["batas_bawah_variabel"]);
print_r($_POST["batas_atas_variabel"]);
print_r($_POST["jenis_variabel"]);
header('Location: variabel.php');
?>