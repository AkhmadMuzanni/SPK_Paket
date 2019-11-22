<?php 
session_start();
require_once('db.php');

$data_id_variabel = $_POST["idVariabel"];
$data_nama = $_POST["namaKategori"];
$data_batas_bawah = $_POST["batasBawah"];
$data_batas_tengah = $_POST["batasTengah"];
$data_batas_atas = $_POST["batasAtas"];


$sql = "INSERT INTO categories(`id`, `idVariabel`, `namaKategori`, `batasBawah`, `batasTengah`, `batasAtas`, `deleted`) VALUES (0,".$data_id_variabel.",'".$data_nama."',".$data_batas_bawah.",".$data_batas_tengah.",".$data_batas_atas.",0)";
echo $sql;
mysqli_query($link,$sql);

print_r($_POST["idVariabel"]);
print_r($_POST["namaKategori"]);
print_r($_POST["batasBawah"]);
print_r($_POST["batasTengah"]);
print_r($_POST["batasAtas"]);
header('Location: variabel.php');
?>
