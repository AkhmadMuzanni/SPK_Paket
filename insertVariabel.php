<?php 
session_start();
require_once('db.php');

$data_nama = $_POST["namaVariabel"];
$data_batas_bawah = $_POST["batasBawah"];
$data_batas_atas = $_POST["batasAtas"];

$sql = "";


$sql = "INSERT INTO variables(`id`, `namaVariable`, `batasAtas`, `batasBawah`, `jenis`, `deleted`) VALUES (0,'".$data_nama."',".$data_batas_atas.",".$data_batas_bawah.",0,0)";
echo $sql;
mysqli_query($link,$sql);

print_r($_POST["namaVariabel"]);
print_r($_POST["batasBawah"]);
print_r($_POST["batasAtas"]);
header('Location: variabel.php');
?>